<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_list_evaluasi_kelas_user']) ?>
  <?php foreach ($topik_arr as $row): ?>
    <div class="card mt-3 shadow">
      <div class="card-body">
        <h4 class="card-title"><?php echo $row->nama_topik;?></h4>
        <p class="card-text"><?php echo $row->nama . $row->profesi . $row->lembaga . $row->jabatan;?></p>
        <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i>Isi Evaluasi</a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
