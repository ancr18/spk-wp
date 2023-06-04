<!-- header      -->
<?php include 'view/head.php' ?>
<!-- footer      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->

<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
   $merek= $_POST['merek'];
   $tipe= $_POST['tipe'];

   //hasil data
   $hasil= $conn-> query ("SELECT * FROM alternative WHERE merek='$merek'");
   //cek apakah ada data didalamnya
   if ($hasil-> num_rows>0){
      echo "<script>
      alert('$merek sudah ditambahkan');
      </script>";
   } else 
      $hasil= $conn-> query("INSERT INTO alternative(merek, tipe) VALUES ('$merek', '$tipe') ");
      if($hasil){
         echo "<script>
            alert(data berhasil ditambahkan');
         </script>";
      } else{
         echo "<script>
            alert('gagal input')
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
               <form action="alternative.php" method="POST">

                  <div class="form-group">
                     <label>Merek Handpone</label>
                     <input type="text" class="form-control" name="merek" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                     <label>Tipe</label>
                     <select name="tipe" class="form-control">
                        <option value="Android">Android</option>
                     </select>
                  </div>
                  <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
               </form>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Data Alternative</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Tipe</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 0;
                           $hasil= $conn->query("SELECT * FROM alternative");
                           if($hasil -> num_rows > 0){
                              while ($row = $hasil-> fetch_assoc()){
                           ?>
                           <tr>
                              <td><?= $no +=1 ?></td>
                              <td><?= $row['merek'];?></td>
                              <td><?= $row['tipe'];?></td>
                              <td><a class="btn btn-danger" onclick="return confirm ('data ingin dihapus?');" href= "delete_alternative.php?id_handphone=<?= $row['id_handphone']; ?>">Delete </a>
                              <a class="btn btn-primary" href="edit_alternative.php?id_handphone=<?= $row['id_handphone']?>">Edit</a>
                              
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
   </section>
</div>




<!-- footeer-->
<?php include 'view/footer.php' ?>