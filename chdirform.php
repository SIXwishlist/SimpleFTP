<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 28.03.2015
 * Time: 20:47
 */

// Get name of dir that mast be changed
$dir = $_GET['dir'];
$name = substr($dir, strrpos($dir, "%")+1);
$dir = substr($dir, 0, strrpos($dir, "%"));
$acc = $_GET['acc'];

/*******************************/
if(substr($acc, 1, 1) == 'r')
    $ur = "checked";
else
    $ur = "";
/*******************************/
if(substr($acc, 2, 1) == 'w')
    $uw = "checked";
else
    $uw = "";
/*******************************/
if(substr($acc, 3, 1) == 'x')
    $ux = "checked";
else
    $ux = "";
/*******************************/
/*******************************/
/*******************************/
if(substr($acc, 4, 1) == 'r')
    $gr = "checked";
else
    $gr = "";
/*******************************/
if(substr($acc, 5, 1) == 'w')
    $gw = "checked";
else
    $gw = "";
/*******************************/
if(substr($acc, 6, 1) == 'x')
    $gx = "checked";
else
    $gx = "";
/*******************************/
/*******************************/
/*******************************/
if(substr($acc, 7, 1) == 'r')
    $or = "checked";
else
    $or = "";
/*******************************/
if(substr($acc, 8, 1) == 'w')
    $ow = "checked";
else
    $ow = "";
/*******************************/
if(substr($acc, 9, 1) == 'x')
    $ox = "checked";
else
    $ox = "";

if(!isset($title))
    $title = 'Переименование директории';
if(!isset($button))
    $button = 'Исправить';
if(!isset($action))
    $action = 'chdir.php';

// Include HTML form
include "mkdirform.php";
?>