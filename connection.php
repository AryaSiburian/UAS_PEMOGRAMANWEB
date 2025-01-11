<?php

$host = "localhost";
$username = "root"; 
$password = "";
$database = "daftarelektronik";

$koneksi = mysqli_connect($host, $username, $password, "daftarelektronik");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}