<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Digital Project Board</title>

  <!-- Font Awesome Icons -->
  <link rel="icon" href="<?php echo base_url() ?>dist/img/icon.png">
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    @media screen and (max-width: 720px) {
      #wait{
        top: 50%;
        left: 25%;
      }
    }

    @media screen and (min-width: 720px){
      #wait{
        top: 40%;
        left: 40%;
      } 
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
       <a href="<?php echo base_url() ?>" class="navbar-brand">
        <img src="<?php echo base_url() ?>dist/img/icon.png" alt="AdminLTE Logo" class="brand-image"
             style="opacity: .8">
        <span class="brand-text" style="font-size: 1.3rem;">Digital Project Board</span>
      </a>
      
      

      <div class="navbar-collapse order-3 collapse" id="navbarCollapse" style="">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo base_url('project') ?>" class="nav-link"><i class="fa fa-cogs"></i> Project</a>
          </li> 
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-clipboard-check"></i> Checklist
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('check/linewise') ?>">Line Wise</a>
              <a class="dropdown-item" href="<?php echo base_url('check') ?>">Project Wise</a>              
            </div>
          </li>
          <!-- <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-clipboard-check"></i> Checklist</a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url('saving') ?>" class="nav-link"><i class="fa fa-hand-holding-usd"></i> Saving</a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('andonalert') ?>" class="nav-link"><i class="fa fa-stopwatch"></i> Downtime</a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url('plan') ?>" class="nav-link"><i class="fa fa-calendar-alt"></i> Plan</a>
          </li>
          
          
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3"></form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <button class="navbar-toggler order-1 collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <li class="nav-item">
            <a href="<?php echo base_url('login/logout') ?>" class="nav-link"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-sign-out-alt"></i> Sign out</button></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"></div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <?php $this->load->view($content); ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->  
  <!-- /.control-sidebar -->  
</div>
<div id="wait" style="display:none;width:auto;height:89px;position:absolute;padding:2px;"><img src='<?php echo base_url() ?>dist/img/ring.gif'/></div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>
<!-- <script src="<?php echo base_url() ?>dist/js/project.js"></script> -->
<script src="<?php echo base_url() ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  
<!-- <script src="<?php echo base_url() ?>dist/js/project.js"></script> -->
<script>
    $('.textarea').summernote({
      toolbar: []
    });
    $('.select2').select2({
      theme: 'bootstrap4'
    });
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
    $("#example1").DataTable();    
</script>
</body>
</html>
