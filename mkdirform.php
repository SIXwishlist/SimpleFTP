<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 26.03.2015
 * Time: 21:10
 */
// Trying to establish a connection with the FTP server
require_once("config.php");

if(!isset($action))
    $action = "mkdir.php";
if(!isset($button))
    $button = "Добавить";
if(!isset($title))
    $title = "Добавление директории";

// Default access for user
if(!isset($ur))
    $ur = "checked";
if(!isset($uw))
    $uw = "checked";
if(!isset($ux))
    $ux = "checked";

// Default access for group
if(!isset($gr))
    $gr = "checked";
if(!isset($gw))
    $gw = "";
if(!isset($gx))
    $gx = "checked";

// Default access for other users
if(!isset($or))
    $or = "checked";
if(!isset($ow))
    $ow = "";
if(!isset($ox))
    $ox = "checked";

// Get current dir
if(!isset($dir))
    $dir = $_GET['dir'];
?>
<form action="<?= $action ?>">
    Название директории: <input type="text" name="name" value="<?= $name?>" />
    Права доступа:
    <input type="checkbox" name="ur" <?= $ur ?> />
    <input type="checkbox" name="uw" <?= $uw ?> />
    <input type="checkbox" name="ux" <?= $ux ?> />
    &nbsp;&nbsp;
    <input type="checkbox" name="gr" <?= $gr ?> />
    <input type="checkbox" name="gw" <?= $gw ?> />
    <input type="checkbox" name="gx" <?= $gx ?> />
    &nbsp;&nbsp;
    <input type="checkbox" name="or" <?= $or ?> />
    <input type="checkbox" name="ow" <?= $ow ?> />
    <input type="checkbox" name="ox" <?= $ox ?> />
    <input type="submit" value="<?= $button ?>"/>
    <input type="hidden" name="dir" value="<?= $dir ?>"/>
    <input type="hidden" name="old" value="<?= $name ?>"/>
</form>
