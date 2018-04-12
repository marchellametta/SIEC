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
          <div class="form-group col-md-8">
            <label for="input-gambar-1" class="control-label">Modul 1</label>
            <div class="input-group">
              <span id="input-gambar-1-icon" class="input-group-addon border input-gambar-icon"><i class="fa fa-upload p-2"></i></span>
              <input type="file" accept="image/*" name="gambar-file[]" id="input-gambar-1-file" class="input-gambar-file hidden">
              <input type="text" placeholder="Pilih Gambar" id="input-gambar-1" name="gambar[]" class="input-gambar form-control cursor" readonly>
            </div>
          </div>
          <div class="form-group col-md-8">
            <label for="input-gambar-2" class="control-label">Modul 2</label>
            <div class="input-group">
              <span id="input-gambar-2-icon" class="input-group-addon border input-gambar-icon"><i class="fa fa-upload p-2"></i></span>
              <input type="file" accept="image/*" name="gambar-file[]" id="input-gambar-2-file" class="input-gambar-file hidden">
              <input type="text" placeholder="Pilih Gambar" id="input-gambar-2" name="gambar[]" class="input-gambar form-control cursor" readonly>
            </div>
          </div>
        </div>
        <a id="tambah" href=""><i class="fa fa-plus p-1"></i>Tambah</a>
      </fieldset>
      <input type="submit" id="simpan" value="Simpan" class="btn btn-success mt-3">
    </form>
  </div>
</div>

<script>
$(function () {
    var i = 1;

    $('.input-gambar').add('.input-gambar-icon').on('click', function(event) {
      event.preventDefault();
      $(this).siblings('.input-gambar-file').click();
    });

    $('.input-gambar-file').on('change', function() {
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $(this).siblings('.input-gambar').val(filename).keyup();
    });

    $('#tambah').on('click', function() {
      i = i+1;
      $('#modul_block').append('<div class="form-group col-md-8">'+
        '<label for="input-gambar-'+i+'" class="control-label">Modul '+i+'</label>'+
        '<div class="input-group">'+
          '<span id="input-gambar-'+i+'-icon" class="input-group-addon border input-gambar-icon"><i class="fa fa-upload p-2"></i></span>'+
          '<input type="file" accept="image/*" name="gambar-1-file" id="input-gambar-1-file" class="input-gambar-file hidden">'+
          '<input type="text" placeholder="Pilih Gambar" id="input-gambar-1" name="gambar-1" class="input-gambar form-control cursor" readonly>'+
        '</div>'+
      '</div>');
    });

    // $('#input-gambar-2').add('#input-gambar-2-icon').on('click', function(event) {
    //   event.preventDefault();
    //   $('#input-gambar-2-file').click();
    // });
    //
    // $('#input-gambar-2-file').on('change', function() {
    //   var filename = $(this).val().split(/(\\|\/)/g).pop();
    //   $('#input-gambar-2').val(filename).keyup();
    // });

  });



</script>
