<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_pendaftaran']) ?>
  <form method="post" action="<?php echo base_url('pendaftaran/daftar') ?>" enctype="multipart/form-data">
    <fieldset>
    <legend>Profil Umum</legend>
      <div class="form-group col-md-8 col-lg-6">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
      </div>
      <div class="form-group col-md-8 col-lg-6">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat"></textarea>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="lembaga">Lembaga</label>
          <input type="text" class="form-control" name="lembaga" placeholder="Lembaga">
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="pendidikan">Pendidikan terakhir</label>
          <select class="form-control" name="pendidikan">
            <option value="1">SMA</option>
            <option value="2">D3</option>
            <option value="3">S1</option>
            <option value="4">S2</option>
          </select>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="kota">Kota Asal</label>
          <input type="text" class="form-control" name="kota" placeholder="Kota Asal">
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="agama">Agama</label>
          <select class="form-control" name="agama">
            <option value="1">Katolik</option>
            <option value="2">Kristen</option>
            <option value="3">Islam</option>
            <option value="4">Buddha</option>
            <option value="5">Hindu</option>
            <option value="6">Lainnya</option>
          </select>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="nohp">Nomor HP</label>
          <input type="text" class="form-control" name="nohp" placeholder="Nomor HP">
        </div>
      </div>
      <div class="form-group col-md-4 col-lg-3">
        <label for="input-gambar" class="control-label">Foto</label>
        <div class="input-group">
          <span id="input-gambar-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
          <input type="file" accept="image/*" name="gambar-file" id="input-gambar-file" class="hidden">
          <input type="text" placeholder="Pilih Gambar" id="input-gambar" name="gambar" class="form-control cursor" readonly>
        </div>
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
    <legend>Kelas Extension Course yang Akan Diikuti</legend>

    <?php foreach ($data as $row): ?>
     <div class="form-group col-md-12">
       <div class="form-check">
         <input class="form-check-input selectall" type="checkbox" value="<?php echo $row->id_ec ?>" name="kelas[]"  data-biaya="<?php echo $row->biaya ?>" data-checked="#<?php echo "collapse". $row->id_ec ?>" <?php if($selected===$row->id_ec) echo "checked"?>>
         <label class="form-check-label" for="defaultCheck1">
           <?php echo $row->jenis_ec. ": ".$row->tema_ec."     <b>(Biaya: Rp. ".number_format($row->biaya,2,",",".").")</b>" ?>
         </label>
         <?php if ($row->status_peserta == 2 ): ?>
           <div><a class="" href="#" data-toggle="collapse" data-target="#<?php echo "collapse". $row->id_ec ?>"><i class="fa fa-plus-square mr-1 ml-1"></i>Pilih Topik</a></div>
         <?php endif; ?>
         <div class="form-check panel-collapse collapse in" id="<?php echo "collapse". $row->id_ec ?>">
          <a><b>
            <?php echo "Biaya Per Topik : Rp. ".$row->biaya_per_topik.",00" ?>
          </b></a>
         <?php foreach ($row->topik_arr as $temp): ?>
           <div class="col-md-12">
             <input class="form-check-input justone" type="checkbox" value="<?php echo $temp->id_topik ?>" data-checked="#<?php echo "collapse". $row->id_ec ?>" data-biaya="<?php echo $row->biaya ?>" data-biaya-topik="<?php echo $row->biaya_per_topik ?>" name="topik[]" <?php if($selected===$row->id_ec) echo "checked"?>>
             <label class="form-check-label" for="defaultCheck1">
               <?php echo $temp->nama_topik ?>
             </label>
           </div>
         <?php endforeach ?>
         </div>
       </div>
     </div>
     <?php endforeach ?>
     <small class="text-muted ml-3 mt-3">*Kelas yang ada dalam daftar pilihan adalah kelas dengan kursi yang masih tersedia</small>
     <div class="ml-3 mt-3"><a id="total-biaya"></a></div>
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
    recalculate();
});

$('.selectall').click(function() {
   if ($(this).is(':checked')) {
       $($(this).data("checked")+' input:checkbox').prop('checked', true);
       recalculate();
   } else {
       $($(this).data("checked")+' input:checkbox').prop('checked', false);
       recalculate();
   }
});

$('#input-gambar').add('#input-gambar-icon').on('click', function(event) {
          event.preventDefault();
          $('#input-gambar-file').click();
        });

        $('#input-gambar-file').on('change', function() {
          var filename = $(this).val().split(/(\\|\/)/g).pop();
          $('#input-gambar').val(filename).keyup();
        });



$("input[type='checkbox'].justone").change(function(){
    var a = $("#"+$(this).parent().parent().attr('id')+" input[type='checkbox'].justone");
    if(a.length == a.filter(":checked").length){
      $('[data-checked="'+$(this).data("checked")+'"].selectall').prop('checked', true);
      recalculate();
    }
    else {
      $('[data-checked="'+$(this).data("checked")+'"].selectall').prop('checked', false);
      recalculate();
    }
});

function recalculate(){
    var sum =0 ;
    $("input[type=checkbox]:checked.selectall").each(function(){
      sum += parseInt($(this).data("biaya"));
    });

    $("input[type=checkbox]:checked.justone").each(function(){
      if($('[data-checked="'+$(this).data("checked")+'"].selectall').is(':checked')){
      }else{
        sum += parseInt($(this).data("biaya-topik"));
      }
    });

    $("#total-biaya").html("<b>Total Biaya: Rp. "+(addCommas(sum))+",00</b>");

}

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}


</script>
