<?php

namespace Modules\Base\Support\Traits\Pattern;

use Closure;
use Modules\Base\Exception\FactoryInstanceErrorException;
use Modules\Base\Support\Scalar\ArrayMaster;
use ReflectionClass;

/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2017/6/2
 * Time: 下午 06:57
 */
trait Factory
{
    final private function __construct()
    {
    }

    /**
     * Make instance use key to find concrete and summon.
     * @param string $key
     * @param array $parameters
     * @param string|null $initStaticMethodName
     * @return null|object null on fail.
     * @throws FactoryInstanceErrorException
     */
    public static function make(string $key, array $parameters = [])
    {
        return static::summon(static::mapping($key), $parameters, static::initMethodName());
    }

    /**
     * @param string|Closure $concrete
     * @param array $parameters
     * @param string|null $initStaticMethodName
     * @return null|object null on fail.
     */
    public static function summon($concrete, array $parameters = [], string $initStaticMethodName = null)
    {
        $instance = null;
        if (is_null($initStaticMethodName)) {
            try {
                if ($concrete instanceof Closure) {
                    return $concrete($parameters);
                }
                $reflector = new ReflectionClass($concrete);
                if ($reflector->isInstantiable()) {
                    $instance = \App::make($concrete, $parameters);
                };
            } catch (\Throwable $e) {
            }
        } else {
            try {
                $instance = $concrete::$initStaticMethodName(...$parameters);
            } catch (\Throwable $e) {
            }
        }

        return $instance;
    }

    /**
     * Read the first item from map to init instance.
     * @return null|object
     */
    public static function defaultService()
    {
        return static::summon(static::firstAbstract());
    }

    /**
     * If want to use static init method by your self , please override this method ant return method string name.
     * @return null|string
     */
    protected static function initMethodName()
    {
        return null;
    }

    /**
     * Read the first item as abstract.
     * @return mixed
     */
    protected static function firstAbstract()
    {
        return ArrayMaster::first(static::map());
    }

    /**
     * @param string $key
     * @return string
     * @throws FactoryInstanceErrorException
     */
    protected static function mapping(string $key)
    {
        if (!isset(static::map()[$key])) {
            throw new FactoryInstanceErrorException('not found any mapping class from the key =>' . $key . '.');
        }

        return static::map()[$key];
    }

    /**
     * @return array
     */
    abstract public static function map(): array;
}
