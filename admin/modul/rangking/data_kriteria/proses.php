<?php

if (isset($_POST['saveKriteria'])) {
		$save = mysqli_query($con, "INSERT INTO data_kriteria VALUES(NULL,'$_POST[nama]','$_POST[nilai]','$_POST[atribut]') ");
		if ($save) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=rank&act=kriteria');
				} ,3000);   
				</script>";
		}
	
} elseif (isset($_POST['editKriteria'])) {

	$editsis = mysqli_query($con, "UPDATE data_kriteria SET nama_kriteria='$_POST[nama]',nilai_bobot='$_POST[nilai]',atribut='$_POST[atribut]' WHERE id_kriteria='$_POST[id]'");

	if ($editsis) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=rank&act=kriteria');
				} ,3000);   
				</script>";
	}
}
