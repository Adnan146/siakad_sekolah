<?php
$d = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_mkelas where id_mkelas='$_GET[id]'"));
$m = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_master_mapel where id_mapel='$_GET[mpl]'"));
?>

<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Absen Siswa</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Absen</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Absen Siswa</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">KELAS (
					<?= strtoupper($d['nama_kelas']) ?> )
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">
					<?= strtoupper($m['mapel']) ?>
				</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">

				<div class="card-body">

					<div class="table-responsive">
						<table class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>NISN</th>
									<th>Nama Siswa</th>
									<th>Jenis Kelamin</th>
									<th>Pertemuan</th>
									<th>Hadir</th>
									<th>Sakit</th>
									<th>Izin</th>
									<th>Alpa</th>
									<th>
										<center>Kehadiran %</center>
									</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$no = 1;
								$tampil = mysqli_query($con, "SELECT * FROM tb_siswa WHERE tb_siswa.id_mkelas='$_GET[id]' ORDER BY tb_siswa.id_siswa");
								foreach ($tampil as $g) {
									$total = mysqli_num_rows(mysqli_query($con, "SELECT * FROM _logabsensi where id_mengajar='$_GET[jdwl]' ORDER BY tgl_absen"));
									$hadir = mysqli_num_rows(mysqli_query($con, "SELECT * FROM _logabsensi where id_mengajar='$_GET[jdwl]' AND id_siswa='$g[id_siswa]' AND ket='H'"));
									$sakit = mysqli_num_rows(mysqli_query($con, "SELECT * FROM _logabsensi where id_mengajar='$_GET[jdwl]' AND id_siswa='$g[id_siswa]' AND ket='S'"));
									$izin = mysqli_num_rows(mysqli_query($con, "SELECT * FROM _logabsensi where id_mengajar='$_GET[jdwl]' AND id_siswa='$g[id_siswa]' AND ket='I'"));
									$alpa = mysqli_num_rows(mysqli_query($con, "SELECT * FROM _logabsensi where id_mengajar='$_GET[jdwl]' AND id_siswa='$g[id_siswa]' AND ket='A'"));
									$persen = $hadir / $total * 100;
									// var_dump($total);
									// die();
								?>
									<tr>
										<td>
											<?= $no++; ?>
										</td>

										<td>
											<?= $g['nisn']; ?>
										</td>
										<td>
											<?= $g['nama_siswa']; ?>
										</td>
										<td>
											<?= $g['jk']; ?>
										</td>
										<td>
											<?= $total ?>
										</td>
										<td>
											<?= $hadir ?>
										</td>
										<td>
											<?= $sakit ?>
										</td>
										<td>
											<?= $izin ?>
										</td>
										<td>
											<?= $alpa ?>
										</td>
										<td align=right><?= $persen ?> %</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>



	</div>
</div>