<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <div class="text-left ml-3"><h5><?php echo 'Cetak Sertifikat ' . $ec->jenis_ec. " : " . $ec->tema_ec; ?></h5></div>
  <div class="col-md-8 col-lg-6">
    <form method="post" action="<?php echo base_url().'kelas/cetak-sertifikat/' .$ec->id_ec; ?>">
     <fieldset class="mt-4">
       <legend>Pengaturan Letak Nama</legend>
       <div class="row ml-2">
         <div class="form-group col-md-6">
           <label for="nama_top">Jarak dari atas halaman</label>
           <div class="row ml-2">
             <input type="number" class="form-control col-4 col-md-4" value="<?php echo $data->nama_top?>" name="nama_top" placeholder=""><a class="col-2 col-md-2 pt-1">cm</a>
           </div>
         </div>
         <div class="form-group col-md-6">
           <label for="nama_top">Jarak dari kiri halaman</label>
           <div class="row ml-2">
             <input type="number" class="form-control col-4 col-md-4" value="<?php echo $data->nama_left?>" name="nama_left" placeholder=""><a class="col-2 col-md-2 pt-1">cm</a>
           </div>
         </div>
       </div>
     </fieldset>
     <fieldset class=" mt-2">
       <legend>Pengaturan Letak Peran</legend>
       <div class="row ml-2">
         <div class="form-group col-md-6">
           <label for="nama_top">Jarak dari atas halaman</label>
           <div class="row ml-2">
             <input type="number" class="form-control col-4 col-md-4" value="<?php echo $data->peran_top?>" name="peran_top" placeholder=""><a class="col-2 col-md-2 pt-1">cm</a>
           </div>
         </div>
         <div class="form-group col-md-6">
           <label for="nama_top">Jarak dari kiri halaman</label>
           <div class="row ml-2">
             <input type="number" class="form-control col-4 col-md-4" value="<?php echo $data->peran_left?>" name="peran_left" placeholder=""><a class="col-2 col-md-2 pt-1">cm</a>
           </div>
         </div>
       </div>
     </fieldset>
     <div class="form-group col-md-12">
       <div class="form-check form-check-inline">
         <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
         <label class="form-check-label" for="inlineCheckbox1">Cetak Satuan</label>
       </div>
     </div>
     <fieldset id="peserta_toggle" class="hidden mt-2">
       <legend>Pilih Peserta</legend>
       <div class="form-group col-md-12">
         <label for="nama_top">Nama Peserta</label>
         <input id="input-peserta" type="text" class="form-control col-10" name="nama_peserta" placeholder="">
         <input id="input-id-peserta" class="hidden" name="id_peserta">
         <span class="help-block"></span>
       </div>
     </fieldset>
     <div class="text-right mt-3">
       <input type="submit" value="Cetak" class="btn btn-success">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
     </div>
    </form>
  </div>
</div>

<script>
$(function () {
       $("#inlineCheckbox1").click(function () {
           if ($(this).is(":checked")) {
               $("#peserta_toggle").show();
           } else {
               $("#peserta_toggle").hide();
           }
       });
   });

   $(function () {
     var baseUrl = '<?php echo base_url() ?>';

     var inputPeserta= $('#input-peserta');
     var realInputPeserta = $('#input-id-peserta');

     inputPeserta.autocomplete({
       source : function(req,res){
         var postData = {
           nama : inputPeserta.val(),
           id_ec : '<?php echo $ec->id_ec ?>'
         };
         var url = baseUrl + 'peserta/search';
         $.get(url,postData).then(function(suggestions){
             var tmp = suggestions.map(function(item){
               return {
                 label : item.nama,
                 value : item.id_peserta
               };
             });
             res(tmp);
           });
         },
         select : function(e,ui){
            e.preventDefault();
            e.target.value = ui.item.label;
            realInputPeserta.val(ui.item.value).keyup();
          },
          focus : function(e,ui){
             e.preventDefault();
             e.target.value = ui.item.label;
             realInputPeserta.val(ui.item.value).keyup();
           },
          change : function(e, ui) {
            e.preventDefault();
            if (ui.item == null) {
              e.target.value = '';
              realInputPeserta.val('').keyup();
            }
          }
     });
    });




</script>
