<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 2018/10/7
 * Time: 下午 11:44
 */

namespace Modules\Files\Constants;

class ImageTypeConstant
{
    const JPEG = "\xFF\xD8\xFF";
    const PNG = "\x89\x50\x4e\x47\x0d\x0a\x1a\x0a";
    const BMP = "BM";

    /**
     * @return array
     */
    public static function enum()
    {
        return [
            self::JPEG,
            self::PNG,
            self::BMP,
        ];
    }

    /**
     * 判斷是否為Image
     * @param string $fileContent
     * @return bool
     */
    public static function isImage(string $fileContent)
    {
        foreach (self::enum() as $type) {
            if (substr($fileContent, 0, strlen($type)) === $type) {
                return true;
            }
        }

        return false;
    }
}


