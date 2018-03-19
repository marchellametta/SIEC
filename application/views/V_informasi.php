<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_informasi_'.$tipe]) ?>
  <div class="row ml-3 mr-3">
    <?php if($tipe=='aktif'):?>
    <div class="col-12 col-sm-6 col-lg-7 col-xl-7"><h5>INFORMASI KELAS EC YANG SEDANG BERJALAN</h5></div>
    <?php elseif($tipe=='akan'):?>
    <div class="col-12 col-sm-6 col-lg-7 col-xl-7"><h5>INFORMASI KELAS EC YANG AKAN DIBUKA SEMESTER DEPAN</h5></div>
  <?php else: ?>
    <div class="col-12 col-sm-6 col-lg-7 col-xl-7"><h5>INFORMASI RIWAYAT KELAS</h5></div>
  <?php endif; ?>
    <div class="col-12 col-sm-6 col-lg-5 col-xl-5">
      <div class="row">
        <div class="col-12 col-sm-4 col-lg-3">
          <a href="#" class="btn btn-primary shadow"><i class="fa fa-plus"></i>Tambah</a>
        </div>
        <div class="col-12 col-sm-8 col-lg-9 mt-2 mt-sm-0 mt-md-0 mt-lg-0">
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
        <div class="col-md-3 col-lg-3 border-right border-dark"><img class="w-100" src="<?php echo base_url().$row->gambar;?>"></div>
        <div class="col-md-9 col-lg-9 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
          <h6 class="card-title"><?php echo $row->jenis_ec;?> :</h6>
          <h2 class="card-title"><?php echo $row->tema_ec;?></h2>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <?php if($row->status_peserta==1):?>
          <p class="card-text text-muted mt-5"><?php echo "Jumlah Peserta: ". $row->jumlah_peserta;?></p>
          <?php endif; ?>
          <?php if($row->status_peserta==2):?>
          <div class="alert alert-info mb-0 mt-5" role="alert">
            <i class="fa fa-info-circle mr-2"></i>Anda dapat mendaftar untuk sebagian topik saja dari kelas ini
          </div>
          <p class= "mt-2"><a tabindex="0" class= "" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" data-html="true" data-content="<?php echo $row->jumlah_peserta?>"><i class="fa fa-external-link"></i>Jumlah Peserta</a></p>
          <?php endif; ?>
          <a href="<?php echo base_url();?>informasi/detail/<?php echo $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-external-link mr-1 ml-1"></i>Detail</a>
          <a href="<?php echo base_url();?>informasi/jadwal/<?php echo $row->id_ec;?>" class="<?php if($tipe!=='riwayat') echo 'border-right border-dark'?> pr-2"><i class="fa fa-calendar mr-1 ml-1"></i>Lihat Jadwal</a>
          <?php if($tipe!=='riwayat'):?>
            <a href="<?php echo base_url();?>pendaftaran?c=<?php echo $row->id_ec;?>"><i class="fa fa-edit mr-1 ml-1 border-dark"></i>Daftar</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>

<script>
$(function () {
  $('[data-toggle="popover"]').popover({
    container: 'body'
  })
  $('.popover-dismiss').popover({
    trigger: 'focus'
  })
})

</script>
