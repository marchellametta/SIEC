<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_edit_beranda']) ?>
  <div class="text-left ml-3"><h5>Upload Modul</h5></div>
  <div class="col-md-8 col-lg-6">
    <form method="post" action="<?php echo base_url().'upload-modul/'.$topik->id_topik; ?>" enctype="multipart/form-data">
      <fieldset class="mt-4">
        <legend>Upload Modul</legend>
        <div id="modul_block">
        <?php if(!empty($modul)): ?>
          <?php $i = 1; ?>
          <?php foreach ($modul as $row): ?>
            <div class="form-group col-md-8">
              <label for="input-pdf-<?php echo $i ?>" class="input-pdf-icon control-label">Modul <?php echo $i ?></label>
              <div class="input-group">
                <span id="input-pdf-<?php echo $i ?>-icon" class="input-group-addon border input-pdf-icon"><i class="fa fa-upload p-2"></i></span>
                <input type="file" accept=".pdf" name="pdf-<?php echo $i ?>-file" id="input-pdf-<?php echo $i ?>-file" class="input-pdf-file hidden">
                <input type="text" placeholder="Pilih pdf" id="input-pdf-<?php echo $i ?>" name="pdf[]" value="<?php echo $row->link_modul?>" class="input-pdf form-control cursor" readonly>
                <input type="text" id="status-pdf-<?php echo $i ?>" name="status_pdf[]" value="<?php echo 3 ?>" class="status-pdf form-control hidden">
                <input type="text" id="id-pdf-<?php echo $i ?>" name="id_pdf[]" value="<?php echo $row->id_modul ?>" class="form-control hidden">
                <span class="hapus input-group-addon border"><i class="fa fa-times p-2"></i></span>
              </div>
            </div>
          <?php $i++ ?>
          <?php endforeach; ?>
        <?php else :?>
          <div class="form-group col-md-8">
            <label for="input-pdf-1" class="control-label">Modul 1</label>
            <div class="input-group">
              <span id="input-pdf-1-icon" class="input-group-addon border input-pdf-icon"><i class="fa fa-upload p-2"></i></span>
              <input type="file" accept=".pdf" name="pdf-1-file" id="input-pdf-1-file" class="input-pdf-file hidden">
              <input type="text" placeholder="Pilih pdf" id="input-pdf-1" name="pdf[]" class="input-pdf form-control cursor" readonly>
              <input type="text" id="status-pdf-1" name="status_pdf[]" value="<?php echo 1 ?>" class="status-pdf form-control hidden">
              <input type="text" id="id-pdf-1" name="id_pdf[]" value="0" class="form-control hidden">
              <span class="hapus input-group-addon border"><i class="fa fa-times p-2"></i></span>
            </div>
          </div>
          <div class="form-group col-md-8">
            <label for="input-pdf-2" class="control-label">Modul 2</label>
            <div class="input-group">
              <span id="input-pdf-2-icon" class="input-group-addon border input-pdf-icon"><i class="fa fa-upload p-2"></i></span>
              <input type="file" accept=".pdf" name="pdf-2-file" id="input-pdf-2-file" class="input-pdf-file hidden">
              <input type="text" placeholder="Pilih pdf" id="input-pdf-2" name="pdf[]" class="input-pdf form-control cursor" readonly>
              <input type="text" id="status-pdf-2" name="status_pdf[]" value="<?php echo 1 ?>" class="status-pdf form-control hidden">
              <input type="text" id="id-pdf-2" name="id_pdf[]" value="0" class="form-control hidden">
              <span class="hapus input-group-addon border"><i class="fa fa-times p-2"></i></span>
            </div>
          </div>
        <?php endif; ?>
        </div>
        <a id="tambah" href="#"><i class="fa fa-plus p-1"></i>Tambah</a>
      </fieldset>
      <input type="submit" id="simpan" value="Simpan" class="btn btn-success mt-3">
    </form>
  </div>
</div>

<script>
$(function () {
    var i = $('.input-pdf-file').length;

    $('#modul_block').on('click', '.input-pdf , .input-pdf-icon', function(event){
      event.preventDefault();
      $(this).siblings('.input-pdf-file').click();
    });

    $('#modul_block').on('click', '.hapus', function(event){
      $(this).siblings('.status-pdf').val(4);
      $(this).parent().parent().hide();
    });

    $('#modul_block').on('change', '.input-pdf-file', function(event){
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $(this).siblings('.input-pdf').val(filename).keyup();
      $(this).siblings('.status-pdf').val(2);
    });



    // $('.input-pdf').add('.input-pdf-icon').on('click', function(event) {
    //   event.preventDefault();
    //   alert('hai');
    //   $(this).siblings('.input-pdf-file').click();
    // });
    //
    // $('.input-pdf-file').on('change', function() {
    //   var filename = $(this).val().split(/(\\|\/)/g).pop();
    //   $(this).siblings('.input-pdf').val(filename).keyup();
    // });

    $('#tambah').on('click', function() {
      i = i+1;
      $('#modul_block').append('<div class="form-group col-md-8">'+
        '<label for="input-pdf-'+i+'" class="control-label">Modul '+i+'</label>'+
        '<div class="input-group">'+
          '<span id="input-pdf-'+i+'-icon" class="input-group-addon border input-pdf-icon"><i class="fa fa-upload p-2"></i></span>'+
          '<input type="file" accept=".pdf" name="pdf-'+i+'-file" id="input-pdf-'+i+'-file" class="input-pdf-file hidden">'+
          '<input type="text" placeholder="Pilih pdf" id="input-pdf-'+i+'" name="pdf[]" class="input-pdf form-control cursor" readonly>'+
          '<input type="text" id="status-pdf-2" name="status_pdf[]" value="<?php echo 1 ?>" class="status-pdf form-control hidden">'+
          '<input type="text" id="id-pdf-'+i+'" name="id_pdf[]" value="0" class="form-control hidden">'+
          '<span class="hapus input-group-addon border"><i class="fa fa-times p-2"></i></span>'+
        '</div>'+
      '</div>');
    });

    // $('#input-pdf-2').add('#input-pdf-2-icon').on('click', function(event) {
    //   event.preventDefault();
    //   $('#input-pdf-2-file').click();
    // });
    //
    // $('#input-pdf-2-file').on('change', function() {
    //   var filename = $(this).val().split(/(\\|\/)/g).pop();
    //   $('#input-pdf-2').val(filename).keyup();
    // });

  });



</script>
