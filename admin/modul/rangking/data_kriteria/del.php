<?php
$del = mysqli_query($con, "DELETE FROM data_kriteria WHERE id_kriteria=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=rank&act=kriteria';
		</script>";
}
