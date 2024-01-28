<?php

if (isset($_POST['saveSiswa'])) {

	$pass = sha1($_POST['password']);
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_gambar);

	if ($pindah) {
		$save = mysqli_query($con, "INSERT INTO tb_siswa VALUES(NULL,'$_POST[nisn]','$_POST[nama]','$_POST[tempat]','$_POST[tgl]','$_POST[jk]','$_POST[alamat]','$pass','$nama_gambar','$_POST[status]','$_POST[th_masuk]','$_POST[kelas]') ");
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
				window.location.replace('?page=master&act=siswa');
				} ,3000);   
				</script>";
		}
	}
} elseif (isset($_POST['editSiswa'])) {

	$pass = sha1($_POST['password']);
	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
		$ganti = mysqli_query($con, "UPDATE tb_siswa SET foto='$gambar' WHERE id_siswa='$_POST[id]' ");
	}

	$editsis = mysqli_query($con, "UPDATE tb_siswa SET nisn='$_POST[nisn]',nama_siswa='$_POST[nama]',tempat_lahir='$_POST[tempat]',tgl_lahir='$_POST[tgl]',jk='$_POST[jk]',alamat='$_POST[alamat]',password='$pass',th_angkatan='$_POST[th_masuk]',id_mkelas='$_POST[kelas]' WHERE id_siswa='$_POST[id]'");

	if ($editsis) {
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
				window.location.replace('?page=master&act=siswa');
				} ,3000);   
				</script>";
	}
}
