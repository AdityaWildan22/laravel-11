  <!-- Footer -->
  <footer class="sticky-footer bg-primary">
      <div class="container my-auto">
          <div class="copyright text-center my-auto text-light">
              <span>Copyright &copy; Laravel 11 - <?php echo date('Y'); ?></span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5>Logout</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              {{-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> --}}
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <!-- Toastr -->
  <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

  </body>

  </html>
