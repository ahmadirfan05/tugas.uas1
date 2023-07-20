<?php 
require'function.php';
$anggota = $_GET["nidn"];
	if (hapusdos ($anggota) > 0 ) {
		echo "
		<script> 
				alert('Data Sudah di hapus');
				document.location.href = 'dosen.php';
		</script>
				";
			}else{
				echo "
		<script> 
				alert('Data gagal di dihapus');
				document.location.href = 'dosen.php';
		</script>
				";
			}
 ?>