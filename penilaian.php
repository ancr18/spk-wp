<!-- header      -->
<?php include 'view/head.php' ?>
<!-- navbar      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->
<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
   $merek = $_POST['merek'];
   $harga = $_POST['harga'];
   $ram = $_POST['ram'];
   $memori = $_POST['memori'];
   $processor = $_POST['processor'];
   $kamera = $_POST['kamera'];

   $hasil = $conn->query("SELECT * FROM penilaian WHERE merek='$merek'");
   if ($hasil->num_rows > 0) {
      echo "<script> alert('merek sudah diinputkan !'); 
      </script>";
   } else {
      $hasil = $conn->query("INSERT INTO penilaian(merek,harga,ram,memori,processor,kamera) VALUES 
      ('$merek', '$harga', '$ram', '$memori', '$processor', '$kamera') ");

      if ($hasil) {
         echo "<script> 
         alert('data berhasil diinput');</script>";
      } else {
         echo "<script> alert('gagal input');</script>";
      }
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
            <div class="col-lg-8">
               <div class="card">
                  <div class="card-header">
                     <h4>Input Data Penilaian</h4>
                  </div>
                  <div class="card-body">
                     <form action="" method="post">
                        <div class="form-group">
                           <label>Merek Handpone</label>
                           <select name="merek" class="form-control col-lg-8">
                              <?php $hasil = $conn->query("SELECT merek FROM alternative");
                        while ($row = $hasil->fetch_assoc()) { ?>
                        <option><?= $row['merek']; ?></option>
                        <?php } ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Harga</label>
                           <select name="harga" id="" class="form-control col-lg-8">
                              <option>--Silahkan Pilih--</option>
                              <option value="5">(5) Rp.1.000.000 - Rp. 1.999.000</option>
                              <option value="4">(4) Rp.2.000.000 - Rp. 4.999.000</option>
                              <option value="3">(3) Rp.5.000.000 - Rp. 7.999.000</option>
                              <option value="2">(2) Rp.8.000.000 - Rp. 9.999.000</option>
                              <option value="1">(1) > Rp.10.000.000</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>RAM</label>
                           <select name="ram" id="" class="form-control col-lg-8">
                              <option>--Silahkan Pilih--</option>
                              <option value="1">(1) 3 GB</option>
                              <option value="2">(2) 4 GB</option>
                              <option value="3">(3) 6 GB</option>
                              <option value="4">(4) 8 GB</option>
                              <option value="5">(5) 12 Gb</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Memori Internal</label>
                           <select name="memori" id="" class="form-control col-lg-8">
                              <option>--Silahkan Pilih--</option>
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
                              <option>--Silahkan Pilih--</option>
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
                              <option>--Silahkan Pilih--</option>
                              <option value="1">(1) 12 MP</option>
                              <option value="2">(2) 16 MP </option>
                              <option value="3">(3) 24 MP</option>
                              <option value="4">(4) 32 MP</option>
                              <option value="5">(5) 48 MP</option>
                           </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                     </form>
                  </div>
               </div>
            </div>

            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <h4>Bobot Penilaian</h4>
                  </div>
                  <div class="card-body">
                     <table class="table text-center">
                        <thead>
                           <tr>
                              <th scope="col">Bobot</th>
                              <th scope="col">Kepentingan</th>
                           </tr>
                        </thead>

                        <tbody>
                           <tr>
                              <td>(1)</td>
                              <td>Tidak Penting</td>
                           </tr>
                            <tr>
                              <td>(2)</td>
                              <td>Kurang Penting</td>
                           </tr>
                           <tr>
                              <td>(3)</td>
                              <td>Cukup Penting</td>
                           </tr>
                           <tr>
                              <td>(4)</td>
                              <td>Penting</td>
                           </tr>
                           <tr>
                              <td>(5)</td>
                              <td>Sangat Penting</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Data Penilaian</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Harga</th>
                              <th scope="col">RAM</th>
                              <th scope="col">Memori Internal</th>
                              <th scope="col">Processor</th>
                              <th scope="col">Kamera</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 0;
                           $hasil = $conn->query("SELECT * FROM penilaian");
                           if ($hasil->num_rows > 0) {
                              while ($row = $hasil->fetch_assoc()) {
                                 ?>
                                 <tr>
                                    <td><?= $no +=1 ?></td>
                                    <td><?= $row['merek'] ?></td>
                                    <td><?= $row['harga'] ?></td>
                                    <td><?= $row['ram'] ?></td>
                                    <td><?= $row['memori'] ?></td>
                                    <td><?= $row['processor'] ?></td>
                                    <td><?= $row['kamera'] ?></td>
                                    <td><a class="btn btn-danger btn-flat rounded"
                                  href="delete_penilaian.php?id_penilaian=<?= $row["id_penilaian"];?>" onclick="return confirm('data ingin di hapus?')"><i class="fa fa-trash">/</i></a>
                                  <a class="btn btn-primary  btn-flat rounded" href="edit_penilaian.php?id_penilaian=<?=$row["id_penilaian"]; ?>"><i class= "fa fa-pen"></i></a>

                           </td>
                        </tr>
                        <?php } 
                        } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
</div>

<!-- footeer-->
<?php include 'view/footer.php' ?>