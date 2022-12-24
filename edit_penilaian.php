<!-- header      -->
<?php include 'view/head.php' ?>
<!-- navbar      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->
<?php
include 'koneksi.php';

if(isset($_POST['edit'])) {
   $get_id_penilaian= $_GET['id_penilaian'];
   $merek= $_POST['merek'];
   var_dump($merek);
   $harga= $_POST['harga'];
   $ram= $_POST['ram'];
   $memori= $_POST['memori']; 
   $processor= $_POST['processor'];
   $kamera= $_POST['kamera'];

   $hasil= $conn->query("UPDATE penilaian SET merek='$merek',harga='$harga', ram='$ram', memori='$memori', processor='$processor', kamera='$kamera' WHERE id_penilaian='$get_id_penilaian'");
   if($hasil){
      echo "<script>
         alert('data berhasil di edit!');
         window.location.href='penilaian.php';
      </script>";
   } else{
      echo"<script>
      alert('gagal diedit!');
      </script>";
   }
}


?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Penilaian</h1>
      </div>
      <div class="section-body">
         <div class="row">
            <div class="col-lg-10">
               <div class="card">
                  <div class="card-header">
                     <h4>Edit Data Penilaian</h4>
                  </div>
                  <div class="card-body">
                     <form action="" method="post">
                        <?php
                        $id_penilaian= $_GET['id_penilaian'];
                        $hasil= $conn->query("SELECT *FROM penilaian WHERE id_penilaian=$id_penilaian");
                        if($hasil->num_rows>0){
                           $row= $hasil-> fetch_assoc();
                        ?>   
                        <div class="form-group">
                           <label>Merek Handpone</label>
                           <input type="text" name="merek" class="form-control col-lg-8" value="<?=$row['merek'];?>">
                        </div>
                        <div class="form-group">
                           <label>Harga</label>
                           <select name="harga" id="" class="form-control col-lg-8">
                              <option><?= $row['harga'];?></option>
                              <option value="5">(5) Rp.1.000.000 - Rp. 1.999.000</option>
                              <option value="4">(4) Rp.2.000.000 - Rp. 4.999.000</option>
                              <option value="3">(3) Rp.5.000.000 - Rp. 7.999.000</option>
                              <option value="2">(2) Rp.8.000.000 - Rp. 9.999.000</option>
                              <option value="1">(1) > Rp.10.000.000</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Ram</label>
                           <select name="ram" id="" class="form-control col-lg-8">
                              <option><?= $row['harga'];?></option>
                              <option value="1">(1) 3 GB</option>
                              <option value="2">(2) 4 GB</option>
                              <option value="3">(3) 6 GB</option>
                              <option value="4">(4) 8 GB</option>
                              <option value="5">(5) 12 Gb</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Memori internal</label>
                           <select name="memori" id="" class="form-control col-lg-8">
                              <option><?= $row['memori'];?></option>
                              <option value="1">(1) 16 GB</option>
                              <option value="2">(2) 32 GB</option>
                              <option value="3">(3) 64 GB</option>
                              <option value="4">(4) 120 GB</option>
                              <option value="5">(5) 256 GB</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Processor</label>
                           <select name="processor" class="form-control col-lg-8">
                              <option><?= $row['processor'];?></option>
                              <option value="1">(1) Kirin 970</option>
                              <option value="2">(2) Snapdragon 835</option>
                              <option value="3">(3) Exynos 9810</option>
                              <option value="4">(4) Kirin 980</option>
                              <option value="5">(5) Snapdragon 845</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Kamera</label>
                           <select name="kamera" class="form-control col-lg-8">
                              <option><?= $row['kamera'];?></option>
                              <option value="1">(1) 12 MP</option>
                              <option value="2">(2) 16 MP </option>
                              <option value="3">(3) 24 MP</option>
                              <option value="4">(4) 32 MP</option>
                              <option value="5">(5) 48 MP</option>
                           </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit">simpan</button>
                        <?php } ?>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- footeer-->
<?php include 'view/footer.php' ?>