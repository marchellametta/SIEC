<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-sm-2 ml-sm-2 mr-md-5 ml-md-5 mt-5">
  <div class="row ml-3 mr-3">
    <div class="col-12 col-sm-6 col-lg-7 col-xl-7"><h5>INFORMASI KELAS EC YANG DIBUKA</h5></div>
    <div class="col-12 col-sm-6 col-lg-5 col-xl-5">
      <div class="row">
        <div class="col-4 col-sm-4 col-lg-3">
          <a href="#" class="btn btn-primary shadow"><i class="fa fa-plus"></i>Tambah</a>
        </div>
        <div class="col-8 col-sm-8 col-lg-9">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary pt-2 pb-2" type="button"><i class="fa fa-search m-1"></i></button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($data as $row): ?>
  <div class="card mt-4 shadow ml-3 mr-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 border-right"><img class="w-100" src="<?php echo base_url();?>images/<?php echo $row->gambar;?>"></div>
        <div class="col-md-9 col-lg-9 ">
          <h6 class="card-title"><?php echo $row->jenis_ec;?> :</h6>
          <h1 class="card-title"><?php echo $row->tema_ec;?></h1>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <a href="<?php echo ($row->status_evaluasi==1)? base_url() .'kelas-saya/detail/'. $row->id_ec : base_url() .'isi-evaluasi/'. $row->id_ec;?>" class="border-right pr-2"><i class="fa fa-edit mr-1 ml-1"></i>Isi Evaluasi</a>
          <a href="<?php echo base_url();?>jadwal/<?php echo $row->id_ec;?>" class="border-right pr-2"><i class="fa fa-calendar mr-1 ml-1"></i>Lihat Jadwal</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>