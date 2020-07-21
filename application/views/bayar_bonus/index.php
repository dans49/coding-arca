  <!-- Begin Page Content -->  
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$judulcontent ?></h1>
      </div>

      <!-- Content Row -->
      <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pegawai </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pegawai->num_rows() ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pembayaran (Bulan ini)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $pembayaran ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

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

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Pembayaran</h6>
            </div>
            <div class="card-body">
              <form action="" method="POST" class="bayartempat">
                <div class="form-group">
                  <label>Pembayaran</label>
                  <input type="number" name="pembayaran" class="form-control" required>
                </div>
                <hr class="sidebar-divider">
                <div class="form-inline">
                <?php
                foreach ($pegawai->result() as $value) {
                ?>
                  <div class="input-group mb-3">
                    <input type="hidden" name="id[]" value="<?=$value->idpegawai ?>" >
                    <input type="number" name="persen[]" max="100" class="form-control" required>
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>&nbsp;
                    <label class="mr-sm-2"><?=$value->nama ?></label>
                  </div>
                <?php
                }
                ?>
                </div>
                <button class="btn btn-dark btn-sm">Simpan</button>
              </form>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mb-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perhitungan Bonus</h6>
            </div>
            <div class="card-body">
              <?php 
              $i = 1;
              foreach ($pegawai->result() as $getPeg) {
              ?>
              <div class="form-group">
                <label><?=$getPeg->nama ?> : Rp 
                  <?php
                  $toba = $this->db->query("SELECT * FROM tot_bayar_bonus WHERE idpegawai='$getPeg->idpegawai' AND waktudata='NOW()' ORDER BY idbonus DESC");
                  if($toba->num_rows() > 0){
                    echo number_format($toba->row()->total_bonus).',-';
                  } else {
                    echo "...";
                  } ?>
                </label>
              </div>
              <?php
                $i++;
              } ?>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->