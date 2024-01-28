<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Siswa</h4>
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
        <a href="#">Data Master</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Tambah Siswa</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Form Entry Siswa</h3>
        </div>
        <div class="card-body">
          <form action="?page=master&act=prosessiswa" method="post" enctype="multipart/form-data">

            <table cellpadding="3" style="font-weight: bold;">
              <tr>
                <td>Nama Peserta Didik </td>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama" placeholder="Nama lengkap"></td>
              </tr>
              <tr>
                <td>NIS/NISN</td>
                <td>:</td>
                <td><input name="nisn" type="text" class="form-control" placeholder="NIS/NISN"> </td>
              </tr>
              <tr>
                <td>Tempat,Tanggal Lahir </td>
                <td>:</td>
                <td><input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir"></td>
                <td>/</td>
                <td><input type="date" class="form-control" name="tgl" placeholder="Tanggal Lahir"></td>
              </tr>
              <tr>
                <td>Jenis Kelamin </td>
                <td>:</td>
                <td>
                  <select name="jk" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Alamat Peserta Didik </td>
                <td>:</td>
                <td><textarea name="alamat" class="form-control"></textarea></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" class="form-control" name="password" placeholder="Masukan password"></td>
              </tr>
              <tr>
                <td>Kelas Siswa</td>
                <td>:</td>
                <td>
                  <select class="form-control" name="kelas">
                    <option>Pilih Kelas</option>
                    <?php
                    $sqlKelas = mysqli_query($con, "SELECT * FROM tb_mkelas 
        ORDER BY id_mkelas ASC");
                    while ($kelas = mysqli_fetch_array($sqlKelas)) {
                      echo "<option value='$kelas[id_mkelas]'>$kelas[nama_kelas]</option>";
                    }
                    ?>
                  </select>
                </td>
              </tr>

              </tr>
              <tr>
                <td>Tahun Masuk</td>
                <td>:</td>
                <td><input name="th_masuk" type="number" class="form-control" placeholder="2019"></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td> <select class="form-control" name="status">
                    <option>Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                </td>
              </tr>
              <tr>
                <td>Pas Foto</td>
                <td>:</td>
                <td><input type="file" class="form-control" name="foto"></td>
              </tr>
              <tr>
                <td colspan="3">
                  <button name="saveSiswa" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  <a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>