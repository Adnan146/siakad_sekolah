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
    <div class="col-md-6">
      <select name="s_jurusan" id="s_jurusan" class="form-control">
        <option value="">Tahun Akademik</option>
        <?php
        $kelas = mysqli_query($con, "SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC");
        foreach ($kelas as $g) {
          echo "<option value='$g[id_mkelas]'>$g[nama_kelas]</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-md-6">
      <select name="s_jurusan" id="s_jurusan" class="form-control">
        <option value="">Filter Jurusan</option>
        <option value="Sistem Informasi" <?php if ($s_jurusan == "Sistem Informasi") {
          echo "selected";
        } ?>>Sistem
          Informasi</option>
        <option value="Teknik Informatika" <?php if ($s_jurusan == "Teknik Informatika") {
          echo "selected";
        } ?>>
          Teknik Informatika</option>
      </select>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <button type="submit" name="save" class="btn btn-primary btn-sm text-white"> Cari
        </button>

      </div>
      <div class="card">

        <div class="card-header">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Hari</th>
                  <th>Jam Mengajar</th>
                  <th>Jam Ke</th>
                  <th>Guru</th>
                  <th>Semester</th>
                  <th>Tahun Ajaran</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                $tampil = mysqli_query($con, "SELECT * FROM tb_mengajar
                             INNER JOIN tb_master_mapel ON tb_master_mapel.id_mapel=tb_mengajar.id_mapel
							 INNER JOIN tb_guru ON tb_guru.id_guru=tb_mengajar.id_guru
							 INNER JOIN tb_mkelas ON tb_mkelas.id_mkelas=tb_mengajar.id_mkelas
							 INNER JOIN tb_semester ON tb_semester.id_semester=tb_mengajar.id_semester
							 INNER JOIN tb_thajaran ON tb_thajaran.id_thajaran=tb_mengajar.id_thajaran
                             ORDER BY id_mengajar ASC
                            ");
                foreach ($tampil as $g) { ?>
                  <tr>
                    <td>
                      <?= $no++; ?>.
                    </td>

                    <td>
                      <?= $g['mapel']; ?>
                    </td>
                    <td>
                      <?= $g['nama_kelas']; ?>
                    </td>
                    <td>
                      <?= $g['hari']; ?>
                    </td>
                    <td>
                      <?= $g['jam_mengajar']; ?>
                    </td>
                    <td>
                      <?= $g['jamke']; ?>
                    </td>
                    <td>
                      <?= $g['nama_guru']; ?>
                    </td>
                    <td>
                      <?= $g['semester']; ?>
                    </td>
                    <td>
                      <?= $g['tahun_ajaran']; ?>
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm text-white"
                        href="?page=absen&act=tampil_absen&id=<?= $g['id_mkelas'] ?>&mpl=<?= $g['id_mapel'] ?>&jdwl=<?= $g['id_mengajar'] ?>">Tampilan
                        Absen</a>
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