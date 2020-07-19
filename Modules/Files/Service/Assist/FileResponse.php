<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/8
 * Time: 下午 08:50
 */

namespace Modules\Files\Service\Assist;

use Modules\Files\Entities\Files;

class FileResponse
{
    /**
     * @var null|string
     */
    private $fileName;
    /**
     * @var null|string
     */
    private $extension;
    /**
     * @var Files|null
     */
    private $item;

    /**
     * @return null|string
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @return null|string
     */
    public function getExtension(): ?string
    {
        return $this->extension;
    }

    /**
     * @return Files|null
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * FileResponse constructor.
     * @param string|null $fileName
     * @param string|null $extension
     * @param Files|null $item
     */
    public function __construct(string $fileName = null, string $extension = null, ?Files $item = null)
    {
        $this->fileName = $fileName;
        $this->extension = $extension;
        $this->item = $item;
    }
}
