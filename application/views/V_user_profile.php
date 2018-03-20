<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_user_profile']) ?>
  <div class="text-left ml-4"><h5>PROFIL SAYA</h5></div>
  <div class="row mr-3 ml-3 pb-3 pt-3">
    <div class="col-md-3 col-lg-3">
      <img class="w-100" src="<?php echo base_url().$data->foto ?>">
    </div>
    <div class="col-md-9 col-lg-9">
      <fieldset>
      <legend>Profil Umum</legend>
      <table class="profil ml-3" id="table-profil-user">
        <tr>
          <th class="w-25"></th>
          <th class="w-5"></th>
          <th class="w-75"></th>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>:</td>
          <td><?php echo $data->nama; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?php echo $data->alamat; ?></td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td><?php echo $data->pekerjaan; ?></td>
        </tr>
        <tr>
          <td>Lembaga</td>
          <td>:</td>
          <td><?php echo $data->lembaga; ?></td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>:</td>
          <td>
            <?php if($data->pendidikan_terakhir==1): ?>
              <?php echo "SMA";?>
            <?php elseif($data->pendidikan_terakhir==2): ?>
              <?php echo "D3";?>
            <?php elseif($data->pendidikan_terakhir==3): ?>
              <?php echo "S1";?>
            <?php elseif($data->pendidikan_terakhir==4): ?>
              <?php echo "S2";?>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td>Kota asal</td>
          <td>:</td>
          <td><?php echo $data->kota; ?></td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td>
            <?php if($data->agama==1): ?>
              <?php echo "Katolik";?>
            <?php elseif($data->agama==2): ?>
              <?php echo "Kristen";?>
            <?php elseif($data->agama==3): ?>
              <?php echo "Islam";?>
            <?php elseif($data->agama==4): ?>
              <?php echo "Buddha";?>
            <?php elseif($data->agama==5): ?>
              <?php echo "Hindu";?>
            <?php elseif($data->agama==4): ?>
              <?php echo "Lainnya";?>    
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td>Nomor HP</td>
          <td>:</td>
          <td><?php echo $data->no_hp; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $data->email ?></td>
        </tr>
      </table>
      <form class="<?php if($show!=='profil') echo 'hidden' ?>" method="post" action="<?php echo base_url() . "profil/editProfil/". $data->id_user?>" id="form-profil-user">
          <div class="form-group col-md-12">
            <label for="nama">Nama Lengkap</label>
            <input type="text" value="<?php echo $data->nama; ?>" class="form-control" name="nama" placeholder="Nama Lengkap">
          </div>
          <div class="form-group col-md-12">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $data->alamat; ?></textarea>
          </div>
          <div class="form-row ml-2">
            <div class="form-group col-md-12">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text" value="<?php echo $data->pekerjaan; ?>" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
            </div>
            <div class="form-group col-md-12">
              <label for="lembaga">Lembaga</label>
              <input type="text" value="<?php echo $data->lembaga; ?>" class="form-control" name="lembaga" placeholder="Lembaga">
            </div>
          </div>
          <div class="form-row ml-2">
            <div class="form-group col-md-8 col-lg-4">
              <label for="pendidikan">Pendidikan terakhir</label>
              <select class="form-control" name="pendidikan">
                <option value="1" <?php if($data->pendidikan_terakhir==1) echo 'selected'; ?>>SMA</option>
                <option value="2" <?php if($data->pendidikan_terakhir==2) echo 'selected'; ?>>D3</option>
                <option value="3" <?php if($data->pendidikan_terakhir==3) echo 'selected'; ?>>S1</option>
                <option value="4" <?php if($data->pendidikan_terakhir==4) echo 'selected'; ?>>S2</option>
              </select>
            </div>
            <div class="form-group col-md-8 col-lg-4">
              <label for="kota">Kota Asal</label>
              <input value="<?php echo $data->kota; ?>" type="text" class="form-control" name="kota" placeholder="Kota Asal">
            </div>
            <div class="form-group col-md-8 col-lg-4">
              <label for="nohp">Nomor HP</label>
              <input value="<?php echo $data->no_hp; ?>" type="text" class="form-control" name="nohp" placeholder="Nomor HP">
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email Baru</label>
              <input type="email" value="<?php echo $data->email ?>" class="form-control" name="email" placeholder="Email">
            </div>
          </div>
          <button type="button" id="btn-batal-profil-user" class="btn btn-danger pull-right hidden">Batal</button>
          <input id="btn-simpan-profil-user" type="submit" value="Simpan" class="btn btn-success pull-right hidden mr-1">
      </form>
      <button type="button" id="btn-profil-user" class="btn btn-primary pull-right mt-5"><i class="fa fa-edit mr-1"></i>Ubah Profil</button>
      <button type="button" id="btn-password-user" class="btn btn-primary pull-right mr-1 mt-5"><i class="fa fa-edit mr-1"></i>Ubah Password</button>

    </fieldset>

    <form method="post" action="<?php echo base_url() . "profil/editPassword/". $data->id_user?>" class="<?php if($show!=='password') echo 'hidden' ?> mt-3" id="form-akun-user">
      <fieldset>
      <legend>Ubah Password</legend>
      <div class="form-group col-md-6">
        <label for="password">Password Lama</label>
        <input type="password" class="form-control" name="password_lama" placeholder="Password">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Password Baru</label>
        <input type="password" class="form-control" name="password_baru" placeholder="Password">
      </div>
      <div class="form-group col-md-6">
        <label for="retypePassword">Ketik Ulang Password Baru</label>
        <input type="password" class="form-control" name="password_retype" placeholder="Password">
      </div>
      <?php if (isset($error)): ?>
           <div class="alert alert-danger alert-dismissable">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?php echo $error; ?>
           </div>
       <?php endif ?>
      <button type="button" id="btn-batal-password-user" class="btn btn-danger pull-right hidden">Batal</button>
      <input id="btn-simpan-password-user" type="submit" value="Simpan" class="btn btn-success pull-right hidden mr-1">
    </form>
  </fieldset>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $("#btn-profil-user").click(function(){
        $("#form-profil-user").toggle();
        $("#table-profil-user").toggle();
        $("#btn-profil-user").toggle();
        $("#btn-password-user").toggle();
        $("#btn-simpan-profil-user").toggle();
        $("#btn-batal-profil-user").toggle();
    });

    $("#btn-batal-profil-user").click(function(){
        $("#form-profil-user").toggle();
        $("#table-profil-user").toggle();
        $("#btn-profil-user").toggle();
        $("#btn-password-user").toggle();
        $("#btn-simpan-profil-user").toggle();
        $("#btn-batal-profil-user").toggle();
    });

    $("#btn-password-user").click(function(){
        $("#form-akun-user").toggle();
        $("#table-akun-user").toggle();
        $("#btn-batal-password-user").toggle();
        $("#btn-simpan-password-user").toggle();
    });

    $("#btn-batal-password-user").click(function(){
      $("#form-akun-user").toggle();
      $("#table-akun-user").toggle();
      $("#btn-batal-password-user").toggle();
      $("#btn-simpan-password-user").toggle();
    });
});


</script>
