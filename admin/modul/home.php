<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administrator</h2>
				<h5 class="text-white op-7 mb-2">Selamat Datang, <b class="text-warning"><?= $data['nama_lengkap']; ?></b> | Sistem Akademik</h5>
			</div>
			<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">
						<center>
							<img src="../assets/img/logo.png" width="100">
							<br>
							<b>SMK Negeri 1 Way Bungur</b>
						</center>
					</div>
					<div class="card-category">
						<center>
							Jl. Winong - Pucakwangi Km 01 Kec. Winong Kab. Pati Kode Pos 59181
							<br>Email : mtsnegeripati@gmail.com Telp.081222333444
						</center>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<!-- 	<div class="card-header">
									<h4 class="card-title">Nav Pills With Icon (Horizontal Tabs)</h4>
								</div> -->
				<div class="card-body">

					<div class="row">

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Total Siswa</p>
												<h4 class="card-title"><?php echo $jumlahSiswa; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-default card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-user-tie"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Total Guru</p>
												<h4 class="card-title"><?php echo $jumlahGuru; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>




					</div>






				</div>
			</div>
		</div>
	</div>
</div>



</div>