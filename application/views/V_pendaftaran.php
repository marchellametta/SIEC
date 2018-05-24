<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_pendaftaran']) ?>
  <div class="alert alert-info alert-dismissable <?php if(isset($user)) echo 'hidden'?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Jika Anda telah memiliki akun, silahkan <a href="<?php echo base_url().'login'?>">Login ke akun Anda</a>
  </div>
  <?php if (isset($error_message)): ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error_message ;?>
      </div>
  <?php endif ?>
  <form method="post" id="form" action="<?php echo base_url('pendaftaran/daftar') ?>" enctype="multipart/form-data">
    <fieldset>
    <legend>Profil Umum</legend>
      <div class="form-group col-md-8 col-lg-6">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php if(isset($post_data['nama'])) echo $post_data['nama']; if(isset($user)) echo $user->nama ?>" <?php if(isset($user)) echo 'disabled'?>>
        <span class="help-block text-danger"><?php if(isset($error_array['nama'])) echo $error_array['nama']?></span>
      </div>
      <div class="form-group col-md-8 col-lg-6">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat" <?php if(isset($user)) echo 'disabled'?>><?php if(isset($post_data['alamat'])) echo $post_data['alamat'] ; if(isset($user)) echo $user->alamat?></textarea>
        <span class="help-block text-danger"><?php if(isset($error_array['alamat'])) echo $error_array['alamat']?></span>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="pekerjaan">Pekerjaan</label>
          <input id="input-pekerjaan" type="text" class="form-control" name="text-pekerjaan" placeholder="Pekerjaan" value="<?php if(isset($post_data['text-pekerjaan'])) echo $post_data['text-pekerjaan'] ; if(isset($user)) echo $user->nama_pekerjaan?>" <?php if(isset($user)) echo 'disabled'?>>
          <input id="input-id-pekerjaan" class="hidden" name="pekerjaan" value="<?php if(isset($post_data['pekerjaan'])) echo $post_data['pekerjaan'] ; if(isset($user)) echo $user->pekerjaan?>">
          <span class="help-block text-danger"><?php if(isset($error_array['pekerjaan'])) echo $error_array['pekerjaan']?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="lembaga">Lembaga</label>
          <input type="text" class="form-control" name="lembaga" placeholder="Lembaga" value="<?php if(isset($post_data['lembaga'])) echo $post_data['lembaga'] ; if(isset($user)) echo $user->lembaga?>" <?php if(isset($user)) echo 'disabled'?>>
          <span class="help-block text-danger"><?php if(isset($error_array['lembaga'])) echo $error_array['lembaga']?></span>
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="pendidikan">Pendidikan terakhir</label>
          <select class="form-control" name="pendidikan" <?php if(isset($user)) echo 'disabled'?>>
            <option value="1" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==1) echo 'selected' ; if(isset($user)) if($user->pendidikan_terakhir==1) echo 'selected'?>>SMA</option>
            <option value="2" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==2) echo 'selected' ; if(isset($user)) if($user->pendidikan_terakhir==2) echo 'selected'?>>D3</option>
            <option value="3" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==3) echo 'selected' ; if(isset($user)) if($user->pendidikan_terakhir==3) echo 'selected'?>>S1</option>
            <option value="4" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==4) echo 'selected' ; if(isset($user)) if($user->pendidikan_terakhir==4) echo 'selected'?>>S2</option>
            <option value="5" <?php if(isset($post_data['pendidikan'])) if($post_data['pendidikan']==5) echo 'selected' ; if(isset($user)) if($user->pendidikan_terakhir==5) echo 'selected'?>>S3</option>
          </select>
          <span class="help-block text-danger"><?php if(isset($error_array['pendidikan'])) echo $error_array['pendidikan']?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="kota">Kota Asal</label>
          <input type="text" class="form-control" name="kota" placeholder="Kota Asal" value="<?php if(isset($post_data['kota'])) echo $post_data['kota'] ; if(isset($user)) echo $user->kota?>" <?php if(isset($user)) echo 'disabled'?>>
          <span class="help-block text-danger"><?php if(isset($error_array['kota'])) echo $error_array['kota']?></span>
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-3">
          <label for="agama">Agama</label>
          <select class="form-control" name="agama" <?php if(isset($user)) echo 'disabled'?>>
            <option value="1" <?php if(isset($post_data['agama'])) if($post_data['agama']==1) echo 'selected' ; if(isset($user)) if($user->agama==1) echo 'selected'?>>Katolik</option>
            <option value="2" <?php if(isset($post_data['agama'])) if($post_data['agama']==2) echo 'selected' ; if(isset($user)) if($user->agama==2) echo 'selected'?>>Kristen</option>
            <option value="3" <?php if(isset($post_data['agama'])) if($post_data['agama']==3) echo 'selected' ; if(isset($user)) if($user->agama==3) echo 'selected'?>>Islam</option>
            <option value="4" <?php if(isset($post_data['agama'])) if($post_data['agama']==4) echo 'selected' ; if(isset($user)) if($user->agama==4) echo 'selected'?>>Buddha</option>
            <option value="5" <?php if(isset($post_data['agama'])) if($post_data['agama']==5) echo 'selected' ; if(isset($user)) if($user->agama==5) echo 'selected'?>>Hindu</option>
            <option value="6" <?php if(isset($post_data['agama'])) if($post_data['agama']==6) echo 'selected' ; if(isset($user)) if($user->agama==6) echo 'selected'?>>Lainnya</option>
          </select>
          <span class="help-block text-danger"><?php if(isset($error_array['agama'])) echo $error_array['agama']?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
          <label for="nohp">Nomor HP</label>
          <input type="text" class="form-control" name="nohp" placeholder="Nomor HP" value="<?php if(isset($post_data['nohp'])) echo $post_data['nohp'] ; if(isset($user)) echo $user->no_hp ?>" <?php if(isset($user)) echo 'disabled'?>>
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
       <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($post_data['email'])) echo $post_data['email'] ; if(isset($user)) echo $user->email?>" <?php if(isset($user)) echo 'disabled'?>>
       <span class="help-block text-danger"><?php if(isset($error_array['email'])) echo $error_array['email']?></span>
     </div>
     <div class="form-group col-md-6 <?php if(isset($user)) echo 'hidden'?>">
       <label for="password">Password</label>
       <input type="password" class="form-control" name="password" placeholder="Password">
       <span class="help-block text-danger"><?php if(isset($error_array['password'])) echo $error_array['password']?></span>
     </div>
     <div class="form-group col-md-6 <?php if(isset($user)) echo 'hidden'?>">
       <label for="retypePassword">Ketik Ulang Password</label>
       <input type="password" class="form-control" name="password_retype" placeholder="Password">
       <span class="help-block text-danger"><?php if(isset($error_array['password_retype'])) echo $error_array['password_retype']?></span>
     </div>
     <div class="form-check form-check-inline ml-3 <?php if(isset($user)) echo 'hidden'?>">
       <input class="form-check-input" type="checkbox" name="buat-akun" id="buat" value="1" <?php if(isset($post_data['buat-akun'])) echo 'checked'?>>
       <label class="form-check-label" for="buat-akun">Buat Akun</label>
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
         <input class="form-check-input selectall" type="checkbox" value="<?php echo $row->id_ec ?>" name="kelas[]"  data-biaya="<?php echo $row->biaya ?>" data-checked="#<?php echo "collapse". $row->id_ec ?>" <?php if(isset($selected)) if($selected===$row->id_ec) echo "checked"?> <?php if(isset($post_data['kelas'])) if(array_search($row->id_ec,$post_data['kelas'])!==false) echo "checked"?>>
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
             <input class="form-check-input justone" type="checkbox" value="<?php echo $temp->id_topik ?>" data-checked="#<?php echo "collapse". $row->id_ec ?>" data-biaya="<?php echo $row->biaya ?>" data-biaya-topik="<?php echo $row->biaya_per_topik ?>" name="topik[]" <?php if(isset($selected)) if($selected===$row->id_ec) echo "checked"?> <?php if(isset($post_data['topik'])) if(array_search($temp->id_topik,$post_data['topik'])!==false) echo "checked"?> <?php if($temp->aktif == 'false') echo 'disabled'?>>
             <label class="form-check-label" for="defaultCheck1">
               <?php echo $temp->nama_topik ?>
             </label>
           </div>
         <?php endforeach ?>
         </div>
       </div>
     </div>
     <?php endforeach ?>
     <span id="error" class="ml-2 help-block text-danger"><?php if(isset($error_array['topik[]'])) echo $error_array['topik[]']?></span></br>

     <small class="text-muted ml-3 mt-3">*Kelas yang ada dalam daftar pilihan adalah kelas dengan kursi yang masih tersedia</small>
     <div class="ml-3 mt-3"><a id="total-biaya"></a></div>
     </fieldset>
     <div class="text-right">
       <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal_konfirmasi">
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

