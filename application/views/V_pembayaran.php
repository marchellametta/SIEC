<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_pembayaran']) ?>

<div class="text-left ml-3"><h5><?php echo 'Daftar Pembayaran ' . $ec->jenis_ec. " : " . $ec->tema_ec; ?></h5></div>
<ul class="nav nav-tabs border-dark" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active border-dark bg-dark" id="tetap-tab" data-toggle="tab" href="#tetap" role="tab" aria-controls="tetap" aria-selected="true">Peserta Tetap</a>
  </li>
  <li class="nav-item">
    <a class="nav-link border-dark bg-dark" id="lepas-tab" data-toggle="tab" href="#lepas" role="tab" aria-controls="lepas" aria-selected="false">Peserta Lepas</a>
  </li>
</ul>

<div class="tab-content">
  <div id="tetap" class="tab-pane fade show active" role="tabpanel" aria-labelledby="tetap-tab">
    <form method="post" action="<?php echo base_url() ?>kelas/pembayaran/<?php echo $ec->id_ec ?>">
    <table class="table table-hover table-striped table-bordered absensi mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="text-center w-45">Nama Peserta</th>
          <th scope="col" class="text-center w-10">Total Biaya</th>
          <th scope="col" class="text-center w-10">Telah Bayar</th>
          <th scope="col" class="text-center w-5">Potongan Biaya</th>
          <th scope="col" class="text-center w-10">Metode Pembayaran</th>
          <th scope="col" class="text-center w-5">Status Pembayaran</th>
          <th scope="col" class="text-center w-5">Status Pendaftaran</th>
          <th scope="col" class="text-center w-5">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tetap as $row): ?>
        <tr>
          <td><?php echo $row->nama;?></td>
          <td><?php echo "Rp. ".number_format($row->tagihan).",00 / Rp. ".number_format($row->tagihan_pelajar).",00";?><small> (khusus pelajar/mahasiswa)</small></td>
          <td>
            <input type="text" placeholder="Bayar sebagian" class="form-control input-biaya hidden">
            <input type="number" name="telah-bayar[<?php echo $row->id_user ?>]" class="hidden real-input-biaya">
            <a><?php echo "Rp. ".number_format($row->telah_bayar).",00"; ?></a>
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input pelajar" type="checkbox" value="<?php echo $row->id_user?>" name= "potongan[]" <?php if($row->status_pelajar=='1') echo "checked"?>>
              <label class="form-check-label">Pelajar/Mahasiswa</label>
            </div>
          </td>
          <td class="text-left">
            <div class="form-check">
              <input class="form-check-input radio" type="radio" value="1" name= "metodetetap[<?php echo $row->id_user?>]" <?php if($row->transfer == 'false') echo 'checked'?>>
              <label class="form-check-label">Tunai</label>
            </div>
            <div class="form-check">
              <input class="form-check-input radio" type="radio" value="2" name= "metodetetap[<?php echo $row->id_user?>]" <?php if($row->transfer == 'true') echo 'checked'?>>
              <label class="form-check-label">Transfer <?php if($row->transfer == 'true') echo '<a class="ml-1" tabindex="0" class= "" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" data-html="true" data-content="'.$row->data_transfer.'"><i class="fa fa-link"></i></a>'?></label>
            </div>
            <input type="text" class="form-control detailbayar hidden" name="detailpembayarantetap[<?php echo $row->id_user?>]">
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $row->id_user?>" name= "bayar[]" <?php if($row->status_lunas=='1') echo "checked"?>>
              <label class="form-check-label">Lunas</label>
            </div>
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $row->id_user?>" name= "batal[]" <?php if($row->status_batal=='1') echo "checked"?>>
              <label class="form-check-label">Batal</label>
            </div>
          </td>
          <td class="text-center">
            <button type="button" class="btn btn-sm btn-primary bayar">Bayar sebagian</button>
          </td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div id="lepas" class="tab-pane fade">
    <table class="table table-hover table-striped table-bordered absensi mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="text-center w-30">Nama Peserta</th>
          <th scope="col" class="text-center w-30">Nama Topik</th>
          <th scope="col" class="text-center w-10">Total Biaya</th>
          <th scope="col" class="text-center w-10">Metode Pembayaran</th>
          <th scope="col" class="text-center w-10">Status Pembayaran</th>
          <th scope="col" class="text-center w-10">Status Pendaftaran</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lepas as $row): ?>
        <tr>
          <td><?php echo $row->nama;?></td>
          <td><?php echo $row->nama_topik;?></td>
          <td><?php echo "Rp. ".number_format($row->tagihan).",00";?></td>
          <td class="text-left">
            <div class="form-check">
              <input class="form-check-input radio" type="radio" value="1" name= "metodelepas[<?php echo $row->id_topik?>][<?php echo $row->id_user?>]" <?php if($row->transfer == false) echo 'checked'?>>
              <label class="form-check-label">Tunai</label>
            </div>
            <div class="form-check">
              <input class="form-check-input radio" type="radio" value="2" name= "metodelepas[<?php echo $row->id_topik?>][<?php echo $row->id_user?>]" <?php if($row->transfer == true) echo 'checked'?>>
              <label class="form-check-label">Transfer<?php if($row->transfer == 'true') echo '<a class="ml-1" tabindex="0" class= "" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" data-html="true" data-content="'.$row->data_transfer.'"><i class="fa fa-link"></i></a>'?></label>
            </div>
            <input type="text" class="form-control detailbayar hidden" name="detailpembayaranlepas[<?php echo $row->id_topik?>][<?php echo $row->id_user?>]">
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name= "bayar_lepas[<?php echo $row->id_topik?>][<?php echo $row->id_user?>]" <?php if($row->status_lunas==1) echo "checked"?>>
              <label class="form-check-label">Lunas</label>
            </div>
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name= "batal_lepas[<?php echo $row->id_topik?>][<?php echo $row->id_user?>]" <?php if($row->status_batal==1) echo "checked"?>>
              <label class="form-check-label">Batal</label>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-xs-6">
    <a href="<?php echo base_url() . 'kelas/'.$link ?>" id="btn-kembali" class="btn btn-secondary"><span class="fa fa-chevron-left mr-2"></span>Kembali</a>
  </div>
  <div class="col-xs-6 ml-auto">
    <input type="submit" value="Simpan" class="btn btn-success">
    <a href="<?php echo base_url().'kelas/'.$link?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button></a>
  </div>
