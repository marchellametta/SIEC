<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_list_absensi_kelas']) ?>
    <div class="text-left ml-3"><h5>Daftar Topik</h5></div>
    <div class="text-left ml-3"><h6><?php echo $ec->jenis_ec. " : " . $ec->tema_ec; ?></h6></div>
  <?php foreach ($list_topik as $row): ?>
    <div class="card mt-3 shadow">
      <div class="card-body">
        <h4 class="card-title"><?php echo $row->nama_topik;?></h4>
        <a href="<?php echo base_url()?>kelas/absensi/<?php echo $row->id_topik?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Isi Absensi</a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
