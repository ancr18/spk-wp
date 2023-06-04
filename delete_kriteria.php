<?php
include 'koneksi.php';
$id = $_GET['id_kriteria'];

$hasil = $conn->query("DELETE FROM kriteria WHERE id_kriteria='$id'");

if($hasil){
    echo "<script>
        alert('data berhasil dihapus');
        window.location.href = 'kriteria.php'
    </script>";
} 