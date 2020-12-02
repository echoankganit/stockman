<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'stockman');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (mysqli_connect_errno()) {
    printf("Connect failed 1: %s\n", mysqli_connect_error());
    exit();
   }

   $db2 = new mysqli('localhost','root','','svf_stockman');
   if (mysqli_connect_errno()) {
    printf("Connect failed 2: %s\n", mysqli_connect_error());
    exit();
   }
?>