<?php

// koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'test');

// cek nis
if (isset($_POST['nis'])) {
	$nis = $_POST['nis'];

	$query = mysqli_query($conn, "SELECT nis FROM tb_test WHERE nis = '$nis'");	

	if($query->num_rows > 0) {
		echo "<script>alert('NIS sudah terdaftar');</script>";
	} else {
		mysqli_query($conn, "INSERT INTO tb_test (nis) VALUES ('$nis')");
	}
}

// tampilkan data
$stmt = mysqli_query($conn, "SELECT nis FROM tb_test");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Validasi data yang sudah ada didatabase dengan PHP</title>
</head>
<body>

	<h3>Contoh validasi NIS</h3>

	<form method="POST" action="">
		<label for="nis">Masukan NIS</label>
		<input type="text" name="nis" id="nis">
		<button type="submit" name="submit">Kirim</button>
	</form>
	
	<br/>
	<hr/>
	<br/>

	<table border="1">
		<tr>
			<td>No.</td>
			<td>NIS</td>
		</tr>

		<?php
		$no = 1;
		foreach ($stmt as $rows) :
		?>
			
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $rows['nis']; ?></td>
		</tr>

		<?php endforeach; ?>

	</table>

</body>
</html>