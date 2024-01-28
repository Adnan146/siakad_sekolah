<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Rangking </h4>
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
        <a href="#">Rangking Siswa</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Tambah Data Kriteria</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Form Entry Data Kriteria</h3>
        </div>
        <div class="card-body">
          <form action="?page=rank&act=proses" method="post" enctype="multipart/form-data">

            <table cellpadding="3" style="font-weight: bold;">
              <tr>
                <td>Nama Kriteria </td>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama" placeholder="Nama Kriteria"></td>
              </tr>
              <tr>
                <td>Nilai Bobot</td>
                <td>:</td>
                <td><input name="nilai" type="text" class="form-control" placeholder="Nilai Bobot"> </td>
              </tr>
              <tr>
                <td>Atribut</td>
                <td>:</td>
                <td>
                  <select name="atribut" class="form-control">
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <button name="saveKriteria" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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