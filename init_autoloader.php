<?php
/**
 * DBShop 电子商务系统
 *
 * ==========================================================================
 * @link      http://www.dbshop.net/
 * @copyright Copyright (c) 2012-2015 DBShop.net Inc. (http://www.dbshop.net)
 * @license   http://www.dbshop.net/license.html License
 * ==========================================================================
 *
 * @author    静静的风
 *
 */

//在发布时是开启状态，在开发环境中注释掉
error_reporting(E_ERROR | E_PARSE);

//检测php版本，如果版本过低提示
if (version_compare(phpversion(), '5.3.23', '<') === true or version_compare(phpversion(), '7.0', '>=') === true) {
    die('ERROR: Your PHP version is ' . phpversion() . '. DBShop requires PHP 5.3.23 or newer(Version is less than 7.0).<br><br>错误：您的 PHP 版本是 ' . phpversion() . '。DBShop系统支持 PHP5.3.23或者更高版本（目前系统不支持 PHP 7.0 版本）。');
}

$loader = include 'vendor/autoload.php';

$zf2Path = __DIR__ . '/vendor/zendframework/zendframework/library';
$loader->add('Zend', $zf2Path);

$qiniuPath = __DIR__ . '/vendor/qiniu/php-sdk/src/Qiniu/functions.php';
if(file_exists($qiniuPath)) require $qiniuPath;



