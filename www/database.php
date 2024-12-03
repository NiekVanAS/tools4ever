<?php

$host = 'mariadb';
$user = 'root';
$password =  'password';
$databaseName = 'tools4ever';

$conn = mysqli_connect($host, $user, $password, $databaseName);

// Controleer de verbinding
if(mysqli_connect_error())
{
//  echo "Connection establishing failed!";
}
else
{
//  echo "Connection established successfully.";
}