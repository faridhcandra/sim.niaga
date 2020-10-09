<!-- <a href="<?php echo site_url('stok');?>">stok</a>
<a href="<?php echo site_url('gudang');?>">gudang</a>
<a href="<?php echo site_url('pembelian');?>">pembelian</a>
<a href="<?php echo site_url('admin');?>">admin</a> -->
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/dist/img/favicon.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/style.css">
  <title>SIM Beli Niaga,Gudang dan Stok</title>
</head>
<body class="home">
  <div class="container">
    <br>
    <img width="110" height="110" style="display: block; margin-left: auto; margin-right: auto;" src="<?php echo base_url();?>assets/dist/img/logo.png" class="img-fluid center" alt="Responsive image"><br>    
    <h3 align="center">SISTEM INFORMASI PEMBELIAN NIAGA,GUDANG DAN STOK</h3>
    <h3 align="center">KOPERASI GKBI MEDARI</h3> 
    <br><br><br>
  <div class="row justify-content-center" align="center">
     <div class="col-md-3">
      <div class="btn btn-outline-dark btn-block">
       <a href="<?php echo site_url('stok');?>"><div class="card-body"><h5>STOK</h5></div></a>
     </div>
     </div>
     <div class="col-md-3">
      <div class="btn btn-outline-dark btn-block">
        <a href="<?php echo site_url('gudang');?>"><div class="card-body"><h5>GUDANG</h5></div></a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="btn btn-outline-dark btn-block">
        <a href="<?php echo site_url('pembelian');?>"><div class="card-body"><h5>PEMBELIAN</h5></div></a>
      </div>
    </div>
	  <div class="col-md-3">
      <div class="btn btn-outline-dark btn-block">
        <a href="<?php echo site_url('admin');?>"><div class="card-body"><h5>ADMIN</h5></div></a>
      </div>
    </div>
  </div>
</div>
<!-- Optional JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>