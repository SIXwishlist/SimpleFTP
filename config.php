<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 25.03.2015
 * Time: 21:22
 */
// FTP server
$ftp_server = "ftp.yourserver.com";

// User
$ftp_user = "user";

// Password
$ftp_password = "password";

// set the execution time of the script (120 sec)
set_time_limit(120);

// Trying to establish a connection with the FTP server
 $link = ftp_connect($ftp_server);
if(!$link)
    echo "К сожалению, не удается установить соединение с FTP сервером $ftp_server";

// Registration on a server
$login = ftp_login($link, $ftp_user, $ftp_password);
// $login = ftp_login($con_id, $ftp_user, $ftp_password);
if(!$login)
    puterror("К сожалению, не удается пройти аутентификацию на сервере. Проверьте введенные данные.");

// Small helper function that displays the error message in the browser
function puterror($message){
    echo "<p class='error warning'>$message</p>";
    exit;
}
