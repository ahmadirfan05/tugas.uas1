<?php 
require'function.php';
$anggota = $_GET["nim"];
	if (hapus ($anggota) > 0 ) {
		echo "
		<script> 
				alert('Data Sudah di hapus');
				document.location.href = 'mahasiswa.php';
		</script>
				";
			}else{
				echo "
		<script> 
				alert('Data gagal di dihapus');
				document.location.href = 'mahasiswa.php';
		</script>
				";
			}
 ?>