Подождите...
<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 28.03.2015
 * Time: 23:07
 */

// Trying to establish a connection with the FTP server
require_once("config.php");

// Get current dir
$dir = $_GET['dir'];
$direct = str_replace('%', '/', $dir);

// Remove file
if(ftp_delete($link, $direct)){
    // Redirect to admin panel
    echo "
            <html>
                <head>
                    <meta http-equiv='refresh' content='0; url=index.php?dir=".substr($dir, 0, strrpos($dir, "%"))."'>
                </head>
            </html>
    ";
}
else
    puterror('Не удается удалить файл');
?>