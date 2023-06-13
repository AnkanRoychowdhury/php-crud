<?php

$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'ideaapp';

$conn = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_NAME);

if($conn === false){
    die("Couldn't connect to Database" . mysqli_connect_error() );
}


?>