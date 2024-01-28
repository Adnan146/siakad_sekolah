<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Rangking</h4>
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
        <a href="#">Rangking</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Data Kriteria</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=rank&act=add_kriteria" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Kriteria</th>
                  <th>Nilai Bobot</th>
                  <th>Atribut/th>
                  <th>Opsi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($con, "SELECT * FROM data_kriteria");
                foreach ($data as $g) { ?>
                  <tr>
                    <td><?= 'C' . '0' . $no++; ?></td>
                    <td><?= $g['nama_kriteria']; ?></td>
                    <td><?= $g['nilai_bobot']; ?></td>
                    <td><?= $g['atribut']; ?></td>
                    <td>
                      <a class="btn btn-info btn-sm" href="?page=rank&act=edit_kriteria&id=<?= $g['id_kriteria'] ?>"><i class="far fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=rank&act=del_kriteria&id=<?= $g['id_kriteria'] ?>"><i class="fas fa-trash"></i>
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