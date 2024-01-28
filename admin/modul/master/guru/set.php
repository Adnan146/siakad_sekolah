<?php
$id = $_GET['id'];
if ($_GET['status'] == 0) {
  $non = mysqli_query($con, "UPDATE tb_guru SET status=0 WHERE id_guru='$id' ");

  echo " <script>
        window.location='?page=master&act=guru';
        </script>";
} else {
  $aktifkan = mysqli_query($con, "UPDATE tb_guru SET status=1 WHERE id_guru='$id' ");
  echo " <script>
        window.location='?page=master&act=guru';
        </script>";
}
