Подождите...
<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 28.03.2015
 * Time: 23:16
 */

// Trying to establish a connection with the FTP server
require_once("config.php");

// Get file
$dir = $_GET['dir'];
$direct = str_replace('%', '/', $dir);

// Download file to the dir
$path = "files/".substr($direct, strrpos($direct, "/") + 1);

$ret = ftp_nb_get($link, $path, $direct, FTP_BINARY);
while($ret == FTP_MOREDATA){
    // Echo dots while user wait
    echo ".";
    $ret = ftp_nb_continue($link);
}

if($ret != FTP_FINISHED){
    puterror("<br />Во время загрузки файла произошла ошибка");
}
else{
    echo "<html><head>
    <meta http-equiv='refresh' content='1; url=$path' />
</head></html>";
}
?>