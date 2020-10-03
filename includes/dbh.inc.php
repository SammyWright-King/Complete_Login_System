<?php

$Servername="localhost";
$Username = "root";
$Password = "";
$Database = "learningphp";

$conn = mysqli_connect($Servername, $Username, $Password, $Database);

if(!$conn)
{
    die("Connection failed ". mysqli_connect_error());
}
