<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3">
  <div class="row mt-4">
    <div class="col-sm-6 col-lg-7 col-xl-8"><h5>INFORMASI KELAS EC YANG DIBUKA</h5></div>
    <div class="col-sm-6 col-lg-5 col-xl-4">
      <div class="row">
        <div class="col-sm-4 col-lg-3">
          <a href="#" class="btn btn-primary w-100 p-sm-1 hidden-sm-down"><i class="fa fa-plus"></i>Tambah</a>
        </div>
        <div class="col-sm-8 col-lg-9">
          <form class="form-inline">
            <input class="form-control mr-lg-2 mr-sm-1 col-sm-7" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary col-sm-4" type="submit">Search</button>
          </form>
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
          <h5 class="card-title"><?php echo $row->tema_ec;?></h5>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <a href="#" class="border-right pr-2"><i class="fa fa-external-link mr-1 ml-1"></i>Detail</a>
          <a href="#" class="border-right pr-2"><i class="fa fa-calendar mr-1 ml-1"></i>Lihat Jadwal</a>
          <a href="#"><i class="fa fa-edit mr-1 ml-1"></i>Daftar</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>
