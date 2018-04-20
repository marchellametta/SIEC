<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_list_modul']) ?>
  <?php foreach ($topik_arr as $row): ?>
    <div class="card mt-3 shadow">
      <div class="card-body">
        <h4 class="card-title"><?php echo $row->nama_topik;?></h4>
        <p class="card-text"><b>Narasumber: </b></p>
        <?php foreach ($row->narasumber as $temp):?>
          <p class="card-text"><?php echo $temp->nama .", ". $temp->profesi .", ". $temp->lembaga .", ". $temp->jabatan;?></p>
        <?php endforeach; ?>
        <?php $i = 1; ?>
        <?php foreach($row->modul as $temp): ?>
        <a href="<?php echo base_url(). $temp->link_modul?>"><i class="fa fa-file-pdf-o mr-1"></i>Modul <?php echo $i ?></a><br>
        <?php $i++; ?>
      <?php endforeach ?>
      </div>
    </div>
    <?php endforeach ?>
  </div>
