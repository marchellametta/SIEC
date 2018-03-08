<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-sm-2 ml-sm-2 mr-md-5 ml-md-5 mt-5">
  <div class="row mb-5">
    <div class="col-md-3 col-lg-3 border-right"><img class="w-100" src="<?php echo base_url();?>images/<?php echo $data->gambar;?>"></div>
    <div class="col-md-9 col-lg-9 ">
      <div class="row">
        <h6 class="col-md-9 col-lg-9"><?php echo $data->jenis_ec;?> :</h6>
        <div class="col-md-3 col-lg-3"><a class="float-right" href="#"><i class="fa fa-calendar mr-1"></i>Lihat Jadwal</a></div>
      </div>
      <div><h2><?php echo $data->tema_ec;?></h2></div>
      <p><?php echo $data->deskripsi;?></p>
    </div>
  </div>
  <?php foreach ($topik_arr as $row): ?>
    <div class="card mt-3 shadow">
      <div class="card-body">
        <h4 class="card-title"><?php echo $row->nama_topik;?></h4>
        <p class="card-text"><?php echo $row->nama . $row->profesi . $row->lembaga . $row->jabatan;?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
