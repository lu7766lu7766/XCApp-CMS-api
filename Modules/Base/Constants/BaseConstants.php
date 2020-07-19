<?php
/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2017/2/14
 * Time: 下午 01:19
 */

namespace Modules\Base\Constants;

use Modules\Base\Support\Scalar\ArrayMaster;

abstract class BaseConstants
{
    /**
     * @return array
     */
    abstract public static function enum(): array;

    /**
     * @param mixed $value
     * @throws \Exception
     */
    public static function validateValue($value)
    {
        if (!self::isValidValue($value)) {
            throw new \Exception('value => ' . $value . 'invalid.');
        }
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public static function isValidValue($value): bool
    {
        return isset(self::mirrorSymmetryEnum()[$value]);
    }

    /**
     * The key equals value Map
     * @return array
     */
    public static function mirrorSymmetryEnum(): array
    {
        $result = [];
        foreach (static::enum() as $const) {
            $result[$const] = $const;
        }

        return $result;
    }

    /**
     * @param string $glue
     * @return string
     */
    public static function implodeEnum($glue = ',')
    {
        return ArrayMaster::implode(static::enum(), $glue);
    }
}
