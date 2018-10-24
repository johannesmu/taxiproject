<?php
$host = getenv('HOST');
$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$database = getenv('DATABASE');

$connection = mysqli_connect(
    $host,
    $username,
    $password,
    $database);
if( $connection == false ){
    echo "database connection error";
}
?>