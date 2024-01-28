<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['admin'])) {
	?>
	<script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = 'index.php';
	</script>
	<?php
}
?>


<?php

// jumlah siswa
$jumlahSiswa = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_siswa WHERE status=1 "));
// jumlah guru
$jumlahGuru = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_guru WHERE status=1 "));

$id_login = @$_SESSION['admin'];


$sql = mysqli_query($con, "SELECT * FROM tb_admin
 WHERE id_admin = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Administrator | Sistem Akademik</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/> -->
	<link rel="icon" type="image/png" href="../assets/img/logo.png" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="dashboard.php" class="logo">
					<b class="text-white">SMKN 1 Way Bungur</b>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<!-- 	<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->



						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
								aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..."
										class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto'] ?>"
													alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>
													<?= $data['nama_guru'] ?>
												</h4>
												<p class="text-muted">
													<?= $data['email'] ?>
												</p>

											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal"
											data-target="#gantiPassword" class="collapsed">Ganti Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal"
											data-target="#pengaturanAkun" class="collapsed">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..."
								class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $data['nama_lengkap'] ?>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">

									<li>
										<a href="#" data-toggle="modal" data-target="#pengaturanAkun" class="collapsed">
											<span class="link-collapse">Pengaturan Akun</span>
										</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#gantiPassword" class="collapsed">
											<span class="link-collapse">Ganti Password</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="dashboard.php" class="collapsed">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Main Utama</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-folder-open"></i>
								<p>Data Umum</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=master&act=kelas">
											<span class="sub-item">Kelas</span>
										</a>
									</li>

									<li>
										<a href="?page=master&act=semester">
											<span class="sub-item">Semester</span>
										</a>
									</li>

									<li>
										<a href="?page=master&act=ta">
											<span class="sub-item">Tahun Pelajaran</span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=mapel">
											<span class="sub-item">Mata Pelajaran</span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=walas">
											<span class="sub-item"> Wali Kelas </span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=guru">
											<span class="sub-item"> Daftar Guru </span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=kepsek">
											<span class="sub-item"> Kepala Sekolah </span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=siswa">
											<span class="sub-item"> Daftar Siswa </span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=admin">
											<span class="sub-item"> Administrator</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-clipboard-list"></i>
								<p>Jadwal Mengajar</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=jadwal&act=add ">
											<span class="sub-item"> Tambah Jadwal </span>
										</a>
									</li>
									<li>
										<a href="?page=jadwal">
											<span class="sub-item"> Daftar Mengajar </span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#absen">
								<i class="fas fa-clipboard-list"></i>
								<p>Absensi Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="absen">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=absen">
											<span class="sub-item"> Absen Kelas </span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#nilaisiswa">
								<i class="fas fa-clipboard-list"></i>
								<p>Nilai Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="nilaisiswa">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=absen_kelas ">
											<span class="sub-item"> Nilai Siswa </span>
										</a>
									</li>
									<li>
										<a href="?page=absen&act=absen_kelas_update">
											<span class="sub-item">Rekap Nilai Siswa</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#rank">
								<i class="fas fa-clipboard-list"></i>
								<p>Perangkingan Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="rank">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=rank&act=kriteria">
											<span class="sub-item">Data Kreteria</span>
										</a>
									</li>
									<li>
										<a href="?page=rank&act=sub_kriteria">
											<span class="sub-item">Sub Kreteria</span>
										</a>
									</li>
									<li>
										<a href="?page=rank&input_nilai">
											<span class="sub-item"> Input Nilai </span>
										</a>
									</li>
									<li>
										<a href="?page=rank&act=proses_hitung">
											<span class="sub-item">Proses Hitung</span>
										</a>
									</li>
									<li>
										<a href="?page=rank&act=hasil_hitung">
											<span class="sub-item">Hasil Hitung</span>
										</a>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#pembayaran">
								<i class="fas fa-clipboard-list"></i>
								<p>Pembayaran Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="pembayaran">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=absen_kelas ">
											<span class="sub-item">Pembayaran Siswa</span>
										</a>
									</li>
									<li>
										<a href="?page=absen&act=absen_kelas_update">
											<span class="sub-item"> Rekap Pembayaran</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#rekap">
								<i class="fas fa-list-alt"></i>
								<p>Rekap</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="rekap">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=absen_kelas ">
											<span class="sub-item">Rekap Absensi</span>
										</a>
									</li>
									<li>
										<a href="?page=absen_kelas ">
											<span class="sub-item">Rekap Nilai Siswa</span>
										</a>
									</li>
									<li>
										<a href="?page=absen_kelas ">
											<span class="sub-item">Rekap Rangking</span>
										</a>
									</li>
									<li>
										<a href="?page=absen_kelas ">
											<span class="sub-item">Rekap Normalisasi</span>
										</a>
									</li>
									<li>
										<a href="?page=absen&act=absen_kelas_update">
											<span class="sub-item"> Rekap Pembayaran</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item active mt-3">
							<a href="logout.php" class="collapsed">
								<i class="fas fa-arrow-alt-circle-left"></i>
								<p>Logout</p>
							</a>
						</li>

						<!-- 
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label"> <i class="fas fa-arrow-alt-circle-left"></i> </span> Logout</a> 
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];

				//data master
				if ($page == 'master') {
					// kelas
					if ($act == 'kelas') {
						include 'modul/master/kelas/data_kelas.php';
					} elseif ($act == 'delkelas') {
						include 'modul/master/kelas/del.php';
						// semster
					} elseif ($act == 'semester') {
						include 'modul/master/semester/data.php';
					} elseif ($act == 'delsemester') {
						include 'modul/master/semester/del.php';
					} elseif ($act == 'set_semester') {
						include 'modul/master/semester/set.php';
					}
					// tahun ajaran
					elseif ($act == 'ta') {
						include 'modul/master/ta/data.php';
					} elseif ($act == 'delta') {
						include 'modul/master/ta/del.php';
					} elseif ($act == 'set_ta') {
						include 'modul/master/ta/set.php';
						// mapel
					} elseif ($act == 'mapel') {
						include 'modul/master/mapel/data.php';
					} elseif ($act == 'delmapel') {
						include 'modul/master/mapel/del.php';
					}
					//walas
					elseif ($act == 'walas') {
						include 'modul/wakel/data.php';
					}
					//guru
					elseif ($act == 'guru') {
						include 'modul/master/guru/data.php';
					} elseif ($act == 'addguru') {
						include 'modul/master/guru/add.php';
					} elseif ($act == 'editguru') {
						include 'modul/master/guru/edit.php';
					} elseif ($act == 'delguru') {
						include 'modul/master/guru/del.php';
					} elseif ($act == 'prosesguru') {
						include 'modul/master/guru/proses.php';
					} elseif ($act == 'set_guru') {
						include 'modul/master/guru/set.php';
					}
					//kepsek
					elseif ($act == 'kepsek') {
						include 'modul/master/kepsek/data.php';
					} elseif ($act == 'addkepsek') {
						include 'modul/master/kepsek/add.php';
					} elseif ($act == 'editkepsek') {
						include 'modul/master/kepsek/edit.php';
					} elseif ($act == 'delkepsek') {
						include 'modul/master/kepsek/del.php';
					} elseif ($act == 'proseskepsek') {
						include 'modul/master/kepsek/proses.php';
					} elseif ($act == 'set_kepsek') {
						include 'modul/master/kepsek/set.php';
					}
					//siswa
					elseif ($act == 'siswa') {
						include 'modul/master/siswa/data.php';
					} elseif ($act == 'addsiswa') {
						include 'modul/master/siswa/add.php';
					} elseif ($act == 'editsiswa') {
						include 'modul/master/siswa/edit.php';
					} elseif ($act == 'delsiswa') {
						include 'modul/master/siswa/del.php';
					} elseif ($act == 'prosessiswa') {
						include 'modul/master/siswa/proses.php';
					} elseif ($act == 'set_siswa') {
						include 'modul/master/siswa/set.php';
					}
					//admin
					elseif ($act == 'admin') {
						include 'modul/master/admin/data.php';
					} elseif ($act == 'addadmin') {
						include 'modul/master/admin/add.php';
					} elseif ($act == 'editadmin') {
						include 'modul/master/admin/edit.php';
					} elseif ($act == 'deladmin') {
						include 'modul/master/admin/del.php';
					} elseif ($act == 'prosesadmin') {
						include 'modul/master/admin/proses.php';
					} elseif ($act == 'set_admin') {
						include 'modul/master/admin/set.php';
					}
				}
				//jadwal				
				elseif ($page == 'jadwal') {
					if ($act == '') {
						include 'modul/jadwal/data_mengajar.php';
					} elseif ($act == 'add') {
						include 'modul/jadwal/tambah.php';
					} elseif ($act == 'cancel') {
						include 'modul/jadwal/cancel.php';
					}

				} //absen
				elseif ($page=='absen') {
					if ($act=='') {
						include 'modul/absen/absen_siswa.php';
					}elseif ($act=='tampil_absen') {
						include 'modul/absen/tampil_absen.php';
					}elseif ($act=='update_absen') {
						include 'modul/absen/update.php';
					}elseif ($act=='rekap_absen') {
						include 'modul/absen/rekap.php';
					}elseif ($act=='rekap_bulanan') {
						include 'modul/absen/rekap_bulan.php';
					}elseif ($act=='rekap_persemester') {
						include 'modul/absen/rekap_persemester.php';
					}						
				}//nilai
				elseif ($page == 'nilai') {
					if ($act == '') {
						include 'modul/absen/absen_siswa.php';
					} elseif ($act = 'tampil_absen') {
						include 'modul/absen/tampil_absen.php';
					} elseif ($act = 'rekap_absen1') {
						include 'modul/absen/rekap_absen1.php';
					}
					//rangking
				}elseif ($page == 'rank') {
					//data kriteria
					if ($act == 'kriteria') {
						include 'modul/rangking/data_kriteria/data.php';
					} elseif ($act == 'edit_kriteria') {
						include 'modul/rangking/data_kriteria/edit_kriteria.php';
					} elseif ($act == 'proses') {
						include 'modul/rangking/data_kriteria/proses.php';
					} elseif ($act == 'add_kriteria') {
						include 'modul/rangking/data_kriteria/tambah_kriteria.php';
					}elseif ($act == 'del_kriteria') {
						include 'modul/rangking/data_kriteria/del.php';
					}
					//pembayaran
				} elseif ($page == 'pembayaran') {
					if ($act == '') {
						include 'modul/rekap/rekap_absen.php';
					} elseif ($act = 'rekap-perbulan') {
						include 'modul/rekap/rekap_perbulan.php';
					}
					//rekap Laporan
				} elseif ($page == 'rekap') {
					if ($act == '') {
						include 'modul/rekap/rekap_absen.php';
					} elseif ($act = 'rekap-perbulan') {
						include 'modul/rekap/rekap_perbulan.php';
					}
				} elseif ($page == '') {
					include 'modul/home.php';
				} else {
					echo "<b>Tidak ada Halaman</b>";
				}


				?>


				<!-- end -->

			</div>


			<!-- modal ganti password -->
			<div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog"
				aria-labelledby="gantiPass">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="gantiPass">Ganti Password</h4>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label">Password Lama</label>
									<input name="pass" type="text" class="form-control" placeholder="Password Lama">
								</div>
								<div class="form-group">
									<label class="control-label">Password Baru</label>
									<input name="pass1" type="text" class="form-control" placeholder="Password Baru">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button name="changePassword" type="submit" class="btn btn-primary">Ganti
									Password</button>
							</div>
						</form>
						<?php
						if (isset($_POST['changePassword'])) {
							$passLama = $data['password'];
							$pass = sha1($_POST['pass']);
							$newPass = sha1($_POST['pass1']);

							if ($passLama == $pass) {
								$set = mysqli_query($con, "UPDATE tb_admin SET password='$newPass' WHERE id_admin='$data[id_admin]' ");
								echo "<script type='text/javascript'>
												alert('Password Telah berubah')
												window.location.replace('dashboard.php'); 
												</script>";
							} else {
								echo "<script type='text/javascript'>
										alert('Password Lama Tidak cocok')
										window.location.replace('dashboard.php'); 
										</script>";
							}
						}
						?>


					</div>
				</div>
			</div>

			<!--end modal ganti password -->

			<!-- Modal pengaturan akun-->
			<div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan Akun</h3>
						</div>
						<form action="" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" name="nama" class="form-control"
										value="<?= $data['nama_lengkap'] ?>">
									<input type="hidden" name="id" value="<?= $data['id_admin'] ?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="username" class="form-control"
										value="<?= $data['username'] ?>">
								</div>
								<div class="form-group">
									<label>Foto Profile</label>
									<p>
										<img src="../assets/img/user/<?= $data['foto'] ?>" class="img-thumbnail"
											style="height: 50px;width: 50px;">
									</p>
									<input type="file" name="foto">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button name="updateProfile" type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
						<?php
						if (isset($_POST['updateProfile'])) {

							$gambar = @$_FILES['foto']['name'];
							if (!empty($gambar)) {
								move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
								$ganti = mysqli_query($con, "UPDATE tb_admin SET foto='$gambar' WHERE id_admin='$_POST[id]' ");
							}

							$sqlEdit = mysqli_query($con, "UPDATE tb_admin SET nama_lengkap='$_POST[nama]',username='$_POST[username]' WHERE id_admin='$_POST[id]' ") or die(mysqli_error($konek));

							if ($sqlEdit) {
								echo "<script>
                        alert('Sukses ! Data berhasil diperbarui');
                        window.location='dashboard.php';
                        </script>";
							}
						}
						?>
					</div>
				</div>
			</div>
			<!-- end modal pengaturan akun -->






			<footer class="footer">
				<div class="container">
					<div class="copyright ml-auto">
						&copy;
						<?php echo date('Y'); ?> Sistem Akademik SMK Neger 1 Way Bungur (Zuzlifatul Adnan | 2023)
					</div>
				</div>
			</footer>
		</div>


	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<script>
		$(document).ready(function () {
			$('#basic-datatables').DataTable({});

			$('#multi-filter-select').DataTable({
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every(function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function (d, j) {
							select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function () {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
				]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>

</html>