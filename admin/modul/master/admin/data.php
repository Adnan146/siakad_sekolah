<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Administrator</h4>
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
        <a href="#">Administrator</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=master&act=addadmin" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                $admin = mysqli_query($con, "SELECT * FROM tb_admin");
                foreach ($admin as $g) { ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $g['nama_lengkap']; ?></td>
                    <td><?= $g['username']; ?></td>
                    <td><?php if ($g['status'] == '1') {
                          echo "<span class='badge badge-success'>Aktif</span>";
                        } else {
                          echo "<span class='badge badge-danger'>Off</span>";
                        } ?></td>
                    <td><img src="../assets/img/user/<?= $g['foto'] ?>" width="45" height="45"></td>
                    <td>
                      <?php
                      if ($g['status'] == 0) {
                      ?>
                        <a onclick="return confirm('Yakin Aktifkan   ??')" href="?page=master&act=set_admin&id=<?= $g['id_admin'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                      <?php

                      } else {
                      ?>
                        <a onclick="return confirm('Yakin NonAktifkan  ??')" href="?page=master&act=set_admin&id=<?= $g['id_admin'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                      <?php
                      }

                      ?>
                      <a class="btn btn-info btn-sm" href="?page=master&act=editadmin&id=<?= $g['id_admin'] ?>"><i class="far fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=deladmin&id=<?= $g['id_admin'] ?>"><i class="fas fa-trash"></i>
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