<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <!-- <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_cetak_sertifikat']) ?> -->
  <div class="text-left ml-3"><h5><?php echo 'Penugasan Panitia' ?></h5></div>
  <div class="col-md-8 col-lg-12">
    <form method="post" action="<?php echo base_url().'kelas/cetak-sertifikat/' .$ec->id_ec; ?>" enctype="multipart/form-data">
      <fieldset class="mt-4">
        <legend>Pengaturan Panitia</legend>
          <div class="form-group col-md-12">
            <label for="batas_lulus">Nama Panitia</label>
            <input type="text" class="form-control col-4 col-md-4" id="input-panitia" name="nama_panitia" placeholder="Nama Panitia">
            <input id="input-id-panitia" class="hidden" name="id_panitia">
          </div>
          <div class="form-group col-md-12">
            <label for="batas_lulus">Kelas EC</label>
            <input type="text" class="form-control col-4 col-md-4" id="input-ec" name="nama_ec" placeholder="Kelas EC">
            <input id="input-id-ec" class="hidden" name="id_ec">
          </div>
      </fieldset>
      <div class="text-right mt-3">
       <input type="submit" value="Cetak" class="btn btn-success">
       <button type="button" class="btn btn-danger">Batal</button>
     </div>
    </form>
  </div>
</div>

<script>
   $(function () {
     var baseUrl = '<?php echo base_url() ?>';

     var inputPanitia= $('#input-panitia');
     var realInputPanitia = $('#input-id-panitia');

     inputPanitia.autocomplete({
       source : function(req,res){
         var postData = {
           nama : inputPanitia.val(),
           id_ec : '<?php echo $ec->id_ec ?>'
         };
         var url = baseUrl + 'panitia/search';
         $.get(url,postData).then(function(suggestions){
             var tmp = suggestions.map(function(item){
               return {
                 label : item.nama,
                 value : item.id_panitia
               };
             });
             res(tmp);
           });
         },
         select : function(e,ui){
            e.preventDefault();
            e.target.value = ui.item.label;
            realInputPanitia.val(ui.item.value).keyup();
          },
          focus : function(e,ui){
             e.preventDefault();
             e.target.value = ui.item.label;
             realInputPanitia.val(ui.item.value).keyup();
           },
          change : function(e, ui) {
            e.preventDefault();
            if (ui.item == null) {
              e.target.value = '';
              realInputPanitia.val('').keyup();
            }
          }
     });
    });


</script>
