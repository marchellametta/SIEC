<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
<?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_daftar_kelas']) ?>
  <div class="text-left ml-3"><h5>DAFTAR KELAS</h5></div>
  <?php foreach ($data as $row): ?>
  <div class="card mt-4 shadow ml-3 mr-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 border-right border-dark"><img class="w-100" src="<?php echo base_url();?>images/<?php echo $row->gambar;?>"></div>
        <div class="col-md-9 col-lg-9 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
          <h6 class="card-title"><?php echo $row->jenis_ec;?> :</h6>
          <h2 class="card-title"><?php echo $row->tema_ec;?></h2>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <?php if($row->status_peserta==1):?>
          <p class="card-text text-muted mt-5"><?php echo "Jumlah Peserta: ". $row->jumlah_peserta;?></p>
          <?php endif; ?>
          <?php if($row->status_peserta==2):?>
          <p class="card-text text-muted mt-5"><i class="fa fa-info-circle mr-1"></i>Peserta lepas diperbolehkan</p>
          <p class= "card-text"><a tabindex="0" class= "" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" data-html="true" data-content="<?php echo $row->jumlah_peserta?>"><i class="fa fa-external-link"></i>Jumlah Peserta</a></p>
          <?php endif; ?>
          <a href="<?php echo base_url() .'kelas/absensi/daftar-topik/'. $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-edit mr-1 ml-1"></i>Isi Absensi</a>
          <a href="" data-toggle="modal" data-target="#exampleModal" class="border-right pr-2 border-dark"><i class="fa fa-file-pdf-o mr-1 ml-1"></i>Cetak Sertifikat</a>
          <a href="<?php echo base_url();?>jadwal/<?php echo $row->id_ec;?>" class="pr-2"><i class="fa fa-pie-chart mr-1 ml-1 border-dark"></i>Lihat Hasil Evaluasi</a>
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
