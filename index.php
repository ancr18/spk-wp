<!-- footeer      -->
<?php include 'view/head.php' ?>
<!-- footeer      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->
<?php include 'koneksi.php';
   $call= $conn->query("SELECT * FROM alternative");
   $count= $call-> num_rows;
   $call1= $conn->query("SELECT * FROM kriteria");
   $count1= $call1-> num_rows;
?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Home</h1>
      </div>

      <div class="section-body">
         <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
               <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                     <i class="fas fa-circle"></i>
                  </div>
                  <div class="card-wrap">
                     <div class="card-header">
                        <h4>Alternative</h4>
                     </div>
                     <div class="card-body">
                     <?= $count; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
               <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                     <i class="far fa-newspaper"></i>
                  </div>
                  <div class="card-wrap">
                     <div class="card-header">
                        <h4>Kriteria</h4>
                     </div>
                     <div class="card-body">
                     <?= $count1; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
               <div class="jumbotron">
                  <h1 class="display-4">Selamat Datang</h1>
                  <p class="lead">Sistem Pendukung Keputusan Pemilihan Handpone Android menggunakan Metode Weighted Product</p>
                  <hr class="my-4">
                  <p class="lead">
                     <a class="btn btn-primary btn-lg" href="alternative.php" role="button">Tambah Data</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- footeer-->
<?php include 'view/footer.php' ?>