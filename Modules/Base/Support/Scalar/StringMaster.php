<?php
/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2017/8/8
 * Time: 下午 05:57
 */

namespace Modules\Base\Support\Scalar;

use Illuminate\Support\Str;

class StringMaster extends Str
{
    /**
     * The empty `string` `''`.
     *
     * @var string
     */
    private static $EMPTY_STR = '';

    /**
     * Checks if a `string` is empty (`''`) or `null`.
     *
     *     StringUtils::isEmpty(null);      // true
     *     StringUtils::isEmpty('');        // true
     *     StringUtils::isEmpty(' ');       // false
     *     StringUtils::isEmpty('bob');     // false
     *     StringUtils::isEmpty('  bob  '); // false
     *
     * @param string $str The `string` to check.
     *
     * @return boolean `true` if the `string` is empty or `null`, `false`
     *    otherwise.$EMPTY_STR
     */
    public static function isEmpty($str)
    {
        return (null === $str) || (self::$EMPTY_STR === $str);
    }

    /**
     * Checks if a `string` is not empty (`''`) and not `null`.
     *
     *     StringUtils::isNotEmpty(null);      // false
     *     StringUtils::isNotEmpty('');        // false
     *     StringUtils::isNotEmpty(' ');       // true
     *     StringUtils::isNotEmpty('bob');     // true
     *     StringUtils::isNotEmpty('  bob  '); // true
     *
     * @param string $str The `string` to check.
     *
     * @return boolean `true` if the `string` is not empty or `null`, `false`
     *    otherwise.
     */
    public static function isNotEmpty($str)
    {
        return false === self::isEmpty($str);
    }

    /**
     * Replaces a `string` with another `string` inside a larger `string`, for
     * the first maximum number of values to replace of the search `string`.
     *
     *     StringUtils::replace(null, *, *, *)         // null
     *     StringUtils::replace('', *, *, *)           // ''
     *     StringUtils::replace('any', null, *, *)     // 'any'
     *     StringUtils::replace('any', *, null, *)     // 'any'
     *     StringUtils::replace('any', '', *, *)       // 'any'
     *     StringUtils::replace('any', *, *, 0)        // 'any'
     *     StringUtils::replace('abaa', 'a', null, -1) // 'abaa'
     *     StringUtils::replace('abaa', 'a', '', -1)   // 'b'
     *     StringUtils::replace('abaa', 'a', 'z', 0)   // 'abaa'
     *     StringUtils::replace('abaa', 'a', 'z', 1)   // 'zbaa'
     *     StringUtils::replace('abaa', 'a', 'z', 2)   // 'zbza'
     *     StringUtils::replace('abaa', 'a', 'z', -1)  // 'zbzz'
     *
     * @param string $text The `string` to search and replace in.
     * @param string $search The `string` to search for.
     * @param string $replace The `string` to replace $search with.
     * @param integer $max The maximum number of values to replace, or `-1`
     *                         if no maximum.
     *
     * @return string The text with any replacements processed or `null` if
     *    `null` `string` input.
     */
    public static function replace($text, $search, $replace, $max = -1)
    {
        if (true === self::isEmpty($text) || true === self::isEmpty($search) || null === $replace || (0 === $max)) {
            return $text;
        }

        return \preg_replace('/' . \preg_quote($search, '/') . '/', $replace, $text, $max);
    }
}
