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
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=master&act=addsiswa" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Guru</th>
                  <th>Tahun Ajaran</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                $siswa = mysqli_query($con, "SELECT * FROM tb_siswa
                             INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
                             ORDER BY id_siswa ASC
                            ");
                foreach ($siswa as $g) { ?>
                  <tr>
                    <td><?= $no++; ?>.</td>

                    <td><?= $g['nis']; ?></td>
                    <td><?= $g['nama_siswa']; ?></td>
                    <td><?= $g['nama_kelas']; ?></td>
                    <td><?= $g['tempat_lahir']; ?></td>
                    <td><?= $g['tgl_lahir']; ?></td>
                    <td><?= $g['jk']; ?></td>
                    <td><?= $g['alamat']; ?></td>
                    <td><img src="../assets/img/user/<?= $g['foto'] ?>" width="45" height="45"></td>
                    <td><?php if ($g['status'] == '1') {
                          echo "<span class='badge badge-success'>Aktif</span>";
                        } else {
                          echo "<span class='badge badge-danger'>Off</span>";
                        } ?></td>
                    <td><?= $g['th_angkatan']; ?></td>
                    <td>
                      <a class="btn btn-info btn-sm" href="?page=master&act=editsiswa&id=<?= $g['id_siswa'] ?>"><i class="far fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delsiswa&id=<?= $g['id_siswa'] ?>"><i class="fas fa-trash"></i>
                      </a>

                    </td>
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