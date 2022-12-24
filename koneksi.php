<?php 

$conn = mysqli_connect('localhost','root','','spk_wp');


if ($conn->connect_error) {
   die("koneksi gagal :" . $conn->connect_error);
}

?>