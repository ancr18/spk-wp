<!-- footeer      -->
<?php include 'view/head.php' ?>
<!-- footeer      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->
<?php
include 'koneksi.php';

if(isset($_POST['edit'])){
   $id = $_GET['id_handphone'];
   $merek= $_POST['merek'];
   $tipe = $_POST['tipe'];
   $hasil = $conn->query("UPDATE alternative SET merek='$merek', tipe='$tipe' WHERE id_handphone ='$id'");
   if($hasil){
      echo "<script>
      alert('data berhasil diedit');
      window.location.href= 'alternative.php';
      </script>";
   } else{
      echo "<script>
      alert('gagal edit')
      </script>";
   }
}
?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Alternative</h1>
      </div>
      <div class="section-body">
         <div class="card">
            <div class="card-header">
               <h4>Input Data</h4>
            </div>
            <div class="card-body">
               <form action="" method="POST">
                  <?php
                  $id= $_GET['id_handphone'];
                  $hasil = $conn-> query ("SELECT * FROM alternative WHERE id_handphone='$id'");
                  if($hasil->num_rows > 0){
                     $row = $hasil->fetch_assoc();
                     $merek = $row['merek'];
                     $tipe = $row['tipe'];
                  ?>
                  <div class="form-group">
                     <label>Merek Handpone</label>
                     <input type="text" class="form-control" name="merek" required value="<?= $merek ?>">
                  </div>
                  <div class="form-group">
                     <label>Tipe</label>
                     <select name="tipe" class="form-control">
                        <option><?= $tipe; ?></option>
                     </select>
                  </div>
                  <button class="btn btn-primary" name="edit" type="submit">Ubah</button>
                  <?php } ?>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- footeer-->
<?php include 'view/footer.php' ?>