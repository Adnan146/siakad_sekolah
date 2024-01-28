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
    <div class="card-body">
        <form action="" method="post">
            <div class="table-responsive">
                <table class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Kehadiran</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($con, "SELECT * FROM tb_siswa a, tb_mkelas b where a.id_mkelas='$_GET[id]' and a.id_mkelas=b.id_mkelas ORDER BY a.id_siswa");
                            foreach ($tampil as $g) { ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>.
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
                                    <input type="hidden" value="<? $g['nisn'] ?>" name="<? nisn[$no] ?>">

                                    <td>
                                        <select style="width:100px;" name="a[$no]" class="form-control">
                                            <?php
                                            $kehadiran = mysqli_query($con, "SELECT * FROM kehadiran");
                                            while ($k = mysqli_fetch_array($kehadiran)) {
                                                if ($a[kode_kehadiran] == $k[kode_kehadiran]) {
                                                    echo "<option value='$k[kode_kehadiran]' selected>* $k[nama_kehadiran]</option>";
                                                } else {
                                                    echo "<option value='$k[kode_kehadiran]'>$k[nama_kehadiran]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    <?php } ?>
                                </td>
                            </tr>

                        </tbody>
                       
                    
                </table>
                <button type="submit" name="absen" class="btn btn-primary pull-right">Simpan Absensi</button>
            </div>
            </form>    
    </div>
</div>
</div>
</div>
</div>
<?php
 if (isset($_POST[absen])) {
    $jml_data = count($_POST[nisn]);
    $nisn = $_POST[nisn];

    for ($i = 1; $i <= $jml_data; $i++) {
      $cek = mysqli_query($con, "SELECT * FROM _logabsensi where id_mengajar='$_POST[jdwl]' AND id_siswa='" . $nisn[$i] . "' AND tgl_absen='" . $e . "-" . $f . "-" . $g . "'");
      $total = mysqli_num_rows($cek);
      if ($total >= 1) {
        mysqli_query($con, "UPDATE _logabsensi SET ket = '" . $a[$i] . "' where id_siswa='" . $nisn[$i] . "' AND id_mengajar='$_POST[jdwl]'");
        $cs = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_siswa a JOIN tb_mkelas b ON a.id_mkelas=b.id_mkelas where a.nisn='" . $nisn[$i] . "'"));
        if ($a[$i] != 'H') {
          if ($a[$i] == 'A') {
            $statush = 'Alpa';
          } elseif ($a[$i] == 'S') {
            $statush = 'Sakit';
          } elseif ($a[$i] == 'I') {
            $statush = 'Izin';
          }
        }
      } else {
        mysqli_query($koneksi, "INSERT INTO _logabsensi VALUES('','$_POST[jdwl]','" . $nisn[$i] . "','" . $a[$i] . "','" . $e . "-" . $f . "-" . $g . "','" . date('Y-m-d H:i:s') . "')");
        $cs = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_siswa a JOIN tb_mkelas b ON a.id_mkelas=b.id_mkelas where a.nisn='" . $nisn[$i] . "'"));
        if ($a[$i] != 'H') {
          if ($a[$i] == 'A') {
            $statush = 'Alpa';
          } elseif ($a[$i] == 'S') {
            $statush = 'Sakit';
          } elseif ($a[$i] == 'I') {
            $statush = 'Izin';
          }
        }
      }
    }
    echo "<script>document.location='dashboard.php?page=absen&act=tampilabsen&id=" . $_POST[kelas] . "&kd=" . $_POST[pelajaran] . "&jdwl=" . $_POST[jdwl] . "&gettgl=" . $e . "-" . $f . "-" . $g . "';</script>";
  }
?>