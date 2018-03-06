<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mt-5">
  <div class="row mb-5">
    <div class="col-md-3 col-lg-3 border-right"><img class="w-100" src="<?php echo base_url();?>images/<?php echo $data->gambar;?>"></div>
    <div class="col-md-9 col-lg-9 ">
      <div class="row">
        <div class="col-md-9 col-lg-9"><h5><?php echo $data->tema_ec;?></h5></div>
        <div class="col-md-3 col-lg-3"><a class="float-right" href="#">Link</a></div>
      </div>
      <p><?php echo $data->deskripsi;?></p>
    </div>
  </div>
  <?php foreach ($topik_arr as $row): ?>
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row->nama_topik;?></h5>
        <p class="card-text"><?php echo $row->nama . $row->profesi . $row->lembaga . $row->jabatan;?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
