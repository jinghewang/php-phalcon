<?php

namespace Woodw\Phalcon\Services;


/**
 * 基础服务类
 * @author wjh 2017-08-02
 */
class BaseService extends \Phalcon\Di\Injectable {

    /**
     * 校验$value是否非空
     *  if not set ,return true;
     *    if is null , return true;
     **/
    public static function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }


}
