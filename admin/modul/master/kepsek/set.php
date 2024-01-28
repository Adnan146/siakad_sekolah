<?php
$id = $_GET['id'];
if ($_GET['status'] == 0) {
  $non = mysqli_query($con, "UPDATE tb_kepsek SET status=0 WHERE id_kepsek='$id' ");

  echo " <script>
        window.location='?page=master&act=kepsek';
        </script>";
} else {
  $aktifkan = mysqli_query($con, "UPDATE tb_kepsek SET status=1 WHERE id_kepsek='$id' ");
  echo " <script>
        window.location='?page=master&act=kepsek';
        </script>";
}
