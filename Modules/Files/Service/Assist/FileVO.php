<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/9
 * Time: 下午 05:48
 */

namespace Modules\Files\Service\Assist;

class FileVO
{
    /**
     * @var string
     */
    private $fullPath;
    /**
     * @var resource|string
     */
    private $resource;

    /**
     * FileVO constructor.
     * @param string $fullPath
     * @param string|resource $fileContent
     */
    public function __construct(string $fullPath, $fileResource)
    {
        $this->fullPath = $fullPath;
        $this->resource = $fileResource;
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $this->fullPath;
    }

    /**
     * @return resource|string
     */
    public function getResource()
    {
        return $this->resource;
    }
}
