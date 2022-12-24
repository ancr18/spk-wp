
<!-- header      -->
<?php include 'view/head.php' ?>
<!-- navbar      -->
<?php include 'view/navbar.php' ?>
<!-- Content -->
<?php
include 'koneksi.php';

?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Alternative</h1>
      </div>

      <div class="section-body">
         <div class="row">

            <!-- MATRIKS X -->
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Matriks X</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead class="text-center">
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Harga</th>
                              <th scope="col">RAM</th>
                              <th scope="col">Memori Internal</th>
                              <th scope="col">Processor</th>
                              <th scope="col">Kamera</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no1= 0;
                           $hasil= $conn-> query ("SELECT * FROM penilaian");
                           if ($hasil-> num_rows >0) {
                              while ($row = $hasil-> fetch_assoc()){
                           ?>
                              <tr>
                                 <td class="text-center"><?= $no1 += 1 ?></td>
                                 <td><?= $row['merek'];?></td>
                                 <td class="text-center"><?= $row['harga'];?></td>
                                 <td class="text-center"><?= $row['ram'];?></td>
                                 <td class="text-center"><?= $row['memori'];?></td>
                                 <td class="text-center"><?= $row['processor'];?></td>
                                 <td class="text-center"><?= $row['kamera'];?></td>
                              </tr>      
                           <?php }
                           } ?> 
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <!-- PENUTUP MATRIKS X -->

            <!-- NILAI NORMALISASI -->
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Nilai Normalisasi</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr class="text-center">
                              <th scope="col">Harga</th>
                              <th scope="col">Ram</th>
                              <th scope="col">Memori internal</th>
                              <th scope="col">Processor</th>
                              <th scope="col">Kamera</th>
                              <!-- <th scope="col">Jumlah</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $no= 0;
                           $b1= '';
                           $b2= '';
                           $b3= '';
                           $b4= '';
                           $b5= '';
                           //mengambil bobot dari kriteria
                           $hasil = $conn->query("SELECT * FROM kriteria");
                           if ($hasil->num_rows > 0) {
                              $row = $hasil->fetch_assoc();
                              $b1= $row['harga'] * -1;
                              $b2= $row['ram'];
                              $b3= $row['memori'];
                              $b4= $row['processor'];
                              $b5= $row['kamera'];
                           }
                           $jumlah = $b1 + $b2 + $b3 + $b4 + $b5;

                           $c1 = number_format($b1/$jumlah/2,3);
                           $c2 = number_format($b2/$jumlah/2,3);
                           $c3 = number_format($b3/$jumlah/2,3);
                           $c4 = number_format($b4/$jumlah/2,3);
                           $c5 = number_format($b5/$jumlah/2,3);
                           $c6 = number_format($c2+$c3+$c4+$c5-$c1,3);
                            ?>
                            <tr class="text-center">
                               <td><?= $c1;?></td>
                               <td><?= $c2;?></td>
                               <td><?= $c3;?></td>
                               <td><?= $c4;?></td>
                               <td><?= $c5;?></td>
                               <!-- <td><b><?= $c6;?></b></td> -->
                            </tr>
                        </tbody>
                     </table>
                  </div>
               </div>

            <!-- PENUTUP NILAI NORMALISASI -->

            <!-- VEKTOR S -->
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Vektor S</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr  class="text-center">
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Vektor S</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                          
                           //mengosongkan nilai pada tabel perangkingan
                           $hasil = $conn-> query("TRUNCATE TABLE perhitungan");
                           //ambil data penilaian
                           $hasil= $conn->query ("SELECT * FROM penilaian");
                           if ($hasil-> num_rows> 0){
                              while ($row= $hasil->fetch_assoc()){
                                 //mencari nilai vektor S
                                 $nilai_vektors = round(
                                    pow($row['harga'], $c1)*
                                    pow($row['ram'], $c2)*
                                    pow($row['memori'], $c3)*
                                    pow($row['processor'], $c4)*
                                    pow($row['kamera'], $c5),
                                    2
                                 );
                                 $merek=$row['merek'];
                                 $hasil_hitung = $conn->query("INSERT INTO perhitungan(merek, vektors) VALUES ('$merek', '$nilai_vektors')");
                              }
                           }
                           //ambil data hasil perangkingan
                            $no2 = 0;
                           $hasil= $conn-> query("SELECT * FROM perhitungan");
                           if($hasil->num_rows>0){
                              while($row= $hasil->fetch_assoc()){
                           ?>
                              <tr  class="text-center">
                                 <td  class="text-center"><?= $no2 =+1; ?></td>
                                 <td><?= $row ['merek']; ?></td>
                                 <td class="text-center"><?= $row ['vektors']; ?></td>
                              </tr>
                            <?php  }
                           }?>
                        </tbody>

                        <thead>
                           <?php $jumlah = $conn->query("SELECT SUM(vektors) AS hasil1 FROM perhitungan");
                           while ($row = $jumlah->fetch_assoc()) {
                               $hasil = number_format($row['hasil1'],3);
                           };
                           ?>
                           <tr class="text-center">
                              <th scope="col" colspan="2" class="text-center">Jumlah</th>
                              <th scope="col"><?= $hasil; ?></th>
                           </tr>
                        </thead>
                        
                     </table>
                  </div>
               </div>
            </div>
             <!-- PENUTUP VEKTOR S -->

             <!-- VEKTOR V -->
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Vektor V</h4>
                  </div>
                  <div class="card-body">
                     <table class="table text-center">
                        <thead>

                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Vektor V</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                           $no3 = 0;
                           $hasil = $conn->query("SELECT SUM(vektors) FROM perhitungan");
                           $row = $hasil->fetch_row();
                           $total = $row[0];

                           //kosongkan table perankingan
                           $hasil = $conn->query("TRUNCATE TABLE perangkingan");

                           //mencari hasil vektor v
                           $hasil = $conn->query("SELECT * FROM perhitungan");
                           if ($hasil->num_rows > 0) {
                              //mencari nilai vektor v
                              while ($row = $hasil->fetch_assoc()) {
                                 $nilai = round($row['vektors'] / $total, 4);
                                 $merek = $row['merek'];

                                 $hasil_perankingan = $conn->query("INSERT INTO perangkingan(merek,hasil) VALUES ('$merek','$nilai')");
                              }
                           }
                           $hasil = $conn->query("SELECT * FROM perangkingan");
                           if ($hasil->num_rows > 0) {
                              while ($row = $hasil->fetch_assoc()) {
                                 ?>
                                 <tr>
                                    <td><?= $no3+= 1 ?></td>
                                    <td><?= $row['merek']; ?></td>
                                    <td><?= $row['hasil']; ?></td>
                              </tr>
                           <?php   }
                           } ?>
                        </tbody>
                        <thead>
                           <?php $jumlah = $conn->query("SELECT SUM(hasil) AS hasil1 FROM perangkingan");
                           while ($row = $jumlah->fetch_assoc()) {
                               $hasil = round($row['hasil1']);
                           };
                           ?>
                           <tr>
                              <th scope="col" colspan="2" class="text-center">Jumlah</th>
                              <th scope="col"><?= $hasil; ?></th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
            <!-- PENUTUP VEKTOR V -->

            <!-- HASIL PERANKINGAN -->
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Hasil rangking</h4>
                  </div>
                  <div class="card-body">
                     <table class="table text-center">
                        <thead>
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Vektor</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no5 = 0;
                           $hasil = $conn->query("SELECT * FROM perangkingan ORDER BY hasil DESC");
                           if ($hasil->num_rows > 0) {
                              while ($row = $hasil->fetch_assoc()) {
                                 ?>
                                 <tr>
                                    <td><?= $no5 += 1 ?></td>
                                    <td><?= $row ['merek']; ?></td>
                                    <td><?= $row ['hasil']; ?></td>
                              </tr>
                           <?php }
                           } ?>
                        </tbody>

                        <thead>
                           <?php
                           $no5 = 0;
                           $hasil = $conn->query("SELECT * FROM perangkingan ORDER BY hasil DESC LIMIT 1");
                           if ($hasil->num_rows > 0) {
                              while ($row = $hasil->fetch_assoc()) {
                                 ?>
                                 <tr class="text-center">
                                    <th colspan="3">Rekomendasi HP Android adalah <u><?= $row ['merek']; ?></u> dengan nilai <u><?= $row ['hasil']; ?></u></td>
                                 </tr>
                           <?php }
                           } ?>
                        </thead>

                     </table>
                  </div>
               </div>
            </div>
            <!-- HASIL PERANKINGAN -->


         </div>
      </div>
   </div>
   </section>
</div>

<!-- footeer-->
<?php include 'view/footer.php' ?>
<!-- 
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Hasil rangking</h4>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Merek</th>
                              <th scope="col">Vektor</th>
                           </tr>
                        </thead>
                        <tbody>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

 footeer
 <?php include 'view/footer.php' ?> --> 

