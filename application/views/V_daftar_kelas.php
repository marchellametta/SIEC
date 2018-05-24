<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
<?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_daftar_kelas_'.$tipe]) ?>
<div class="row ml-3 mr-3">
  <?php if($tipe=='aktif'):?>
    <div class="text-left ml-3 col-md-5"><h5>DAFTAR KELAS AKTIF</h5></div>
  <?php else: ?>
    <div class="text-left ml-3 col-md-5"><h5>DAFTAR RIWAYAT KELAS</h5></div>
  <?php endif; ?>

  <div class="col-md-6 mt-2 mt-sm-0 mt-md-0 mt-lg-0">
    <?php if($tipe=='aktif'):?>
      <form method="post" action="<?php echo base_url() ?>kelas/aktif">
    <?php else: ?>
      <form method="post" action="<?php echo base_url() ?>kelas/riwayat">
    <?php endif; ?>
    <form method="post" action="<?php echo base_url() ?>kelas/aktif">
    <div class="input-group">
      <input type="text" name="tema" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-secondary pt-2 pb-2" type="button"><i class="fa fa-search m-1"></i></button>
      </span>
    </div>
  </form>
  </div>
 </div>

 <?php if (isset($search_message)): ?>
     <div class="alert alert-info alert-dismissable">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <?php echo $search_message ;?>
       <?php if($tipe=='aktif'):?>
         <a href="<?php echo base_url() ?>kelas/aktif">Reset Pencarian</a>
       <?php else: ?>
         <a href="<?php echo base_url() ?>kelas/riwayat">Reset Pencarian</a>
       <?php endif; ?>
     </div>
 <?php endif ?>

  <?php foreach ($data as $row): ?>
  <div class="card mt-4 shadow ml-3 mr-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 border-right border-dark"><img class="w-100" src="<?php echo base_url(). $row->gambar;?>"></div>
        <div class="col-md-9 col-lg-9 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
          <h6 class="card-title"><?php echo $row->jenis_ec;?> :</h6>
          <h2 class="card-title"><?php echo $row->tema_ec;?></h2>
          <p class="card-text"><?php echo $row->deskripsi;?></p>
          <?php if($row->status_peserta==1):?>
          <p class="card-text text-muted mt-5"><?php echo "<a href=".base_url()."/kelas/peserta/".$row->id_ec."> Jumlah Peserta: ". $row->jumlah_peserta;?></p>
          <?php endif; ?>
          <?php if($row->status_peserta==2):?>
          <p class="card-text text-muted mt-5"><i class="fa fa-info-circle mr-1"></i>Peserta lepas diperbolehkan</p>
          <p class= "card-text"><a tabindex="0" class= "" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" data-html="true" data-content='<?php echo $row->jumlah_peserta?>'><i class="fa fa-external-link"></i>Jumlah Peserta</a></p>
          <?php endif; ?>
          <a href="<?php echo base_url() .'informasi/detail/'. $row->id_ec;?>" class="<?php if($tipe!=='akan') echo 'border-right border-dark'?> pr-2 "><i class="fa fa-external-link mr-1 ml-1"></i>Detail</a>
          <?php if($tipe=='aktif'):?>
          <a href="<?php echo base_url() .'kelas/absensi/daftar-topik/'. $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-edit mr-1 ml-1"></i>Presensi</a>
          <?php endif; ?>
          <?php if($tipe=='aktif' || $tipe=='riwayat'):?>
          <a href="<?php echo base_url() .'kelas/pembayaran/'. $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-edit mr-1 ml-1"></i>Status Pembayaran</a>
          <?php endif; ?>
          <?php if($tipe!=='akan'):?>
          <a href="<?php echo base_url();?>kelas/cetak-sertifikat/<?php echo $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-file-pdf-o mr-1 ml-1"></i>Cetak Sertifikat</a>
          <a href="<?php echo base_url();?>kelas/laporan/<?php echo $row->id_ec;?>" class="pr-2"><i class="fa fa-pie-chart mr-1 ml-1 border-dark"></i>Lihat Laporan</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
  <?php if(isset($page)) :?>
    <ul class="pagination pagination-sm justify-content-end mt-3">
      <li class="page-item disabled">
        <a class="page-link" href="#">Halaman</a>
      </li>
      <?php $i =1; ?>
      <?php while($i <= $page) {?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $i?>"><?php echo $i; ?></a></li>
        <?php $i++; ?>
      <?php } ?>
    </ul>
  <?php endif; ?>
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
