<?php

namespace Woodw\Phalcon\Helpers;

/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 16/4/13
 * Time: 下午6:58
 */
class PhalconHelper
{

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
}