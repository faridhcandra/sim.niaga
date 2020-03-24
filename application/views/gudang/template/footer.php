</div>
<!-- Main Footer -->
<footer class="main-footer text-sm">
  <i>Copyright &copy; 2014-2019 <b>Adminlte.io</b>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Developed By <b><?php echo config_item('web_developed');?></b></i>
    </div>
  </footer>
</div>
<!-- ./wrapper -->
</body>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- pace-progress -->
<script src="<?php echo base_url();?>assets/plugins/pace-progress/pace.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Toastr -->
<!-- <script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script> -->

<script>
  // Add active class to the current button (highlight it)
  var header = document.getElementById("mySidebar");
  var btns = header.getElementsByClassName("nav-link");
  var btns = header.getElementsByClassName("nav-link");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
  // Datatable
  $('#example2').DataTable({
      "deferRender" : true,
      "processing"  : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "order": [],
      "info": true,
      "autoWidth": false,
  });
  // Toastr
  <?php if ($this->session->flashdata('success')) {?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php } else if ($this->session->flashdata('error')) {?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php } else if ($this->session->flashdata('warning')) {?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
  <?php } else if ($this->session->flashdata('info')) {?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
  <?php }?>
  // Totips 
  $(function () {
    $('[data-toggle="tooltip"]').tooltip({
        placement: "auto",
        container: 'body',
    });
  })

</script>
</html>