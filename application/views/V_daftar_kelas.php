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
          <a href="<?php echo base_url();?>kelas/cetak-sertifikat/<?php echo $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-file-pdf-o mr-1 ml-1"></i>Cetak Sertifikat</a>
          <a href="<?php echo base_url();?>jadwal/<?php echo $row->id_ec;?>" class="pr-2"><i class="fa fa-pie-chart mr-1 ml-1 border-dark"></i>Lihat Hasil Evaluasi</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Cetak Sertifikat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group col-md-12">
           <label for="inputEmail4">Topik</label>
           <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
         </div>
         <div class="form-group col-md-12">
           <label for="inputPassword4">Narasumber</label>
           <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
         </div>
         <div class="form-group col-md-12">
           <label for="inputEmail">Tanggal</label>
           <input class="form-control" id="datepicker" />
         </div>
         <div class="form-group col-md-12">
           <label for="inputPassword">Jam</label>
           <div class="row">
             <div class="col-md-3">
               <input type="password" class="form-control" id="inputPassword">
             </div>
             <a>-</a>
             <div class="col-md-3">
               <input type="password" class="form-control" id="inputPassword">
             </div>
           </div>
         </div>
         <div class="form-group col-md-12">
           <label for="inputPassword">Lokasi</label>
           <input type="password" class="form-control" id="inputPassword" placeholder="Password">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="tambah-topik-submit" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
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
