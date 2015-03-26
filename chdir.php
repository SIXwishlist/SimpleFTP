<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 26.03.2015
 * Time: 21:36
 */
// Trying to establish a connection with the FTP server
require_once("config.php");

$dir = $_POST['dir'];
$name = $_POST['name'];

$user = 0;
if($_POST['ur'] == 'on')
    $user += 4;
if($_POST['uw'] == 'on')
    $user += 2;
if($_POST['ux'] == 'on')
    $user += 1;

$group = 0;
if($_POST['gr'] == 'on')
    $group += 4;
if($_POST['gw'] == 'on')
    $group += 4;
if($_POST['gx'] == 'on')
    $group += 4;

$other = 0;
if($_POST['or'])
    $other += 4;
if($_POST['ow'])
    $other += 4;
if($_POST['ox'])
    $other += 4;

// Check dir name
if(empty($name))
    puterror('Недоступное имя для директории');
$direct = str_replace('%', '/', $dir);
$dir = str_replace('%', '%25', $dir);

// Rename catalog $old
if(ftp_rename($link, $direct."/".$old, $direct.'/'.$name)){
    eval("\$mode=0$user$group$other;");
    if(ftp_chmod($link, $mode, $direct."/".$name)){
        echo "<html>
                <meta http-equiv='REFRESH' content='0' url=index.php?dir=$dir />
            </html>";
    }
    else
        puterror("Не удается изменить права доступа к директории");
}
else
    puterror("Не удается переименовать директорию");
