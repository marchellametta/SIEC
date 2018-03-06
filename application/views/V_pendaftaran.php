<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mt-5">
  <form method="post" action="<?php echo base_url('pendaftaran/daftar') ?>">
    <fieldset>
    <legend>Profil Umum</legend>
      <div class="form-group col-md-6">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
      </div>
      <div class="form-group col-md-6">
        <label for="alamat">Alamat</label>
        <input type="textarea" class="form-control" name="alamat" placeholder="Alamat">
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-3">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
        </div>
        <div class="form-group col-md-3">
          <label for="lembaga">Lembaga</label>
          <input type="text" class="form-control" name="lembaga" placeholder="Lembaga">
        </div>
      </div>
      <div class="form-row ml-2">
        <div class="form-group col-md-4 col-lg-2">
          <label for="pendidikan">Pendidikan terakhir</label>
          <select class="form-control" name="pendidikan">
            <option value="1">SMA</option>
            <option value="2">D3</option>
            <option value="3">S1</option>
            <option value="4">S2</option>
          </select>
        </div>
        <div class="form-group col-md-4 col-lg-2">
          <label for="kota">Kota Asal</label>
          <input type="text" class="form-control" name="kota" placeholder="Kota Asal">
        </div>
        <div class="form-group col-md-4 col-lg-2">
          <label for="nohp">Nomor HP</label>
          <input type="text" class="form-control" name="nohp" placeholder="Nomor HP">
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
       <input type="password" class="form-control" name="retypePassword" placeholder="Password">
     </div>
    </fieldset>

    <fieldset class="mt-4">
    <legend>Kelas Extension Course yang Akan Diikuti</legend>

    <?php foreach ($data as $row): ?>
     <div class="form-group col-md-12">
       <div class="form-check">
         <input class="form-check-input selectall" type="checkbox" value="<?php echo $row->id_ec ?>" name="kelas[]"  data-checked="#<?php echo "collapse". $row->id_ec ?>" <?php if($selected===$row->id_ec) echo "checked"?>>
         <label class="form-check-label" for="defaultCheck1">
           <?php echo $row->jenis_ec. " : ".$row->tema_ec ?>
         </label>
         <?php if ($row->status_peserta == 2 ): ?>
           <a class="ml-3" href="#" data-toggle="collapse" data-target="#<?php echo "collapse". $row->id_ec ?>"><i class="fa fa-plus-square mr-1 ml-1"></i>Pilih Topik</a>
         <?php endif; ?>
         <div class="form-check panel-collapse collapse in" id="<?php echo "collapse". $row->id_ec ?>">
         <?php foreach ($row->topik_arr as $temp): ?>
           <div class="col-md-12">
             <input class="form-check-input justone" type="checkbox" value="<?php echo $temp->id_topik ?>" name="topik[]">
             <label class="form-check-label" for="defaultCheck1">
               <?php echo $temp->nama_topik ?>
             </label>
           </div>
         <?php endforeach ?>
         </div>
       </div>
     </div>
     <?php endforeach ?>
     <div class="text-right">
       <input type="submit" value="Daftar" class="btn btn-primary">
     </div>
    </fieldset>
  </form>
</div>
<script>
$('.selectall').click(function() {
   if ($(this).is(':checked')) {
       $($(this).data("checked")+' input:checkbox').prop('checked', true);
   } else {
       $($(this).data("checked")+' input:checkbox').prop('checked', false);
   }
});

$("input[type='checkbox'].justone").change(function(){
    var a = $("#"+$(this).parent().parent().attr('id')+" input[type='checkbox'].justone");
    if(a.length == a.filter(":checked").length){
        $('[data-checked="#collapse1"].selectall').prop('checked', true);
    }
    else {
        $('[data-checked="#collapse1"].selectall').prop('checked', false);
    }
});

</script>
