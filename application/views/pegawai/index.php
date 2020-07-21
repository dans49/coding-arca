  <!-- Begin Page Content -->  
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$judulcontent ?></h1>
      </div>

      <?php if (@$this->session->flashdata('gagal')): ?>
      <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card bg-danger text-white shadow">
              <div class="card-body">
                <?=$this->session->flashdata('gagal');?>
              </div>
            </div>
        </div>
      </div>
      <?php endif?>
      <?php if (@$this->session->flashdata('berhasil')): ?>
      <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card bg-success text-white shadow">
              <div class="card-body">
                <?=$this->session->flashdata('berhasil');?>
              </div>
            </div>
        </div>
      </div>
      <?php endif?>
      <!-- Content Row -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data</h6>
            </div>
            <div class="card-body">
              <div class="">
                <table class="table table-striped"  id="dataTable" width="100%">
                  <thead>
                    <tr>
                      <th width="10%">No</th>
                      <th>Nama</th>
                      <th width="20%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($pegawai->result() as $value) {
                    ?>
                    <tr>
                      <td><?=$no++ ?></td>
                      <td><?=$value->nama ?></td>
                      <td>
                        <a href="<?=site_url('home/pegawai/edit/'.$value->idpegawai) ?>" class="btn btn-warning btn-circle btn-sm"><span class="fas fa-edit"></span></a>
                        <a href="<?=site_url('home/pegawai/hapus/'.$value->idpegawai) ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin akan menghapusnya?')"><span class="fas fa-trash"></span></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mb-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data </h6>
            </div>
            <div class="card-body">
              <form action="<?=site_url('home/pegawai/tambah') ?>" method="POST" class="form-inline was-validated">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group mx-sm-3">  
                  <button class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->