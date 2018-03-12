<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_kelas_user']) ?>
  <div class="text-left ml-3"><h5>KELAS SAYA</h5></div>

  <?php foreach ($data as $row): ?>
  <div class="card mt-4 shadow ml-3 mr-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 border-right border-dark"><img class="w-100" src="<?php echo base_url();?>images/<?php echo $row->gambar;?>"></div>
        <div class="col-md-9 col-lg-9 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
          <h6 class="card-title"><?php echo $row->jenis_ec;?> :</h6>
          <h2 class="card-title"><?php echo $row->tema_ec;?></h2>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <a href="<?php echo ($row->status_evaluasi==1)? base_url() .'kelas-saya/detail/'. $row->id_ec : base_url() .'isi-evaluasi/'. $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-edit mr-1 ml-1"></i>Isi Evaluasi</a>
          <a href="<?php echo base_url();?>informasi/jadwal/<?php echo $row->id_ec;?>" class="pr-2"><i class="fa fa-calendar mr-1 ml-1"></i>Lihat Jadwal</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>
