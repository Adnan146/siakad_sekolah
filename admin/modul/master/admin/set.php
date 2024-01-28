<?php
$id = $_GET['id'];
if ($_GET['status'] == 0) {
  $non = mysqli_query($con, "UPDATE tb_admin SET status=0 WHERE id_admin='$id' ");

  echo " <script>
        window.location='?page=master&act=admin';
        </script>";
} else {
  $aktifkan = mysqli_query($con, "UPDATE tb_admin SET status=1 WHERE id_admin='$id' ");
  echo " <script>
        window.location='?page=master&act=admin';
        </script>";
}
