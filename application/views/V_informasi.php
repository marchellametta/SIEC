<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_informasi_'.$tipe]) ?>
  <div class="row ml-3 mr-3">
    <div class="col-12 col-sm-6 col-lg-7 col-xl-7">

    <?php if($tipe=='aktif'):?>
      <h5>INFORMASI KELAS EC YANG SEDANG BERJALAN</h5>
      <form id="form" method="post" action="<?php echo base_url() ?>informasi/aktif">
    <?php elseif($tipe=='akan'):?>
      <h5>INFORMASI KELAS EC YANG AKAN DIBUKA SEMESTER DEPAN</h5>
      <form id="form" method="post" action="<?php echo base_url() ?>informasi/akanDatang">
  <?php else: ?>
      <h5>INFORMASI RIWAYAT KELAS</h5>
      <form id="form" method="post" action="<?php echo base_url() ?>informasi/riwayat">
  <?php endif; ?>
  <div><a class="" href="#" data-toggle="collapse" data-target="#filter"><i class="fa fa-filter mr-1 ml-1"></i>Filter</a></div>
  <div class="form-check panel-collapse collapse in" id="filter">
  <?php foreach($jenis as $row): ?>
    <div class="col-md-12 mt-1">
      <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="jenis[]" value="<?php echo $row->id_jenis_ec ?>">
        <?php echo $row->jenis_ec ?>
      </label>
    </div>
  <?php endforeach ?>
  <a class="" href="#" id="apply"><i class="fa fa-arrow-right mt-2 mr-1 ml-1"></i>Terapkan</a>
  </div>
</div>
    <div class="col-12 col-sm-6 col-lg-5 col-xl-5">
      <div class="row">
        <div class="col-12 col-sm-4 col-lg-3 hidden panitia">
          <a href="<?php echo base_url().'tambahkelas'?>" class="btn btn-primary shadow"><i class="fa fa-plus"></i>Tambah</a>
        </div>
        <div class="col-12 col-sm-8 col-lg-9 mt-2 mt-sm-0 mt-md-0 mt-lg-0">
          <div class="input-group">
            <input type="text" name="tema" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-secondary pt-2 pb-2" type="button"><i class="fa fa-search m-1"></i></button>
            </span>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>

  <?php if (isset($search_message)): ?>
      <div class="alert alert-info alert-dismissable mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $search_message ;?>
        <?php if($tipe=='aktif'):?>
          <a href="<?php echo base_url() ?>informasi/aktif">Reset Pencarian</a>
        <?php elseif($tipe=='akan'):?>
          <a href="<?php echo base_url() ?>informasi/akanDatang">Reset Pencarian</a>
      <?php else: ?>
        <a href="<?php echo base_url() ?>informasi/riwayat">Reset Pencarian</a>
      <?php endif; ?>
      </div>
  <?php endif ?>

  <?php foreach ($data as $row): ?>
  <div class="card mt-4 shadow ml-3 mr-3 <?php echo $row->id_jenis_ec ?>">
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

  $("#apply").on("click", function(){
        $("#form").submit();
    });

//   $("#filter :checkbox").click(function() {
//    $(".card").hide();
//    $("#filter :checkbox:checked").each(function() {
//        $("." + $(this).val()).show();
//    });
//    var checked = $('#filter :checkbox:checked').length;
//    if(checked == 0){
//      $(".card").show();
//    }
// });
})

</script>
