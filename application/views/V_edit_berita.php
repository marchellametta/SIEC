<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_cetak_sertifikat']) ?>
  <div class="text-left ml-3"><h5>Kelola Berita</h5></div>
  <div class="col-md-8 col-lg-6">
    <form method="post" action="<?php echo base_url().'kelola-berita/'.$berita->id; ?>" enctype="multipart/form-data">
      <fieldset class="mt-4">
        <div class="form-group col-md-12">
          <label for="judul" class="control-label">Judul</label>
          <input type="text" class="form-control" name="judul" value="<?php echo $berita->judul?>">
        </div>
        <div class="form-group col-md-12">
          <label for="isi">Isi</label>
          <textarea class="form-control" rows="25" name="isi"><?php echo $berita->isi?></textarea>
        </div>
        <div class="form-group col-md-8">
          <label for="input-gambar" class="control-label">Gambar</label>
          <div class="input-group">
            <span id="input-gambar-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-file" id="input-gambar-file" class="hidden">
            <input type="text" value="<?php echo $berita->gambar ?>" placeholder="Pilih Gambar" id="input-gambar" name="gambar" class="form-control cursor" readonly>
          </div>
        </div>
      </fieldset>
      <input type="submit" id="simpan" value="Simpan" class="btn btn-success mt-3">
    </form>
  </div>
</div>

<script>
$(function () {

  $('#input-gambar').add('#input-gambar-icon').on('click', function(event) {
            event.preventDefault();
            $('#input-gambar-file').click();
          });

          $('#input-gambar-file').on('change', function() {
            var filename = $(this).val().split(/(\\|\/)/g).pop();
            $('#input-gambar').val(filename).keyup();
          });
  });



</script>
