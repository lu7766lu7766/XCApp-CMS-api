<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/11
 * Time: 下午 04:25
 */

namespace Modules\Files\Service;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Filesystem\FilesystemAdapter;
use Modules\Files\Entities\Files;
use Modules\Files\Repository\FilesRepository;

class DeleteFilesService
{
    /**
     * @var FilesystemAdapter
     */
    private $drive;

    public function __construct()
    {
        $this->drive = \Storage::drive();
    }

    /**
     * @param int $day
     * @return Collection|Files[]
     */
    public function getExpiredFiles(int $day = 1)
    {
        $deadLineTime = Carbon::now()->subDay($day);
        $fileRep = \App::make(FilesRepository::class);
        $fileItems = $fileRep->getExpiredFiles($deadLineTime->toDateTimeString());

        return $fileItems;
    }

    /**
     *　remove source file and delete files data in sql
     * @param Files $item
     * @return bool
     */
    public function deleteSourceFiles(Files $item)
    {
        $storagePaths = $item->files_storage_path;
        $result = false;
        $success = true;
        foreach ($storagePaths as $path) {
            if ($this->drive->exists($path)) {
                $success = $this->drive->delete($path);
            }
            if (!$success) {
                break;
            }
        }
        if ($success) {
            $result = $item->delete();
        }

        return $result;
    }
}
