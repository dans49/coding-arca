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

        <div class="col-lg-12 mb-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data </h6>
            </div>
            <div class="card-body">
              <form action="<?=site_url('home/pegawai/update/'.$id) ?>" method="POST" class="form-inline was-validated">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$nama ?>" required>
                </div>
                <div class="form-group mx-sm-3">  
                  <button class="btn btn-primary">Simpan</button> &nbsp;
                  <a href="<?=site_url('home/pegawai') ?>" class="btn btn-dark">Kembali</a>
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