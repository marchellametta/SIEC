<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_edit_beranda']) ?>
  <div class="text-left ml-3"><h5>Kelola Beranda</h5></div>
  <div class="col-md-8 col-lg-6">
    <form method="post" action="<?php echo base_url().'kelola-beranda'; ?>" enctype="multipart/form-data">
      <fieldset class="mt-4">
        <legend>Pengaturan Slider Gambar</legend>
        <div class="form-group col-md-8">
          <label for="input-gambar-1" class="control-label">Gambar 1</label>
          <div class="input-group">
            <span id="input-gambar-1-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-1-file" id="input-gambar-1-file" class="hidden">
            <input type="text" placeholder="Pilih Gambar" id="input-gambar-1" name="gambar-1" class="form-control cursor" readonly>
          </div>
        </div>
        <div class="form-group col-md-8">
          <label for="input-gambar-2" class="control-label">Gambar 2</label>
          <div class="input-group">
            <span id="input-gambar-2-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-2-file" id="input-gambar-2-file" class="hidden">
            <input type="text" placeholder="Pilih Gambar" id="input-gambar-2" name="gambar-2" class="form-control cursor" readonly>
          </div>
        </div>
        <div class="form-group col-md-8">
          <label for="input-gambar-3" class="control-label">Gambar 3</label>
          <div class="input-group">
            <span id="input-gambar-3-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-3-file" id="input-gambar-3-file" class="hidden">
            <input type="text" placeholder="Pilih Gambar" id="input-gambar-3" name="gambar-3" class="form-control cursor" readonly>
          </div>
        </div>
        <div class="form-group col-md-8">
          <label for="input-gambar-2" class="control-label">Gambar 4</label>
          <div class="input-group">
            <span id="input-gambar-4-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-4-file" id="input-gambar-4-file" class="hidden">
            <input type="text" placeholder="Pilih Gambar" id="input-gambar-4" name="gambar-4" class="form-control cursor" readonly>
          </div>
        </div>
        <div class="form-group col-md-8">
          <label for="input-gambar-5" class="control-label">Gambar 5</label>
          <div class="input-group">
            <span id="input-gambar-5-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-5-file" id="input-gambar-5-file" class="hidden">
            <input type="text" placeholder="Pilih Gambar" id="input-gambar-5" name="gambar-5" class="form-control cursor" readonly>
          </div>
        </div>
      </fieldset>
      <input type="submit" id="simpan" value="Simpan" class="btn btn-success mt-3">
    </form>
    <fieldset class="mt-4">
      <legend>Pengaturan Berita</legend>
      <table class="table table-hover table-striped table-bordered d-none d-sm-block">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Judul</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $row): ?>
          <tr>
            <td><?php echo $row->judul; ?></td>
            <td>
              <a href="<?php echo base_url().'kelola-berita/'.$row->id?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit mr-1"></i>Edit</button></a>
              <a href="<?php echo base_url().'hapus-berita/'.$row->id?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-close mr-1"></i>Hapus</button></a>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
    </fieldset>
  </div>
</div>

<script>
$(function () {

    $('#input-gambar-1').add('#input-gambar-1-icon').on('click', function(event) {
      event.preventDefault();
      $('#input-gambar-1-file').click();
    });

    $('#input-gambar-1-file').on('change', function() {
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $('#input-gambar-1').val(filename).keyup();
    });

    $('#input-gambar-2').add('#input-gambar-2-icon').on('click', function(event) {
      event.preventDefault();
      $('#input-gambar-2-file').click();
    });

    $('#input-gambar-2-file').on('change', function() {
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $('#input-gambar-2').val(filename).keyup();
    });

    $('#input-gambar-3').add('#input-gambar-3-icon').on('click', function(event) {
      event.preventDefault();
      $('#input-gambar-3-file').click();
    });

    $('#input-gambar-3-file').on('change', function() {
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $('#input-gambar-3').val(filename).keyup();
    });

    $('#input-gambar-4').add('#input-gambar-4-icon').on('click', function(event) {
      event.preventDefault();
      $('#input-gambar-4-file').click();
    });

    $('#input-gambar-4-file').on('change', function() {
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $('#input-gambar-4').val(filename).keyup();
    });

    $('#input-gambar-5').add('#input-gambar-5-icon').on('click', function(event) {
      event.preventDefault();
      $('#input-gambar-5-file').click();
    });

    $('#input-gambar-5-file').on('change', function() {
      var filename = $(this).val().split(/(\\|\/)/g).pop();
      $('#input-gambar-5').val(filename).keyup();
    });
  });



</script>
