      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Coding Challenge by Arca International 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <audio id="onourway" src="<?=base_url() ?>assets/source/Final Fantasy VII - Ahead on Our Way [HQ].mp3" loop></audio>
  <audio loop id="aeris" src="<?=base_url() ?>assets/source/Final Fantasy VII - Aerith's Theme [HQ].mp3"></audio>
  <audio loop id="aerith" src="<?=base_url() ?>assets/source/Final Fantasy 7 Remake Aerith Theme (Credits).mp3"></audio>
  <audio loop id="tifa" src="<?=base_url() ?>assets/source/Tifa's Theme.mp3"></audio>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#dataTable').DataTable();

      var getOnourway   = document.getElementById('onourway');
      var getAeris      = document.getElementById('aeris');
      var getAerith     = document.getElementById('aerith');
      var getTifa       = document.getElementById('tifa');

      getPlay = new Array(4);
      getPlay[0] = getOnourway;
      getPlay[1] = getAeris;
      getPlay[2] = getAerith;
      getPlay[3] = getTifa;

      //menentukan random index
      index = Math.floor(Math.random() * getPlay.length);

      var got = getPlay[index];
      
      got.pause();
      got.currentTime=0;
      got.play();

      $('.bayartempat').on('submit', function(e){
          e.preventDefault();
          var data = $('.bayartempat').serialize();
          $.ajax({
              type: 'POST',
              url: "<?=site_url('beranda/savebayar') ?>",
              data: data,
              success: function(response){
                  location.reload();
              }
          });
      });
    });
    
  </script>

</body>

</html>