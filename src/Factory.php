<?php

namespace Chengxinyun;

/**
 * Class Factory
 * @method static \Chengxinyun\api\Callback Callback(array $config = []) 创建 Callback 实例
 * @method static \Chengxinyun\api\FreelanceContract FreelanceContract(array $config = []) 创建 FreelanceContract 实例
 * @method static \Chengxinyun\api\Invoice Invoice(array $config = []) 创建 Invoice 实例
 * @method static \Chengxinyun\api\Merchant Merchant(array $config = []) 创建 Merchant 实例
 * @method static \Chengxinyun\api\Recharge Recharge(array $config = []) 创建 Recharge 实例
 * @method static \Chengxinyun\api\Salary Salary(array $config = []) 创建 Salary 实例
 * @package Chengxinyun
 */
class Factory
{
    /**
     * @var array 缓存已创建的实例
     */
    private static array $objects = [];

    /**
     * 静态调用方法，用于动态创建实例并缓存
     * 
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \Exception
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $class = __NAMESPACE__ . '\\api\\' . $name;

        if (!class_exists($class)) {
            throw new \Exception("Class $class does not exist");
        }

        $key = self::getObjectKey($class, $arguments);

        if (!isset(self::$objects[$key])) {
            self::$objects[$key] = new $class(...$arguments);
        }

        return self::$objects[$key];
    }

    /**
     * 生成对象缓存的键值
     * 
     * @param string $class
     * @param array $arguments
     * @return string
     */
    private static function getObjectKey(string $class, array $arguments): string
    {
        return md5($class . serialize($arguments));
    }

    /**
     * 设置对象到缓存中
     * 
     * @param string $key
     * @param mixed $object
     */
    public static function set(string $key, $object): void
    {
        self::$objects[$key] = $object;
    }

    /**
     * 从缓存中获取对象
     * 
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        return self::$objects[$key] ?? null;
    }
}