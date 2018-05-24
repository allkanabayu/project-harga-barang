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

$qry = "select * from harga_barang";
$data = $koneksi->query($qry);
?>
<div class="col-lg-12">
<div class="col-md-8">
<br>
<h2>Aplikasi Harga Barang</h2>
<hr>
<a href="tambah.php" class="btn btn-outline-primary">Tambah Data</a>
<hr>
<table class="table table-striped table-bordered">
	<thead class="thead-dark">
	<tr>
		<th>KODE</th>
		<th>NAMA BARANG</th>
		<th>HARGA</th>
		<th>Action</th>
	</tr>
	</thead>

<?php
if($data->num_rows <= 0) {
	echo "<tr><td>";
	echo "DATA NIHIL";
	echo "</td></tr>";
}else{
	while($row = $data->fetch_assoc()){
		echo "<tr>";
		echo "<td>" . $row["kode"] . "</td>";
		echo "<td>" . $row["nama_barang"] . "</td>";
		echo "<td>" . $row["harga"] . "</td>";
		echo '<td><a href="edit-form.php?kode=' . 
				$row["kode"] . '" class="btn btn-outline-success">Edit</a>
				<a href="hapus.php?kode=' . 
				$row["kode"] . '" class="btn btn-outline-danger">Hapus</a>
				</td>';
		echo "</tr>";
	}
}
?>

</table>
</div>
</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>