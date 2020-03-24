<div class="content" style="font-size: 15px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12" style="font-size: 15px;">
        <div class="card card-outline card-dark">
          <div class="card-header">
            <div class="float-right"><a href="<?php echo site_url('admin/u_jabatan')?>" class="btn btn-primary btn-sm">Ubah Data</a></div>
          </div>
          <div class="card-body">
            <?php foreach ($isi as $row) { ?>      
            <div class="callout callout-info">      
              <h5><?php echo $row->nm_pejabat1?></h5>
              <p><b><i><?php echo $row->posisi_pejabat1?></i></b></p>
            </div>
            <div class="callout callout-danger">
              <h5><?php echo $row->nm_pejabat2?></h5>
              <p><b><i><?php echo $row->posisi_pejabat2?></i></b></p>
            </div>
            <div class="callout callout-primary">
              <h5><?php echo $row->nm_pejabat3?></h5>
              <p><b><i><?php echo $row->posisi_pejabat3?></i></b></p>
            </div>
            <div class="callout callout-warning">
              <h5><?php echo $row->nm_pejabat4?></h5>
              <p><b><i><?php echo $row->posisi_pejabat4?></i></b></p>
            </div>      
            <div class="callout callout-success">
              <h5><?php echo $row->nm_pejabat5?></h5>
              <p><b><i><?php echo $row->posisi_pejabat5?></i></b></p>
            </div>
            <!-- <div class="callout callout-info">
              <h5><?php echo $row->nm_pejabat1?></h5>
              <p>Ka. Bag. Penjualan</p>
            </div> -->
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>