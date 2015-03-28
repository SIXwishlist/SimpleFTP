<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 28.03.2015
 * Time: 21:26
 */
if(!isset($action))
    $action = "upload.php";
if(!isset($button))
    $button = "Загрузить";
if(!isset($title))
    $title = "Загрузка файла в текущую директорию";

// Default access for user
if(!isset($ur))
    $ur = "checked";
if(!isset($uw))
    $uw = "checked";
if(!isset($ux))
    $ux = "";

// Default access for group
if(!isset($gr))
    $gr = "checked";
if(!isset($gw))
    $gw = "";
if(!isset($gx))
    $gx = "";

// Default access for other users
if(!isset($or))
    $or = "checked";
if(!isset($ow))
    $ow = "";
if(!isset($ox))
    $ox = "";

// Get current dir
if(!isset($dir))
    $dir = $_GET['dir'];
?>
<form action="<?= $action ?>" method="post">
    <?php
    if($action == 'upload.php') {
        ?>
        <label for="">Файл:
            <input type="file" name="name" value="<?= $name ?>"/>
        </label>
    <?php
    }
    else{
    ?>
        <label for="">Файл:
            <input type="text" name="name" value="<?= $name ?>"/>
        </label>
    <?php
    }
    ?>
    <label for="">
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

        <input class="button" type="submit" value="<?= $button ?>"/>
        <input type="hidden" name="dir" value="<?= $dir ?>"/>
        <input type="hidden" name="old" value="<?= $name ?>"/>
    </label>
</form>
