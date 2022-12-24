<?php
include 'koneksi.php';
$id = $_GET['id_handphone'];

$hasil = $conn->query("DELETE FROM alternative WHERE id_handphone='$id'");

if($hasil){
    echo "<script>
        alert('data berhasil dihapus');
        window.location.href = 'alternative.php'
    </script>";
} else {
    echo "<script>
    alert ('gagal hapus');
    window.location.href= 'alternative.php'
    </script>";
}    