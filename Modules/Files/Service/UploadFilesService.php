<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/27
 * Time: 下午 03:04
 */

namespace Modules\Files\Service;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\FilesystemAdapter;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Files\Constants\FilesStatusConstants;
use Modules\Files\Constants\ImageTypeConstant;
use Modules\Files\Entities\Files;
use Modules\Files\Repository\FilesRepository;
use Modules\Files\Service\Assist\FileResponse;
use Modules\Files\Service\Assist\FileVO;
use Request;

class UploadFilesService
{
    /**
     * @var string
     */
    private $originName;
    /**
     * @var resource|string
     */
    private $originFile;
    /**
     * @var string
     */
    private $extension;
    /**
     * @var array
     */
    private $resize = ['800', '600', '300', '100', '50'];
    /**
     * @var Files $fileItem
     */
    private $fileItem;
    /**
     * @var FilesystemAdapter
     */
    private $drive;
    /**
     * @var string
     */
    private $filePrefixPath = '';

    /**
     * @return string
     */
    public function getOriginName(): string
    {
        return $this->originName;
    }

    /**
     * @return resource|string
     */
    public function getOriginFile()
    {
        return $this->originFile;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @return array
     */
    public function getResize(): array
    {
        return $this->resize;
    }

    /**
     * @return Files
     */
    public function getFileItem(): Files
    {
        return $this->fileItem;
    }

    /**
     * UploadFilesService constructor.
     * @param string $originName 原始檔名
     * @param resource|string $fileContent 檔案內容
     * @param string $extension 副檔名
     * @param string|null $driveName
     * @param bool $isPublic
     */
    private function __construct(
        string $originName,
        $fileContent,
        string $extension,
        string $driveName = null,
        bool $isPublic = true
    ) {
        $this->originName = $originName;
        $this->originFile = $fileContent;
        $this->extension = $extension;
        $this->drive = \Storage::drive($driveName);
        if ($isPublic) {
            $this->filePrefixPath = 'public' . DIRECTORY_SEPARATOR;
        }
    }

    /**
     * @param string $name
     * @param string $path
     * @param array $url 對外開放url
     * @param array $storagePath 儲存路徑
     * @return Files|null
     */
    private function saveToORM(string $name, string $path, array $url, array $storagePath)
    {
        $fileRep = \App::make(FilesRepository::class);
        $orm = $fileRep->create(
            [
                'files_name'         => $name,
                'files_path'         => $path,
                'files_url'          => $url,
                'files_storage_path' => $storagePath,
                'files_mime'         => $this->extension,
                'files_source_name'  => $this->originName,
                'files_status'       => FilesStatusConstants::OFF,
            ]
        );

        return $orm;
    }

    /**
     * @param string $requestKey
     * @param string|null $driverName
     * @param bool $isPublic 上傳檔案是否能對外存取,如果true儲存檔案會在於公開訪問的資料夾當中,
     * 在公開訪問資料夾中達到輕鬆共享(@see https://laravel.com/docs/5.7/filesystem#the-public-disk )
     * @return FileResponse
     * @throws FileNotFoundException
     */
    public static function uploadFormHttp(string $requestKey, string $driverName = null, bool $isPublic = true)
    {
        if (!Request::hasFile($requestKey)) {
            return null;
        }
        $file = Request::file($requestKey);
        $extension = $file->getClientOriginalExtension();
        $fileContent = \File::get($file->getRealPath());
        $originName = $file->getClientOriginalName();
        $serviceItem = new self($originName, $fileContent, $extension, $driverName, $isPublic);
        $fileItem = $serviceItem->doUploadFile();
        $uploaded = new FileResponse($serviceItem->originName, $serviceItem->extension, $fileItem);

        return $uploaded;
    }

    /**
     * 從本地上傳檔案
     * @param string $fullPath
     * @param string $fileName
     * @param string|null $driverName
     * @param bool $isPublic 上傳檔案是否能對外存取,如果true儲存檔案會在於公開訪問的資料夾當中,
     * 在公開訪問資料夾中達到輕鬆共享(@see https://laravel.com/docs/5.7/filesystem#the-public-disk )
     * @return FileResponse
     * @throws FileNotFoundException
     */
    public static function uploadFormLocal(
        string $fullPath,
        string $fileName,
        string $driverName = null,
        bool $isPublic = true
    ) {
        $fileContent = \File::get($fullPath . DIRECTORY_SEPARATOR . $fileName);
        $mime = \File::extension($fullPath . DIRECTORY_SEPARATOR . $fileName);
        $serviceItem = new self($fileName, $fileContent, $mime, $driverName, $isPublic);
        $fileItem = $serviceItem->doUploadFile();
        $uploaded = new FileResponse($serviceItem->originName, $serviceItem->extension, $fileItem);

        return $uploaded;
    }

    /**
     * 使用drive上傳
     * @param string $pathWithFileName (路徑與檔名 example:filePath/fileName)
     * @param $file
     * @param string $auth (是否需要對外公開 example:public|private) 攸關於 url獲取的方式
     * @return string|null url 回傳上傳url
     * @see https://stackoverflow.com/questions/25323753/laravel-league-flysystem-getting-file-url-with-aws-s3
     */
    private function uploadFile(string $pathWithFileName, $file, string $auth = 'public')
    {
        $isSuccess = $this->drive->put($pathWithFileName, $file, $auth);
        $url = $isSuccess ? $this->drive->url($pathWithFileName) : null;

        return $url;
    }

    /**
     * @return string
     */
    private function getNewFileName()
    {
        return md5(time() . microtime()) . '.' . $this->extension;
    }

    /**
     * @return string
     */
    private function createDatePath()
    {
        return "uploads"
            . DIRECTORY_SEPARATOR
            . date('Y' . DIRECTORY_SEPARATOR . 'm' . DIRECTORY_SEPARATOR . 'd')
            . DIRECTORY_SEPARATOR;
    }

    /**
     * 圖片縮圖
     * @param $imageEncodeContent
     * @param string $path
     * @param string $reSize
     * @return \Intervention\Image\Image
     */
    private function getResizeImgContent($imageEncodeContent, string $path, string $reSize)
    {
        $img = Image::make($imageEncodeContent);
        $img->resize($reSize, null, function (Constraint $constraint) {
            $constraint->aspectRatio();
        });

        //圖片縮圖後進行編碼
        return $img->encode(pathinfo($path, PATHINFO_EXTENSION), null);
    }

    /**
     * 縮圖處理
     * @param $newName
     * @return array
     */
    private function resizeImgProcess($newName)
    {
        $img = Image::make($this->originFile);
        $originWidth = $img->getWidth();
        $path = $this->getRealPath($this->createDatePath());
        $fileVOArr = [];
        foreach ($this->resize as $width) {
            // 原圖小於縮圖大小則不縮圖
            if ($originWidth < $width) {
                continue;
            }
            $resizeFileName = "{$width}_{$newName}";
            $resizeFullPath = $path . $resizeFileName;
            $imgFile = $this->getResizeImgContent($this->originFile, $resizeFullPath, $width);
            $fileVOArr[] = new FileVO($resizeFullPath, $imgFile->encoded);
        }

        return $fileVOArr;
    }

    /**
     * 上傳所有類型檔案
     * @return Files|null
     */
    private function doUploadFile()
    {
        $newName = $this->getNewFileName();
        $path = $this->getRealPath($this->createDatePath());
        $fullPath = $path . $newName;
        $prepareUploadFiles[] = new FileVO($fullPath, $this->originFile);
        if (ImageTypeConstant::isImage($this->originFile)) {
            $prepareUploadFiles = array_merge($prepareUploadFiles, $this->resizeImgProcess($newName));
        }
        $urlArr = [];
        $storagePath = [];
        /** @var FileVO $file */
        foreach ($prepareUploadFiles as $file) {
            if (is_null($url = $this->uploadFile($file->getFullPath(), $file->getResource()))) {
                return null;
            }
            $urlArr[] = $url;
            $storagePath[] = $file->getFullPath();
        }

        return $this->saveToORM($newName, $path, $urlArr, $storagePath);
    }

    /**
     * 獲取真實路徑
     * @param string $path
     * @return string
     */
    private function getRealPath(string $path)
    {
        $result = $path;
        if (!empty($this->filePrefixPath)) {
            $result = $this->filePrefixPath . $result;
        }

        return $result;
    }
}
