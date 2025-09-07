<?php 

$hostnname = "localhost";
$username = "root";
$password = "";
$database_name = "buku_tamu";

$db = mysqli_connect($hostnname, $username, $password, $database_name);

if ($db->connect_error) {
     echo "koneksi database error";
     die("error!");
}

?>