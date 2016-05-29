<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "autoLoad";

$connect = mysqli_connect($host, $user, $password, $database);

mysqli_query($connect, 'SET NAMES utf8');

