<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 25.03.2015
 * Time: 21:53
 */

// Trying to establish a connection with the FTP server
require_once("config.php");

// Determine type of operating system
$type = ftp_systype($link);

// Closes the connection if the operating system is not UNIX.
if($type != "UNIX")
    puterror("К сожалению, на удаленном сервере операционная система не совместимая с UNIX");

// Extract from the query string value directory
if(isset($_GET['dir']))
    $dir = $_GET['dir'];
// Replace characters "%" on "/"
$dir = str_replace("%", "/", $dir);

// Get all the files root directory
$file_list = ftp_rawlist($link, $dir);

// Closes the connection
ftp_close($link);

// Show current dir
echo "<p class='show_dir default'>Текущая папка - ftp://$ftp_server.$dir</p>";

// If the current directory is not the root, show link up one level
if($dir != "/"){
    // Remove from the variable $ dir latest directory
    $pos = strrpos($dir, '/');
    if($pos > 0)
        $dirup = substr($dir, 0, $pos);
    else
        $dirup = "/";
    echo "<a href='index.php?dir=".str_replace('/', '%', $dirup).">Вверх</a>";
}

// Show contents of a directory in the table
echo <<<PRINTTABLE
<table>
    <tr>
        <td>Права доступа</td>
        <td>Блоки</td>
        <td>Группа</td>
        <td>Пользователь</td>
        <td>Размер (байт)</td>
        <td>Дата создания</td>
        <td>Тип</td>
        <td colspan="2">Действия</td>
    </tr>
PRINTTABLE;
foreach($file_list as $file){
    list(
        $acc,
        $blocks,
        $group,
        $user,
        $size,
        $month,
        $day,
        $year,
        $file
    ) = preg_split("/[\s]+/", $file);

    // If the file starts with a dot ignore it
    if(substr($file, 0, 1)) continue;

    // Delete link
    $delete = "-";
    $edit = "-";
    if($dir != "/")
        $url = str_replace('/', '25%', $dir.'/'.$file);
    else
        $url = str_replace('/', '25%', $dir.$file);

    // The object is a dir ?
    if(substr($acc, 0, 1)){
        $file = "<a href=index.php?dir=$url>$file</a>";
        $delete = "<a href=rmdir.php?dir=$url>Удалить</a>";
        $file = "<a href=chdirform.php?dir=$url&acc=$acc>Исправить</a>";
        $file = "&lt;DIR&gt;"; // "<DIR>"
    }

    // The object is a file ?
    if(substr($acc, 0, 1) == "-"){
        $file = "<a href=download.php?dir=$url>$file</a>";
        $delete = "<a href=rmfile.php?dir=$url>Удалить</a>";
        $edit = "<a href=editfileform.php?dir=$url>Исправить</a>";
    }

    // Table again
    echo <<<PRINTTABLE
<tr>
    <td>$acc</td>
    <td>$blocks</td>
    <td>$group</td>
    <td>$size</td>
    <td>$day $month $year</td>
    <td>$file</td>
    <td>$delete</td>
    <td>$edit</td>
</tr>
PRINTTABLE;
};
echo "</table>";

// Link to make dir and upload file
echo "<a href=mkdirform.php?dir=".str_replace('/', '25%', $dir).">Создать каталог</a>";
echo "<a href=uploadform.php?dir=".str_replace('/', '25%', $dir).">Загрузить файл</a>";

