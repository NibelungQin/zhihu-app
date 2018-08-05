<?php
/**
 * Created by PhpStorm.
 * User: Nibelung Qin
 * Date: 2018/5/28
 * Time: 19:00
 */

if (!function_exists('user')){
    function user($driver=null){
        if ($driver){
            return app('auth')->guard('api')->user();
        }
        return app('auth')->user();
    }
}