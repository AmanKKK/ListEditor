<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once "config.php";

$connection=mysqli_connect(
   $congig["server"],
   $config["username"],
   $config["password"],
   $config["namedb"]
);

if($connection==false){
   echo 'Не удалость подключиться к серверу';
   echo mysqli_connect_error();
   exit();
}