<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3">
  <form>
    <fieldset>
    <legend>Data Umum</legend>
      <div class="form-group col-md-6">
        <label for="tema">Tema Umum</label>
        <input type="text" class="form-control" id="tema" placeholder="Tema Umum">
      </div>
      <div class="form-group col-md-12">
        <label for="deskripsi">Deskripsi</label>
         <textarea class="form-control" rows="5" id="deskripsi"></textarea>
      </div>
      <div class="form-group col-md-3">
        <label for="biaya">Biaya</label>
         <input type="text" class="form-control" id="biaya" placeholder="Biaya">
      </div>
      <div class="form-group hidden col-md-3" id="biaya_toggle">
        <label for="biaya-topik">Biaya per Topik</label>
        <input type="text" class="form-control" id="biaya-topik" placeholder="Biaya per Topik">
      </div>
      <div class="form-group hidden col-md-3" id="kapasitas_toggle">
        <label for="kapasitas">Kapasitas Peserta</label>
        <input type="text" class="form-control" id="kapasitas" placeholder="Kapasitas">
      </div>
      <div class="form-group col-md-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">Peserta Lepas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Evaluasi Mingguan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Pembatasan Kuota Peserta</label>
       </div>
      </div>
    </fieldset>

<fieldset class="mt-4">
  <legend>Informasi Akun</legend>
     <div class="text-right">
       <button type="button" id="tambah-topik-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Topik</button>
     </div>
     <div class="table-responsive mt-3">
       <table id="topik" class="table table-hover table-striped table-bordered">
         <thead class="thead-dark">
           <tr>
           <th class="w-15">Tanggal</th>
           <th class="w-20">Jam</th>
           <th class="w-10">Lokasi</th>
           <th class="w-25">Topik</th>
           <th class="w-20">Narasumber</th>
           <th class="w-10"></th>
           </tr>
          </thead>
          <tbody id="table-body-glr">
          </tbody>
        </table>
      </div>
      <div class="text-right">
        <input type="submit" value="Simpan" class="btn btn-success">
        <input type="submit" value="Batal" class="btn btn-danger">
      </div>
</fieldset>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group col-md-12">
           <label for="inputEmail4">Topik</label>
           <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
         </div>
         <div class="form-group col-md-12">
           <label for="inputPassword4">Narasumber</label>
           <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
         </div>
         <div class="form-group col-md-12">
           <label for="inputEmail">Tanggal</label>
           <input class="form-control" id="datepicker" />
         </div>
         <div class="form-group col-md-12">
           <label for="inputPassword">Jam</label>
           <div class="row">
             <div class="col-md-3">
               <input type="password" class="form-control" id="inputPassword">
             </div>
             <a>-</a>
             <div class="col-md-3">
               <input type="password" class="form-control" id="inputPassword">
             </div>
           </div>
         </div>
         <div class="form-group col-md-12">
           <label for="inputPassword">Lokasi</label>
           <input type="password" class="form-control" id="inputPassword" placeholder="Password">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="tambah-topik-submit" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(function () {
       $("#inlineCheckbox3").click(function () {
           if ($(this).is(":checked")) {
               $("#kapasitas_toggle").show();
           } else {
               $("#kapasitas_toggle").hide();
           }
       });
       $("#inlineCheckbox1").click(function () {
           if ($(this).is(":checked")) {
               $("#biaya_toggle").show();
           } else {
               $("#biaya_toggle").hide();
           }
       });
   });

       $('#datepicker').datepicker({
           uiLibrary: 'bootstrap4'
       });

</script>
