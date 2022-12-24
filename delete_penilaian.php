<?php
include 'koneksi.php';
$id = $_GET['id_penilaian'];

$hasil = $conn->query("DELETE FROM penilaian WHERE id_penilaian='$id'");

if($hasil){
    echo "<script>
        alert('data berhasil dihapus');
        window.location.href = 'penilaian.php'
    </script>";
} else {
    echo "<script>
    alert ('gagal hapus');
    window.location.href= 'penilaian.php'
    </script>";
}    