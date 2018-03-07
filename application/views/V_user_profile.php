<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-sm-2 ml-sm-2 mr-md-5 ml-md-5 mt-5">
  <div class="text-left ml-4"><h5>PROFIL ANDA</h5></div>
  <div class="row mr-3 ml-3 pb-3 pt-3">
    <div class="col-md-3 col-lg-3">
      <img class="w-100" src="<?php echo base_url() ?>images/profile.png">
    </div>
    <div class="col-md-9 col-lg-9">
      <fieldset>
      <legend>Profil Umum</legend>
      <table class="profile ml-3" id="table-profil-user">
        <tr>
          <th class="w-25"></th>
          <th class="w-5"></th>
          <th class="w-75"></th>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>:</td>
          <td>abcd</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcdabcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcd abcdabcd abcd</td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td>abcd</td>
        </tr>
        <tr>
          <td>Lembaga</td>
          <td>:</td>
          <td>abcd</td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>:</td>
          <td>abcd</td>
        </tr>
        <tr>
          <td>Kota asal</td>
          <td>:</td>
          <td>abcd</td>
        </tr>
        <tr>
          <td>Nomor HP</td>
          <td>:</td>
          <td>abcd</td>
        </tr>
      </table>
      <form class="hidden" method="post" action="<?php echo base_url() ?>/profile/edit/" id="form-profil-user">
          <div class="form-group col-md-12">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
          </div>
          <div class="form-group col-md-12">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat"></textarea>
          </div>
          <div class="form-row ml-2">
            <div class="form-group col-md-12">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
            </div>
            <div class="form-group col-md-12">
              <label for="lembaga">Lembaga</label>
              <input type="text" class="form-control" name="lembaga" placeholder="Lembaga">
            </div>
          </div>
          <div class="form-row ml-2">
            <div class="form-group col-md-8 col-lg-4">
              <label for="pendidikan">Pendidikan terakhir</label>
              <select class="form-control" name="pendidikan">
                <option value="1">SMA</option>
                <option value="2">D3</option>
                <option value="3">S1</option>
                <option value="4">S2</option>
              </select>
            </div>
            <div class="form-group col-md-8 col-lg-4">
              <label for="kota">Kota Asal</label>
              <input type="text" class="form-control" name="kota" placeholder="Kota Asal">
            </div>
            <div class="form-group col-md-8 col-lg-4">
              <label for="nohp">Nomor HP</label>
              <input type="text" class="form-control" name="nohp" placeholder="Nomor HP">
            </div>
          </div>
          <input id="btn-batal-profil-user" type="submit" value="Batal" class="btn btn-danger pull-right hidden">
          <input id="btn-simpan-profil-user" type="submit" value="Simpan" class="btn btn-success pull-right hidden mr-1">
      </form>
      <button type="button" id="btn-profil-user" class="btn btn-primary pull-right"><i class="fa fa-edit mr-1"></i>Edit</button>

    </fieldset>
    <fieldset class="mt-3">
    <legend>Informasi Akun</legend>
    <table class="profile ml-3" id="table-akun-user">
      <tr>
        <th class="w-25"></th>
        <th class="w-5"></th>
        <th class="w-45"></th>
        <th class="w-25"></th>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>abcd</td>
        <td><a href="#" id="btn-email-user"><i class="fa fa-edit mr-1"></i>Ganti email</a></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td>abcd</td>
        <td><a href="#" id="btn-password-user"><i class="fa fa-edit mr-1"></i>Ganti password</a></td>
      </tr>
    </table>
    <form class="hidden" id="form-email-user">
      <div class="form-group col-md-6">
        <label for="email">Email Baru</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <input id="btn-batal-email-user" type="submit" value="Batal" class="btn btn-danger pull-right hidden">
      <input id="btn-simpan-email-user" type="submit" value="Simpan" class="btn btn-success pull-right hidden mr-1">
    </form>
    <form class="hidden" id="form-akun-user">
      <div class="form-group col-md-6">
        <label for="password">Password Lama</label>
        <input type="password" class="form-control" name="oldPassword" placeholder="Password">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Password Baru</label>
        <input type="password" class="form-control" name="newPassword" placeholder="Password">
      </div>
      <div class="form-group col-md-6">
        <label for="retypePassword">Ketik Ulang Password Baru</label>
        <input type="password" class="form-control" name="retypePassword" placeholder="Password">
      </div>
      <input id="btn-batal-akun-user" type="submit" value="Batal" class="btn btn-danger pull-right hidden">
      <input id="btn-simpan-akun-user" type="submit" value="Simpan" class="btn btn-success pull-right hidden mr-1">
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
        $("#btn-simpan-profil-user").toggle();
        $("#btn-batal-profil-user").toggle();
    });

    $("#btn-password-user").click(function(){
        $("#form-akun-user").toggle();
        $("#table-akun-user").toggle();
        $("#btn-simpan-akun-user").toggle();
        $("#btn-batal-akun-user").toggle();
    });

    $("#btn-email-user").click(function(){
        $("#form-email-user").toggle();
        $("#table-akun-user").toggle();
        $("#btn-simpan-email-user").toggle();
        $("#btn-batal-email-user").toggle();
    });
});


</script>
