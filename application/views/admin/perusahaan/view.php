<div class="container" style="font-size: 15px;">
  <div class="card  card-outline card-dark">
    <div class="card-header">
      <div class="float-right"><a href="<?php echo site_url('admin/u_perusahaan')?>" class="btn btn-primary btn-sm">Ubah Data</a></div>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <tbody>
          <?php foreach ($isi as $row) { ?>
          <tr>
            <td>Perusahaan</td>
            <td><?php echo $row->nm_company?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><?php echo $row->almt_company?></td>       
          </tr>
          <tr>
            <td>Provinsi</td>
            <td><?php echo $row->nm_provinsi?></td>
          </tr>
          <tr>
            <td>Kabupaten</td>
            <td><?php echo $row->nm_kabupaten?></td>
          </tr>
          <tr>
            <td>Telpon</td>
            <td><?php echo $row->telp_company?></td>
          </tr>
          <tr>
            <td>Fax</td>
            <td><?php echo $row->fax_company?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $row->email_company?></td>
          </tr>
          <tr>
            <td>Nama Pejabat 1</td>
            <td><?php echo $row->nm_pejabat1?></td>
          </tr>
          <tr>
            <td>Jabatan 1</td>
            <td><?php echo $row->posisi_pejabat1?></td>
          </tr>
          <tr>
            <td>Nama Pejabat 2</td>
            <td><?php echo $row->nm_pejabat2?></td>
          </tr>
          <tr>
            <td>Jabatan 2</td>
            <td><?php echo $row->posisi_pejabat2?></td>
          </tr>
          <tr>
            <td>Nama Pejabat 3</td>
            <td><?php echo $row->nm_pejabat3?></td>
          </tr>
          <tr>
            <td>Jabatan 3</td>
            <td><?php echo $row->posisi_pejabat3?></td>
          </tr>
          <tr>
            <td>Nama Pejabat 4</td>
            <td><?php echo $row->nm_pejabat4?></td>
          </tr>
          <tr>
            <td>Jabatan 4</td>
            <td><?php echo $row->posisi_pejabat4?></td>
          </tr>
          <tr>
            <td>Nama pejabat 5</td>
            <td><?php echo $row->nm_pejabat5?></td>
          </tr>
          <tr>
            <td>Jabatan 5</td>
            <td><?php echo $row->posisi_pejabat5?></td>
          </tr>
          <tr>
            <td>N.P.W.P.</td>
            <td><?php echo $row->npwp_company?></td>
          </tr>
          <tr>
            <td>No.Seri</td>
            <td><?php echo $row->noseri_company?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>