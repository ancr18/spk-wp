<?php include 'view/head.php' ?>
<!-- footer      -->
<?php include 'view/navbar.php' ?>

<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1>Weight Product</h1>
		</div>

		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Pengertian Weight Product</h4>
				</div>
				<div class="card-body">
					<p class="text-justify">Metode weighted product merupakan metode untuk menyelesaikan Multi Attribute Decision Making (MADM). Weighted Product menggunakan teknik perkalian untuk menghubungkan rating attribute, dimana rating tiap atribut harus dipangkatkan terlebih dahulu dengan atribut bobot yang bersangkutan. Langkah-langkah yang dilakukan dalam penyelesaian masalah menggunakan metode Weighted Product adalah sebagai berikut :</p>
					<ol class="text-justify">
						<li>Normalisasi atau Perbaikan Bobot
							<p>Rumus : <img src="https://latex.codecogs.com/gif.latex?W_j&space;=&space;\frac{W_j}{\sum&space;W_j}" title="W_j = \frac{W_j}{\sum W_j}"/></p>
							<p>Melakukan normalisasi atau perbaikan bobot untuk menghasilkan nilai <img src="https://latex.codecogs.com/gif.latex?W_j&space;=&space;1" title="Wj = 1" /> dimana <img src="https://latex.codecogs.com/gif.latex?j&space;=&space;1,&space;2,&space;...,&space;n" title="j = 1, 2, ..., n" /> adalah banyak alternatif dan <b><img src="https://latex.codecogs.com/gif.latex?{\sum&space;W_j}" title="{\sum W_j}" /></b> adalah jumlah keseluruhan nilai bobot</p>
						</li>

						<li>Menentukan Nilai Vektor (S)
							<p>Rumus : <img src="https://latex.codecogs.com/gif.latex?Si&space;=&space;\prod^n_{j-1}&space;X_{ij}&space;W_j&space;\prod^n_{j-1}&space;X_{ij}&space;W_j" title="Si = \prod^n_j-1 Xij Wj \prod^n_{j-1} X_{ij} W_j" /></p>
							<p><img src="https://latex.codecogs.com/gif.latex?i&space;=&space;1,&space;2,&space;...,&space;n" title="i = 1, 2, ..., n" /></p>
							<p>Menentukan nilai vektor <b>(S)</b> dengan cara mengalikan seluruh kriteria dengan alternatif hasil normalisasi atau perbaikan bobot yang berpangkat positif untuk kriteria keuntungan (benefit) dan yang berpangkat negatif untuk kriteria biaya (cost). Dimana <b>(S)</b> merupakan preferensi kriteria, <b>(x)</b> merupakan nilai kriteria dan <b>(n)</b> merupakan banyaknya kriteria</p>
						</li>

						<li>Menentukan Nilai Vektor (V)
							<p>Rumus : <img src="https://latex.codecogs.com/gif.latex?Vi&space;=&space;\frac{\prod_{j=1}^{n}X_i_j&space;W_j}{\prod_{j=1}^{n}\left&space;(X^{j}_{w}&space;\right&space;)W_j}" title="Vi = \frac{\prod_{j=1}^{n}X_i_j W_j}{\prod_{j=1}^{n}\left (X^{j}_{w} \right )W_j}" /></p>
							<p>Menentukan nilai vektor <b>(V)</b> dimana vektor <b>(V)</b> merupakan preferensi alternatif yang akan digunakan untuk perankingan dari masing-masing jumlah nilai vektor <b>(S)</b> dengan jumlah seluruh nilai vektor <b>(S)</b></p>

						</li>

					</ol>

				</div>
			</div>
		</div>
	</div>
</div>


<?php include 'view/footer.php' ?>