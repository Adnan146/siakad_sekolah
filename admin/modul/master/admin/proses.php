<?php

if (isset($_POST['saveAdmin'])) {

	$pass = sha1($_POST['password']);

	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_gambar);
	if ($pindah) {
		$save = mysqli_query($con, "INSERT INTO tb_admin VALUES(NULL,'$_POST[nama]','$_POST[username]','$pass','$_POST[status]','$nama_gambar') ");
		if ($save) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=master&act=admin');
				} ,3000);   
				</script>";
		}
	}
} elseif (isset($_POST['editAdmin'])) {

	$pass = sha1($_POST['password']);
	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
		$ganti = mysqli_query($con, "UPDATE tb_admin SET foto='$gambar' WHERE id_guru='$_POST[id]' ");
	}
	$editGuru = mysqli_query($con, "UPDATE tb_admin SET nama_lengkap='$_POST[nama]',username='$_POST[username]', password='$pass' WHERE id_admin='$_POST[id]' ");

	if ($editGuru) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=master&act=admin');
				} ,3000);   
				</script>";
	}
}
