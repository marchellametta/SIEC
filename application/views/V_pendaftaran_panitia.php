<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_pendaftaran']) ?>
  <?php if (isset($error_message)): ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error_message ;?>
      </div>
  <?php endif ?>
  <form method="post" id="form" action="<?php echo base_url('pendaftaran/daftar-panitia') ?>" enctype="multipart/form-data">
    <fieldset>
    <legend>Profil Umum</legend>
      <div class="form-group col-md-8 col-lg-6">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php if(isset($post_data['nama'])) echo $post_data['nama'] ?>">
        <span class="help-block text-danger"><?php if(isset($error_array['nama'])) echo $error_array['nama']?></span>
      </div>
      <div class="form-group col-md-8 col-lg-6">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat"><?php if(isset($post_data['alamat'])) echo $post_data['alamat'] ?></textarea>
        <span class="help-block text-danger"><?php if(isset($error_array['alamat'])) echo $error_array['alamat']?></span>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="<?php if(isset($post_data['pekerjaan'])) echo $post_data['pekerjaan'] ?>">
          <span class="help-block text-danger"><?php if(isset($error_array['pekerjaan'])) echo $error_array['pekerjaan']?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="lembaga">Lembaga</label>
          <input type="text" class="form-control" name="lembaga" placeholder="Lembaga" value="<?php if(isset($post_data['lembaga'])) echo $post_data['lembaga'] ?>">
          <span class="help-block text-danger"><?php if(isset($error_array['lembaga'])) echo $error_array['lembaga']?></span>
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="pendidikan">Pendidikan terakhir</label>
          <select class="form-control" name="pendidikan">
            <option value="1" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==1) echo 'selected' ?>>SMA</option>
            <option value="2" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==2) echo 'selected' ?>>D3</option>
            <option value="3" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==3) echo 'selected' ?>>S1</option>
            <option value="4" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==4) echo 'selected' ?>>S2</option>
          </select>
          <span class="help-block text-danger"><?php if(isset($error_array['pendidikan'])) echo $error_array['pendidikan']?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="kota">Kota Asal</label>
          <input type="text" class="form-control" name="kota" placeholder="Kota Asal" value="<?php if(isset($post_data['kota'])) echo $post_data['kota'] ?>">
          <span class="help-block text-danger"><?php if(isset($error_array['kota'])) echo $error_array['kota']?></span>
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="agama">Agama</label>
          <select class="form-control" name="agama">
            <option value="1" <?php if(isset($post_data['agama'])) if($post_data['agama']==1) echo 'selected' ?>>Katolik</option>
            <option value="2" <?php if(isset($post_data['agama'])) if($post_data['agama']==2) echo 'selected' ?>>Kristen</option>
            <option value="3" <?php if(isset($post_data['agama'])) if($post_data['agama']==3) echo 'selected' ?>>Islam</option>
            <option value="4" <?php if(isset($post_data['agama'])) if($post_data['agama']==4) echo 'selected' ?>>Buddha</option>
            <option value="5" <?php if(isset($post_data['agama'])) if($post_data['agama']==5) echo 'selected' ?>>Hindu</option>
            <option value="6" <?php if(isset($post_data['agama'])) if($post_data['agama']==6) echo 'selected' ?>>Lainnya</option>
          </select>
          <span class="help-block text-danger"><?php if(isset($error_array['agama'])) echo $error_array['agama']?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="nohp">Nomor HP</label>
          <input type="text" class="form-control" name="nohp" placeholder="Nomor HP" value="<?php if(isset($post_data['nohp'])) echo $post_data['nohp'] ?>">
          <span class="help-block text-danger"><?php if(isset($error_array['nohp'])) echo $error_array['nohp']?></span>
        </div>
      </div>
      <div class="form-group col-md-4 col-lg-3">
        <label for="input-gambar" class="control-label">Foto</label>
        <div class="input-group">
          <span id="input-gambar-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
          <input type="file" accept="image/*" name="gambar-file" id="input-gambar-file" class="hidden">
          <input type="text" placeholder="Pilih Gambar" id="input-gambar" name="gambar" class="form-control cursor" readonly>
        </div>
        <span class="help-block text-danger"></span>
      </div>
    </fieldset>

    <fieldset class="mt-4">
    <legend>Informasi Akun</legend>
     <div class="form-group col-md-6">
       <label for="email">Email</label>
       <input type="email" class="form-control" name="email" placeholder="Email">
     </div>
     <div class="form-group col-md-6">
       <label for="password">Password</label>
       <input type="password" class="form-control" name="password" placeholder="Password">
     </div>
     <div class="form-group col-md-6">
       <label for="retypePassword">Ketik Ulang Password</label>
       <input type="password" class="form-control" name="password_retype" placeholder="Password">
     </div>
     <?php if (isset($error)): ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $error; ?>
          </div>
      <?php endif ?>
    </fieldset>

    <fieldset class="mt-4">
    <legend>Kelas Extension Course yang Akan Dikelola</legend>

    <?php foreach ($data as $row): ?>
     <div class="form-group col-md-12">
       <div class="form-check">
         <input class="form-check-input selectall" type="checkbox" value="<?php echo $row->id_ec ?>" name="kelas[]">
         <label class="form-check-label" for="defaultCheck1">
           <?php echo $row->jenis_ec. ": ".$row->tema_ec ?>
         </label>
       </div>
     </div>
     <?php endforeach ?>
     <span id="error" class="ml-2 help-block text-danger"><?php if(isset($error_array['kelas[]'])) echo $error_array['kelas[]']?></span></br>

     </fieldset>
     <div class="text-right">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_konfirmasi">
         Daftar
       </button>
     </div>
     <div class="modal fade" id="modal_konfirmasi">
       <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <a class="modal-title"><b>Konfirmasi Pendaftaran</b></a>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin untuk mendaftar?
          </div>
          <div class="modal-footer">
            <div class="text-right">
              <input type="submit" value="Daftar" class="btn btn-success">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>

$( document ).ready(function() {
  $('#input-gambar').add('#input-gambar-icon').on('click', function(event) {
            event.preventDefault();
            $('#input-gambar-file').click();
          });

          $('#input-gambar-file').on('change', function() {
            var filename = $(this).val().split(/(\\|\/)/g).pop();
            $('#input-gambar').val(filename).keyup();
          });


          var rules = JSON.parse('<?php echo $rules ?>');
          $('#form').applyRules({
            formRules : rules,
            externalErrors : ''
          });

});









</script>
