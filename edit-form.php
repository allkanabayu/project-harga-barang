<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<?php
include "koneksi.php";
$koneksiObj = new koneksi();
$koneksi = $koneksiObj->ambilKoneksi();


if($koneksi->connect_error) {
	die("koneksi gagal : " . $koneksi->connect_error);
}else{
	echo "";
}

$qry = "select * from harga_barang where kode='" . 
	$_GET["kode"] . "'";
$data = $koneksi->query($qry);	

if($data->num_rows <= 0) {
	echo "Mas/Mba. .. Isi data sesuai prosedur cukkk!!!";
}else{
	while($hasil = $data->fetch_assoc()){
		global $namaBarang;
		$namaBarang = $hasil["nama_barang"];
		global $harga;
		$harga = $hasil["harga"];
	}

}
?>
<div class="col-lg-12">
<div class="col-md-8">
<h2>Form Edit</h2>
<hr>
<form action="update.php" method="post">
	<div class="form-group">
		<label for="kode">Kode Barang</label>
		<input type="number" name="kode" class="form-control" readonly="true" value=<?php echo $_GET['kode'] ?>
	</div>
	<div class="form-group">
		<label for="nama">Nama Barang</label>
		<input type="text" name="namaBarang" class="form-control" value=<?php echo $namaBarang ?>
	</div>
	<div class="form-group">
		<label for="harga">Harga Barang</label>
		<input type="number" name="harga" class="form-control" value=<?php echo $harga ?>	
	</div>
	</div>
		<input type="submit" value="Simpan" class="btn btn-outline-success">
	</div>
</form>
</div>
</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>