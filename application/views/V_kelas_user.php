<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_kelas_user']) ?>
  <div class="row ml-3 mr-3">
  <div class="text-left ml-3 col-md-7"><h5>KELAS SAYA</h5></div>
  <div class="col-md-4 mt-2 mt-sm-0 mt-md-0 mt-lg-0">
    <form method="post" action="<?php echo base_url() ?>kelas-saya">
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
      <a href="<?php echo base_url() ?>kelas-saya">Reset Pencarian</a>
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
          <a href="<?php echo base_url();?>informasi/detail/<?php echo $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-external-link mr-1 ml-1"></i>Detail</a>
          <a href="<?php echo ($row->status_evaluasi==2)? base_url() .'kelas-saya/detail/'. $row->id_ec : base_url() .'kelas-saya/isi-evaluasi/'. $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-edit mr-1 ml-1"></i>Isi Evaluasi</a>

            <a href="<?php echo base_url();?>informasi/jadwal/<?php echo $row->id_ec;?>" class="border-right pr-2 border-dark"><i class="fa fa-calendar mr-1 ml-1"></i>Lihat Jadwal</a>
            <a href="<?php echo base_url();?>kelas-saya/modul/<?php echo $row->id_ec;?>" class="pr-2"><i class="fa fa-file-pdf-o mr-1 ml-1"></i>Lihat Modul</a>

          <?php if($row->bayar=='true'):?>
          <p class="card-text text-muted mt-5"><i class="fa fa-info-circle mr-1"></i>Total biaya yang harus dibayar : Rp. <?php echo number_format($row->tagihan)?>,00</p>
          <?php endif; ?>
          <?php if($row->bayar=='false'):?>
          <p class="card-text text-muted mt-5"><i class="fa fa-info-circle mr-1"></i>Total biaya yang harus dibayar : Rp. 0,00</p>
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
