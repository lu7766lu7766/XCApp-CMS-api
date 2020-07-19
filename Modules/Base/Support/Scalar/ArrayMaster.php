<?php
/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2017/8/8
 * Time: 下午 05:57
 */

namespace Modules\Base\Support\Scalar;

use Illuminate\Support\Arr;

class ArrayMaster extends Arr
{
    /**
     * @param array $value
     * @return bool
     */
    public static function isList(array $value)
    {
        return count($value) > 0;
    }

    /**
     * Implode the array.
     * @param string[] $value
     * @param string $glue
     * @return string|null null on fail.
     */
    public static function implode(array $value, $glue = ',')
    {
        try {
            return implode($glue, $value);
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Explode the array.
     * @param string $value
     * @param string $delimiter
     * @param int $limit
     * @return string[]
     */
    public static function explode($value, string $delimiter = ',', int $limit = PHP_INT_MAX)
    {
        try {
            return explode($delimiter, $value, $limit);
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Finds whether a variable is an array or an empty array.
     * @param mixed $value
     * @return bool
     */
    public static function isListOrEmpty($value)
    {
        return is_array($value);
    }

    /**
     * @param mixed $value
     * @return array
     */
    public static function forceBeArray($value)
    {
        $tmp = $value;
        if (!self::isListOrEmpty($tmp)) {
            $tmp = [$tmp];
        }

        return $tmp;
    }

    /**
     * Merge one or more arrays.
     * @param array $array1 Initial array to merge.
     * @param array $array2 Variable list of arrays to merge.
     * @param array $_ More variable list of arrays to merge.
     * @return array
     */
    public static function arrayMerge(array $array1, array $array2 = null, array $_ = null)
    {
        $arrayArgs = func_get_args();
        $result = [];
        foreach ($arrayArgs as $arr) {
            if (self::isList($arr)) {
                $result = array_merge($result, $arr);
            }
        }

        return $result;
    }
}
