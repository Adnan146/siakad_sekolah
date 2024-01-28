<?php
$del = mysqli_query($con, "DELETE FROM tb_admin WHERE id_guru=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=admin';
		</script>";
}