$(function () {
  var baseUrl = '<?php echo base_url() ?>';

  var inputPekerjaan= $('#input-pekerjaan');
  var realInputPekerjaan = $('#input-id-pekerjaan');

  inputPekerjaan.autocomplete({
    source : function(req,res){
      var postData = {
        pekerjaan : inputPekerjaan.val()
      };
      var url = baseUrl + 'pekerjaan/search';
      console.log(url);
      $.get(url,postData).then(function(suggestions){
          var tmp = suggestions.map(function(item){
            return {
              label : item.nama_pekerjaan,
              value : item.id_pekerjaan
            };
          });
          res(tmp);
        });
      },
      select : function(e,ui){
         e.preventDefault();
         e.target.value = ui.item.label;
         realInputPekerjaan.val(ui.item.value).keyup();
       },
       focus : function(e,ui){
          e.preventDefault();
          e.target.value = ui.item.label;
          realInputPekerjaan.val(ui.item.value).keyup();
        },
       change : function(e, ui) {
         e.preventDefault();
         if (ui.item == null) {
           e.target.value = '';
           realInputPekerjaan.val('').keyup();
         }
       }
  });
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

$("form").submit(function() {
    $("input[type='checkbox']").removeAttr("disabled");
});

var rules = JSON.parse('<?php echo $rules ?>');
if($("#buat").is(':checked')){
  rules = rules.concat(JSON.parse('<?php echo $akun_rules ?>'));
}
$('#form').applyRules({
  formRules : rules,
  //externalErrors : ''
});

$("#buat").on('change',function(){
  var currentRules = JSON.parse('<?php echo $rules ?>');
  if($(this).is(':checked')){
    currentRules = currentRules.concat(JSON.parse('<?php echo $akun_rules ?>'));
  }
  console.log(JSON.parse('<?php echo $akun_rules ?>'));
  console.log(currentRules);
  $('#form').applyRules({
    formRules : currentRules,
    //externalErrors : ''
  });
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
