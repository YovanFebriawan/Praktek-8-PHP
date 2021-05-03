<!-- Mendefinisikan tipe berupa html -->
<!DOCTYPE html>
<html>
<head>
<!-- Menghubungkan file dengan url -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Menambahkan css -->
<style>
	/* Merubah warna */
	.warning {color: #FF0000;}
</style>
</head>
<body>
<!-- Menambahkan skrip php -->
<?php
// Mendefnisikan fungsi dalam keadaan kosong
$error_nama = "";
$error_email = "";
$error_web = "";
$error_pesan = "";
$error_telp = "";
$nama = "";
$email = "";
$web = "";
$pesan = "";
$telp = "";
// Mengecek form menggunakan method post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Mengecek variabel nama
	if (empty($_POST["nama"])) {
		// Menyimpan text ke dalam fungsi
		$error_nama = "Nama tidak boleh kosong";
	// Dieksekusi ketika kondisi dalam keadaan salah
	} else{
		// Mengambil data dan disimpan ke dalam fungsi
		$nama = cek_input($_POST["nama"]);
		// Mengecek kondisi fungsi
		if (preg_match("/^[a-zA-Z]*$/",$nama)) {
			// Menyimpan text ke dalam fungsi
			$error_nama = "Inputan hanya boleh huruf dan spasi";
		}
	}
	// Mengecek variabel email
	if (empty($_POST["email"])) {
		// Menyimpan text ke dalam fungsi
		$error_email = "Email tidak boleh kosong";
	// Dieksekusi ketika kondisi dalam keadaan salah
	} else{
		// Mengambil data dan disimpan ke dalam fungsi
		$email = cek_input($_POST["email"]);
		// Mengecek kondisi fungsi
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// Menyimpan text ke dalam fungsi
			$error_email = "Format email Invalid";
		}
	}
	// Mengecek variabel pesan
	if (empty($_POST["pesan"])) {
		// Menyimpan text ke dalam fungsi
		$error_pesan = "Pesan tidak boleh kosong";
	// Dieksekusi ketika kondisi dalam keadaan salah
	} else{
		// Mengambil data dan disimpan ke dalam fungsi
		$pesan = cek_input($_POST["pesan"]);	
	}
	// Mengecek variabel web
	if (empty($_POST["web"])) {
		// Menyimpan text ke dalam fungsi
		$error_web = "Website tidak boleh kosong";
	// Dieksekusi ketika kondisi dalam keadaan salah
	} else{
		// Mengambil data dan disimpan ke dalam fungsi
		$web = cek_input($_POST["web"]);
		// Mengecek kondisi fungsi
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.:]*[-a-z0-9+&@#\/%?=~_|]/i",$web)) {
			$error_web = "URL tidak valid";
		}
	}
	// Mengecek variabel telp
	if (empty($_POST["telp"])) {
		// Menyimpan text ke dalam fungsi
		$error_telp = "Telepon tidak boleh kosong";
	} else{
		// Mengambil data dan disimpan ke dalam fungsi
		$telp = cek_input($_POST["telp"]);
		if (!is_numeric($telp)) {
			// Menyimpan text ke dalam fungsi
			$error_telp = "Nomor HP hanya boleh angka";
		}
	}
}
// Menyimpan proses
function cek_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<!-- Mengelompokkan elemen -->
<div class="row">
 <div class="col-md-6">
  <div class="card">
   <div class="card-header">
    Contoh Validasi Form dengan PHP
   </div>
   <div class="card-body">
   	<!-- Mendefinisikan form -->
   	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   	 <div class="form-group row">
   	 	<!-- Mendefinisikan label -->
   	 	<label for="nama" class="col-sm-2 col-form-label">Nama</label>
   	 	<div class="col-sm-10">
   	 		<!-- Membuat kolom input nama -->
   	 		<input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : ""); ?>" id="nama" placeholder="Nama" value="<?php echo $nama; ?>"> <span class="warning"><?php echo $error_nama; ?></span>
   	 	</div>
   	 </div>
   	 <!-- Mengelompokkan elemen -->
   	 <div class="form-group row">
   	 	<!-- Mendefinisikan label -->
   	 	<label for="email" class="col-sm-2 col-form-label">Email</label>
   	 	<div class="col-sm-10">
   	 		<!-- Membuat kolom input email -->
   	 		<input type="email" name="email" class="form-control <?php echo ($error_email !="" ? "is-invalid" : ""); ?>" id="email" placeholder="Email" value="<?php echo $email; ?>"> <span class="warning"><?php echo $error_email; ?></span>
   	 	</div>
   	 </div>
   	 <!-- Mengelompokkan elemen -->
   	 <div class="form-group row">
   	 	<!-- Mendefinisikan label -->
   	 	<label for="web" class="col-sm-2 col-form-label">Website</label>
   	 	<div class="col-sm-10">
   	 		<!-- Membuat kolom input web -->
   	 		<input type="text" name="web" class="form-control <?php echo ($error_web !="" ? "is-invalid" : ""); ?>" id="web" placeholder="Web" value="<?php echo $web; ?>"> <span class="warning"><?php echo $error_web; ?></span>
   	 	</div>
   	 </div>
   	 <!-- Mengelompokkan elemen -->
   	 <div class="form-group row">
   	 	<!-- Mendefinisikan label -->
   	 	<label for="telp" class="col-sm-2 col-form-label">Telp</label>
   	 	<div class="col-sm-10">
   	 		<!-- Membuat kolom input telp -->
   	 		<input type="text" name="telp" class="form-control <?php echo ($error_telp !="" ? "is-invalid" : ""); ?>" id="web" placeholder="Telp" value="<?php echo $telp; ?>"> <span class="warning"><?php echo $error_telp; ?></span>
   	 	</div>
   	 </div>
   	 <!-- Mengelompokkan elemen -->
   	 <div class="form-group row">
   	 	<!-- Mendefinisikan label -->
   	 	<label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
   	 	<div class="col-sm-10">
   	 		<!-- Membuat kolom input pesan -->
   	 		<textarea name="pesan" class="form-control <?php echo ($error_web !="" ? "is-invalid" : ""); ?>"><?php echo $pesan; ?></textarea><span class="warning"><?php echo $error_pesan; ?></span>
   	 	</div>
   	 </div>
   	 <!-- Mengelompokkan elemen -->
   	 <div class="form-group row">
   	  <div class="col-sm-10">
   	  	<!-- Membuat tombol submit -->
   	  	<button type="submit" class="btn btn-primary">Sign in</button>
   	  </div>
   	 </div>
   	</form>
   </div>
  </div>
 </div>
</div>
<!-- Menambahkan skrip php -->
<?php
// Mencetak teks
echo "<h2>Your Input:</h2>";
echo "Nama = ".$nama;
echo "<br>";
echo "Email = ".$email;
echo "<br>";
echo "Website = ".$web;
echo "<br>";
echo "Telp = ".$telp;
echo "<br>";
echo "Pesan = ".$pesan;
?>
</body>
</html>