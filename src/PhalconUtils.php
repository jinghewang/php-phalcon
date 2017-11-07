<?php

namespace Woodw\Phalcon;


/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 16/4/13
 * Time: 下午6:58
 */
class PhalconUtils
{

    /**
     * 获取 Phalcon 默认 di
     * @author wjh 2017-11-07
     *
     * @return \Phalcon\DiInterface
     */
    public static function getDefaultDi() {
        $di = \Phalcon\Di::getDefault();
        return $di;
    }


    /**
     * 注册volt 引擎
     * @author wjh
     * @date 20160420
     * @param $c
     */
    public static function registerVoltEngines($c)
    {
        $di = \Phalcon\DI::getDefault();

        //view
        $c->view->registerEngines([
            ".phtml" => function ($view, $di) {
                $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
                $volt->setOptions(
                    [
                        "compiledPath" => function ($templatePath) {
                            $templatePath = str_replace('../module/','../cache/',$templatePath).'.compiled';
                            $dir = dirname($templatePath);
                            if (!is_dir($dir)) {
                                mkdir($dir,0777,true);
                            }
                            //var_dump($templatePath);
                            //var_dump($dir);
                            //die;
                            return $templatePath;
                        },
                        "compiledExtension" => ".compiled",
                        "compileAlways" => true,
                        "stat" => true,
                    ]
                );return $volt;
            },
            ".volt" => function ($view, $di) {
                $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
                $volt->setOptions(
                    [
                        "compiledPath" => function ($templatePath) {
                            $templatePath = str_replace('../module/','../cache/',$templatePath).'.compiled';
                            $dir = dirname($templatePath);
                            if (!is_dir($dir)) {
                                mkdir($dir,0777,true);
                            }
                            //var_dump($templatePath);
                            //var_dump($dir);
                            //die;
                            return $templatePath;
                        },
                        "compiledExtension" => ".compiled",
                    ]
                );return $volt;
            }
        ]);
    }

    /**
     * hello
     * @author wjh 2017-11-06
     * @param string $message
     */
    public static function hello($message){
        echo "hello:$message";
    }

    /**
     * test
     * @author wjh 2017-11-06
     * @param string $message
     */
    public static function test($message){
        echo "test:$message";
    }


    /**
     * test
     * @author wjh 2017-11-06
     * @param string $message
     */
    public static function testUtils($message){
        \Woodw\Utils\Utils::hello($message);
    }
}