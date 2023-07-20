<?php 
$conn = mysqli_connect("localhost","root","","db_uas");
	function query($query) {
		global $conn;
		$result = mysqli_query($conn,$query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$telepon = htmlspecialchars($data["tgl_lahir"]);
	$email = htmlspecialchars($data["jenis_kelamin"]);
	$query = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$alamat','$telepon','$email')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambahdos($data){
	global $conn;
$id = htmlspecialchars($data["nidn"]);
$nama = htmlspecialchars($data["nama_dosen"]);
$query = "INSERT INTO dosen VALUES ('$id','$nama')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function tambahmk($data){
	global $conn;
$id = htmlspecialchars($data["kd_matakuliah"]);
$nama = htmlspecialchars($data["nama_matakuliah"]);
$sks = htmlspecialchars($data["sks"]);
$query = "INSERT INTO mata_kuliah VALUES ('$id','$nama','$sks')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}


function hapus ($anggota){
	global $conn;
	mysqli_query($conn,"DELETE FROM mahasiswa WHERE nim = '$anggota'");
	return mysqli_affected_rows($conn);
}
 
function hapusdos ($anggota){
	global $conn;
	mysqli_query($conn,"DELETE FROM dosen WHERE nidn = '$anggota'");
	return mysqli_affected_rows($conn);
}

 
function hapusmk ($anggota){
	global $conn;
	mysqli_query($conn,"DELETE FROM mata_kuliah WHERE kd_matakuliah = '$anggota'");
	return mysqli_affected_rows($conn);
}

function ubah ($data){
	global $conn;
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$telepon = htmlspecialchars($data["tgl_lahir"]);
	$email =htmlspecialchars($data["jenis_kelamin"]);
	$query = "UPDATE mahasiswa SET
			nim = '$nim',
			nama = '$nama',
			alamat = '$alamat',
			tgl_lahir = '$telepon',
			jenis_kelamin = '$email'
			WHERE nim = '$nim'
	";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubahmk ($data){
	global $conn;
	$nim = htmlspecialchars($data["kd_matakuliah"]);
	$nama = htmlspecialchars($data["nama_matakuliah"]);
	$alamat = htmlspecialchars($data["sks"]);
	$query = "UPDATE mahasiswa SET
			kd_matakuliah = '$nim',
			nama_matakuliah = '$nama',
			sks = '$alamat',
			WHERE kd_matakuliah = '$nim'
	";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
				WHERE nama LIKE '%$keyword%'
				";
				return query($query);
}

function register($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data ["password"]);
	$password2 = mysqli_real_escape_string($conn,$data ["password2"]);


	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)){
			echo "<script>
				alert('Akun sudah Terdaftar!');
					</script>";
					return false;
		}

	// pengecekan ppasowrd confirm

	if ($password !== $password2 ) {
		echo "<script>
		alert('Konfirmasi Password Salah!!')
			</script>";
			return false;
	}
	// enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES ('$username', '$password');");

	return mysqli_affected_rows($conn);
}
?>