<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/3
 * Time: 下午 01:44
 */

namespace Modules\Files\Entities;

use Modules\Base\Support\Scalar\ArrayMaster;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Files\Repository\FilesRepository;
use XC\Independent\Kit\Utils\URLUtil;

trait FilesRelationTraitHelper
{
    /**
     * FilesRelationTraitHelper constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        /** @noinspection PhpUndefinedClassInspection */
        parent::__construct($attributes);
        $this->touches = ArrayMaster::arrayMerge($this->touches, ['used']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function used()
    {
        return $this->morphToMany(
            Files::class,
            'file_used_model',
            'files_used',
            'file_used_model_id',
            'files_id'
        );
    }

    /**
     * @return null|string
     */
    public function firstFileUrl()
    {
        $result = null;
        if (!is_null($file = $this->used->first())) {
            $result = URLUtil::isURL($path = $file->files_url[0]) ? $path : url($path);
        }

        return $result;
    }

    /**
     * @param array $fileIds
     * @param array $filesAttr example:['id1'=>['cover'=>Y'],'id4'=>['cover'=>Y']]
     * @see https://laravel.com/docs/5.7/eloquent-relationships#updating-many-to-many-relationships
     * @return array
     */
    public function forceSync(array $fileIds, array $filesAttr = [])
    {
        $result = [];
        $fileIds = array_unique($fileIds);
        try {
            \DB::transaction(function () use ($fileIds, $filesAttr, &$result) {
                if (ArrayMaster::isList($fileIds)) {
                    $fileRep = \App::make(FilesRepository::class);
                    $targetFiles = $fileRep->findFiles($fileIds);
                    $data = [];
                    foreach ($targetFiles as $file) {
                        $data[$file->getKey()] = $filesAttr[$file->getKey()] ?? $file->getKey();
                    }
                    if (ArrayMaster::isList($fileIds)) {
                        $this->used()->detach();
                        $this->used()->attach($data);
                    }
                }
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $fileIds
     * @param array $filesAttr example:['id1'=>['cover'=>Y'],'id4'=>['cover'=>Y']]
     * @see https://laravel.com/docs/5.7/eloquent-relationships#updating-many-to-many-relationships
     * @return array
     */
    public function fileEnabled(array $fileIds, array $filesAttr = [])
    {
        $result = [];
        $fileIds = array_unique($fileIds);
        try {
            \DB::transaction(function () use ($fileIds, $filesAttr, &$result) {
                if (ArrayMaster::isList($fileIds)) {
                    $fileRep = \App::make(FilesRepository::class);
                    $targetFiles = $fileRep->findFiles($fileIds);
                    $data = [];
                    foreach ($targetFiles as $file) {
                        $data[$file->getKey()] = $filesAttr[$file->getKey()] ?? $file->getKey();
                    }
                    if (ArrayMaster::isList($data)) {
                        $result = $this->used()->sync($data);
                    }
                }
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 將File Model 狀態取消為OFF
     * @return int
     */
    public function fileDisabled()
    {
        $count = 0;
        try {
            $count = $this->used()->detach();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $count;
    }
}