</div>
</form>
</div>
<div class="modal fade" id="pembayaran">
  <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
       <a class="modal-title"><b>Data Pembayaran Transfer</b></a>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="modal-body">
       <div class="mt-3" id="pembayaranform">
         <div class="form-row ml-2">
           <div class="form-group col-md-6">
             <label for="nama">Nama Bank</label>
             <input type="text" class="form-control" name="namabank" id="namabank" placeholder="Nama Bank">
             <span class="help-block text-danger"></span>
           </div>
           <div class="form-group col-md-6">
             <label for="nama">Nomor Rekening</label>
             <input type="number" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening">
             <span class="help-block text-danger"></span>
           </div>
         </div>
         <div class="form-row ml-2">
           <div class="form-group col-md-6 col-lg-6">
             <label for="nama">Nama Pemilik Rekening</label>
             <input type="text" class="form-control" name="namarek" id="namarek" placeholder="Nama Pemilik Rekening">
             <span class="help-block text-danger"></span>
           </div>
           <div class="form-group col-md-6 col-lg-6">
             <label for="nama">Tanggal Transfer</label>
             <div class="input-group date" id="tanggal" data-target-input="nearest">
                <input type="text" id="tanggal-text" class="form-control datetimepicker-input" data-target="#tanggal"/>
                  <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
             </div>
           </div>
         </div>
           <div class="form-group col-md-6 col-lg-6">
             <label for="nama">Nominal Transfer</label>
             <div class="input-group">
               <span class="input-group-addon p-2">Rp</span>
               <input type="text" placeholder="Nominal Transfer" id="input-nominal" name="nominal" class="form-control">
               <input type="number" class="hidden" name="nominal" id="nominal" placeholder="Nominal Transfer">
             </div>
             <span class="help-block text-danger"></span>
           </div>
           <div class="form-group col-md-6 col-lg-6">
             <label for="alamat">Keterangan</label>
             <textarea class="form-control" rows="5" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
             <span class="help-block text-danger"></span>
           </div>
       </div>
     </div>
     <div class="modal-footer">
       <div class="text-right">
         <button type="button" class="btn btn-success" id="simpan" data-dismiss="modal">Simpan</button>
         <button type="button" class="btn btn-danger" id="batal" data-dismiss="modal">Batal</button>
       </div>
     </div>
   </div>
 </div>
</div>

<script>
$(document).ready(function(){

  var input='';
   $('.bayar').click(function(){
     $(this).parent().siblings().children('.input-biaya').show();
     $(this).parent().siblings().children('a').hide();
     $(this).parent().siblings().children().children('.lunas').prop('checked',false);

   })

   $('input[type=radio].radio').change(function() {
     input = $(this).parent().siblings('.detailbayar');
       if (this.value == '2') {
           $('#pembayaran').modal('show');
         }
   });

   $('#input-nominal').number(true, 2, ',', '.');

   $('#input-nominal').on('keyup',function(e){
     $('#nominal').val($('#input-nominal').val()).keyup();
   });

   $('#simpan').click(function(){
     var namabank = $('#namabank').val();
     var norek = $('#norek').val();
     var namarek = $('#namarek').val();
     var tgltrf = $('#tanggal-text').val();
     var nominal = $('#nominal').val();
     var keterangan = $('#keterangan').val();

     $(input).val(namabank+','+norek+','+namarek+','+tgltrf+','+nominal+','+keterangan);
     $('#pembayaran input[type=text], #pembayaran textarea').each(function() {
       //if(!$(this).hasClass('hidden')){
         resetForm($(this).attr('id'));
       //}
     });
   });

   $('#batal').click(function(){
      $(input).siblings().children().attr('checked', false);
   });

   function resetForm(id) {
     $('#' + id).val(function() {
        return this.defaultValue;
     });
    }

    $('#tanggal').datetimepicker({
      format: 'DD-MM-YYYY'
    });


   $('.input-biaya').number(true, 2, ',', '.');

   $('.input-biaya').on('keyup',function(e){
     $(this).siblings('.real-input-biaya').val($(this).val()).keyup();
   });

   $(function () {
     $('[data-toggle="popover"]').popover({
       container: 'body'
     })
     $('.popover-dismiss').popover({
       trigger: 'focus'
     })
   })
});
</script>
