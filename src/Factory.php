<?php

namespace Chengxinyun;

/**
 * @package Chengxinyun
 */
class Factory
{
    private static $objects = [];

    
    public static function __callStatic($name, $arguments)
    {
        $class = __NAMESPACE__ . '\\api\\' . $name;
        $obj = self::get(md5($class));
        if ($obj === false) {
            $object = new $class($arguments);
            if (class_exists($class)) {
                self::set(md5($class), $object);
                return self::get(md5($class));
            }
            return null;
        }
        return $obj;
    }

    public static function set($key, $object)
    {
        self::$objects[$key] = $object;
    }

    public static function get($key)
    {
        if (!isset(self::$objects[$key])) {
            return false;
        }
        return self::$objects[$key];
    }
}
