<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_detail']) ?>
  <div class="row mb-5">
    <div class="col-md-3 col-lg-3 border-right border-dark"><img class="w-100" src="<?php echo base_url(). $data->gambar;?>"></div>
    <div class="col-md-9 col-lg-9 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
      <h6><?php echo $data->jenis_ec;?> :</h6>
      <div><h2><?php echo $data->tema_ec;?></h2></div>
      <p><?php echo $data->deskripsi;?></p>
      <a id="link-jadwal" href="<?php echo base_url();?>informasi/jadwal/<?php echo $data->id_ec;?>"><i class="fa fa-calendar mr-1"></i>Lihat Jadwal</a>
      <div class="col-12 col-sm-4 col-lg-3 mt-3 pl-0 hidden panitia">
        <a href="<?php echo base_url().'editkelas/'.$data->id_ec?>"><button class="btn btn-primary shadow"><i class="fa fa-edit pr-1"></i>Edit</button></a>
      </div>
    </div>
  </div>
  <?php if(empty($topik_arr)):?>
  <div class="alert alert-info mb-0 mt-5" role="alert">
    <i class="fa fa-info-circle mr-2"></i>Rangkaian topik tidak tersedia
  </div>
  <?php else : ?>
  <?php foreach ($topik_arr as $row): ?>
    <div class="card mt-3 shadow">
      <div class="card-body">
        <h4 class="card-title"><?php echo $row->nama_topik;?></h4>
        <p class="card-text"><?php echo '<b>Narasumber</b>  :  '. $row->nama;?></p>
        <a class="hidden panitia" href="<?php echo base_url().'upload-modul/'.$row->id_topik?>"><button class="btn btn-primary shadow"><i class="fa fa-upload pr-1"></i>Upload Modul</button></a>
      </div>
    </div>
    <?php endforeach ?>
  <?php endif; ?>
  </div>
