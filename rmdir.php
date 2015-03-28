Подождите...
<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 28.03.2015
 * Time: 21:08
 */
// Trying to establish a connection with the FTP server
require_once("config.php");

// Get current dir
$dir = $_GET['dir'];
$direct = str_replace('%', '/', $dir);

// If current dir is not empty we can't remove that
$list_file = ftp_nlist($link, $direct);
if(count($list_file) >1 )
    puterror("Не восзможно удалить директорию, так как она содержит файлы");

// If current dir is empty just remove that
if(ftp_rmdir($link, $direct)){
    // Redirect to admin panel
    echo "
            <html>
                <head>
                    <meta http-equiv='refresh' content='0; url='index.php?dir=".substr($dir, 0, strrpos($dir, "%"))."'>
                </head>
            </html>
    ";
}
else
    puterror('Не удается удалить директорию');
?>