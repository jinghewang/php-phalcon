<?php
namespace Woodw\Phalcon\Helpers;


/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 16/4/13
 * Time: 下午6:58
 */
class ConfigHelper
{
    /**
     * 获取配置信息
     * @author wjh
     * @date 20160420
     * @param string $config 配置节
     * @param string $key 健
     * @param mixed $defaultValue 默认值
     * @return mixed
     */
    public static function getConfigValue($config, $key, $defaultValue = null)
    {
        $di = \Phalcon\DI::getDefault();
        $params = $di->getShared('params');
        if (isset($params) && isset($params[$config]) && isset($params[$config][$key]))
            return $params[$config][$key];
        else
            return $defaultValue;
    }

    /**
     * 获取配置节信息
     * @author wjh
     * @date 20170629
     * @param $config 配置节
     * @param mixed $defaultValue 默认值
     * @return mixed
     */
    public static function getConfig($config, $defaultValue = null)
    {
        $di = \Phalcon\DI::getDefault();
        $params = $di->getShared('params');
        if (isset($params) && isset($params[$config]))
            return $params[$config];
        else
            return $defaultValue;
    }

}