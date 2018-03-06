<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3">
  <div class="row mt-4">
    <div class="col-sm-6 col-lg-7 col-xl-7"><h5>INFORMASI KELAS EC YANG DIBUKA</h5></div>
    <div class="col-sm-6 col-lg-5 col-xl-5">
      <div class="row">
        <div class="col-sm-4 col-lg-3">
          <a href="#" class="btn btn-primary w-100 shadow"><i class="fa fa-plus"></i>Tambah</a>
        </div>
        <div class="col-sm-8 col-lg-9">
          <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn pt-2 pb-2" type="button"><i class="fa fa-search m-1"></i></button>
      </span>
    </div>
        </div>
      </div>
    </div>
  </div>
  <?php foreach ($data as $row): ?>
  <div class="card mt-4">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 border-right"><img class="w-100" src="<?php echo base_url();?>images/<?php echo $row->gambar;?>"></div>
        <div class="col-md-9 col-lg-9 ">
          <h6 class="card-title"><?php echo $row->jenis_ec;?> :</h6>
          <h1 class="card-title"><?php echo $row->tema_ec;?></h1>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <a href="<?php echo base_url();?>detail/<?php echo $row->id_ec;?>" class="border-right pr-2"><i class="fa fa-external-link mr-1 ml-1"></i>Detail</a>
          <a href="<?php echo base_url();?>jadwal/<?php echo $row->id_ec;?>" class="border-right pr-2"><i class="fa fa-calendar mr-1 ml-1"></i>Lihat Jadwal</a>
          <a href="<?php echo base_url();?>pendaftaran?c=<?php echo $row->id_ec;?>"><i class="fa fa-edit mr-1 ml-1"></i>Daftar</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>
