<?php 
require'function.php';
$anggota = $_GET["kd_matakuliah"];
	if (hapusmk ($anggota) > 0 ) {
		echo "
		<script> 
				alert('Data Sudah di hapus');
				document.location.href = 'matakuliah.php';
		</script>
				";
			}else{
				echo "
		<script> 
				alert('Data gagal di dihapus');
				document.location.href = 'matakuliah.php';
		</script>
				";
			}
 ?>