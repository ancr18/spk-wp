<!-- footeer      -->
<?php include 'view/head.php' ?>
<!-- footeer      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->
<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
   $harga= $_POST['harga'];
   $ram= $_POST['ram'];
   $memori= $_POST['memori'];
   $processor= $_POST['processor'];
   $kamera= $_POST['kamera'];
   
   $hasil= $conn->query("SELECT * FROM kriteria");
   if($hasil->num_rows>0){
      echo "<script> alert('bobot sudah ada!');</script>";
   } else {
      $hasil= $conn->query("INSERT INTO kriteria (harga,ram,memori,processor,kamera)VALUES ('".$harga. "','" . $ram."','" .$memori."','" .$processor."','" .$kamera."' )");
      if($hasil){
         echo "<script> alert('data berhasil diinput');</script>";
      } else{
         echo"<script>alert('gagal input');</script>";
      }
   }
}

?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Kriteria</h1>
      </div>
      <div class="section-body">
         <div class="row">
            <div class="col-md-6 col-lg-6"> 
               <div class="card">
                  <div class="card-header">
                     <h4>Input Bobot Kriteria</h4>
                  </div>
                  <div class="card-body">
                     <form action="" method="POST">
                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label">Harga</label>
                           <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" name="harga" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label">Ram</label>
                           <div class="col-lg-4">
                              <input type="text" class="form-control" name="ram" autocomplete="off" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label">Memori internal</label>
                           <div class="col-lg-4">
                              <input type="text" class="form-control" name="memori" autocomplete="off" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label">Procesor</label>
                           <div class="col-lg-4">
                              <input type="text" class="form-control" name="processor" autocomplete="off" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label">Kamera</label>
                           <div class="col-lg-4">
                              <input type="text" class="form-control" name="kamera" autocomplete="off" required>
                           </div>
                        </div>
                        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                     </form>
                  </div>
               </div>
            </div>

            <div class="col-md-6 col-lg-6">
               <div class="card">
                  <div class="card-header">
                     <h4>Data Bobot</h4>
                  </div>

                  <div class="card-body ">
                     <table class="table text-center">
                        <thead>
                           <tr>
                              <th scope="col">Bobot</th>
                              <th scope="col">Kepentingan</th>
                           </tr>
                        </thead>

                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Tidak Penting</td>
                           </tr>
                            <tr>
                              <td>2</td>
                              <td>Kurang Penting</td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>Cukup Penting</td>
                           </tr>
                           <tr>
                              <td>4</td>
                              <td>Penting</td>
                           </tr>
                           <tr>
                              <td>5</td>
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
                     <h4>Data Bobot</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Harga</th>
                              <th scope="col">RAM</th>
                              <th scope="col">Memori Internal</th>
                              <th scope="col">Processor</th>
                              <th scope="col">Kamera</th>
                         <!--      <th scope="col">Normalisasi</th> -->
                              <th scope="col">action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 0;
                           $hasil= $conn->query("SELECT* FROM kriteria"); 
                           while ($row= $hasil ->fetch_assoc()) { ?>
                              <tr>
                                 <td><?= $no=+1?></td>
                                 <td><?= $row['harga']?></td>
                                 <td><?= $row['ram']?></td>
                                 <td><?= $row['memori']?></td>
                                 <td><?= $row['processor']?></td>
                                 <td><?= $row['kamera']?></td>
                         <!--         <td><?= $row['kamera']?></td> -->
                                 <td>
                                    <a onclick="return confirm ('data ingin di hapus?');" class="btn btn-danger" href="delete_kriteria.php?id_kriteria= <?=$row['id_kriteria'];?>">Delete</a>
                                 </td>
                              </tr>
                              <?php }?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- footeer-->
<?php include 'view/footer.php' ?>