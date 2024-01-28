<?php
$id = $_GET['id'];
if ($_GET['status'] == 0) {
  $non = mysqli_query($con, "UPDATE tb_siswa SET status=0 WHERE id_siswa='$id' ");

  echo " <script>
        window.location='?page=master&act=siswa';
        </script>";
} else {
  $aktifkan = mysqli_query($con, "UPDATE tb_siswa SET status=1 WHERE id_siswa='$id' ");
  echo " <script>
        window.location='?page=master&act=siswa';
        </script>";
}
