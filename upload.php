Подождите...
<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 28.03.2015
 * Time: 21:55
 */

// Trying to establish a connection with the FTP server
require_once("config.php");

// Getting data from variables of uploadform.php
$sir = $_POST['dir'];
$name = $_post['name'];

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

if(empty($name))
    puterror("Недопустимое имя файло");
$direct = str_replace('%', '/', $dir);

$path = "$direct/".substr($name, strrpos($name, "\\")+1);
$ret = ftp_nb_put($link, $path, $name, FTP_BINARY);
while($ret == FTP_MOREDATA){
    // Echo dots while user waiting
    echo ".";

    // Continue upload
    $ret = ftp_nb_continue($link);
}
if($ret != FTP_FINISHED){
    puterror("<br>Во время загрузки произошла ошибка...");
}
else {
    // Create octal variable $ mode with access rights to the directory
    eval("\$mode0=$user$group$other;");

    // Change the rules for the newly created directory
    if(ftp_chmod($link, $mode, $path)){

        // Automatic redirection
        echo "
            <html>
                <head>
                    <meta http-equiv='refresh' content='0; url='index.php?dir=$dir'>
                </head>
            </html>
    ";
    }
    else
        puterror('Не удается удалить директорию');
}
?>