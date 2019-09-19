<?php
 session_start();
 // connect to database
$host ='localhost';
$dbuser ='root';
$dbpassword ='';
$dbname ='db_flatlab';
$db = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
?>