<?php

namespace Modules\Files\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Entities\BaseORM;

/**
 * @property string files_status
 * @property string files_path
 * @property string files_name
 * @property array files_storage_path
 * @property int id
 */
class Files extends BaseORM
{
    protected $table = 'files';
    protected $casts = [
        'files_url'          => 'array',
        'files_storage_path' => 'array'
    ];
    protected $fillable = [
        'files_status',
        'files_url',
        'files_path',
        'files_name',
        'files_mime',
        'files_source_name',
        'files_storage_path'
    ];

    /**
     * @return HasMany
     */
    public function fileUsed()
    {
        return $this->hasMany(FilesUsed::class, 'files_id', 'id');
    }

    /**
     * @param $url
     * @return array
     */
    public function getFilesUrlAttribute($url)
    {
        return json_decode($url, true);
    }
}
