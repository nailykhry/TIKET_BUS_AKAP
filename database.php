<?php
$servername = "localhost";
$username = "username";
$password = "password";
$db_name = "tiket_akap";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Select from table
$sql = "SELECT * FROM kelas";
$kelas = $conn->query($sql);

$sql2 = "SELECT * FROM pesanan";
$pesanan = $conn->query($sql2);
