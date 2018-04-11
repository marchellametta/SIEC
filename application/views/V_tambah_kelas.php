<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php if (isset($error_message)): ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error_message ;?>
      </div>
  <?php endif ?>
  <form method="post" id="form" action="<?php echo base_url('tambahkelas') ?>" enctype="multipart/form-data">
    <input type="hidden" id="str" name="topik" value="" />
    <fieldset>
    <legend>Data Umum</legend>
     <div class="form-group col-md-6">
       <label for="jenis-ec">Jenis EC</label>
       <select class="form-control" name="jenis-ec">
         <?php foreach ($jenis_ec as $row): ?>
         <option value="<?php echo $row->id_jenis_ec ?>" <?php if(isset($post_data['jenis-ec'])) if($post_data['jenis-ec']==$row->id_jenis_ec) echo 'selected'?>><?php echo $row->jenis_ec ?></option>
       <?php endforeach; ?>
       </select>
       <span class="help-block text-danger"><?php if(isset($error_array['jenis-ec'])) echo $error_array['jenis-ec']?></span>
     </div>
     <div class="row ml-1">
       <div class="form-group col-md-3">
         <label for="pendidikan">Semester Pelaksanaan</label>
         <select class="form-control" name="semester">
           <option value="1" <?php if(isset($post_data['semester'])) if($post_data['semester']==1) echo 'selected'?>>Ganjil</option>
           <option value="2" <?php if(isset($post_data['semester'])) if($post_data['semester']==2) echo 'selected'?>>Genap</option>
         </select>
         <span class="help-block text-danger"><?php if(isset($error_array['semester'])) echo $error_array['semester']?></span>

       </div>
       <div class="form-group col-md-3">
         <label for="tahun">Tahun Pelaksanaan</label>
         <div class="input-group date" id="tahun" data-target-input="nearest">
           <input type="text" id="tanggal-text" class="form-control datetimepicker-input" value="<?php if(isset($post_data['tahun'])) echo $post_data['tahun']?>" data-target="#tahun"/>
             <div class="input-group-append" data-target="#tahun" data-toggle="datetimepicker">
               <div class="input-group-text"><i class="fa fa-calendar"></i></div>
             </div>
         </div>
         <span class="help-block text-danger"><?php if(isset($error_array['tahun'])) echo $error_array['tahun']?></span>
       </div>
     </div>
      <div class="form-group col-md-6">
        <label for="tema">Tema Umum</label>
        <input type="text" class="form-control" name="tema" placeholder="Tema Umum" value="<?php if(isset($post_data['tema'])) echo $post_data['tema']?>">
        <span class="help-block text-danger"><?php if(isset($error_array['tema'])) echo $error_array['tema']?></span>
      </div>
      <div class="row ml-2">
        <div class="form-group col-md-3">
          <label for="input-gambar" class="control-label">Gambar</label>
          <div class="input-group">
            <span id="input-gambar-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-file" id="input-gambar-file" class="hidden">
            <input type="text" placeholder="Pilih Gambar" id="input-gambar" name="gambar" class="form-control cursor" readonly>
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="input-pdf" class="control-label">Modul</label>
          <div class="input-group">
            <span id="input-pdf-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept=".pdf" name="pdf-file" id="input-pdf-file" class="hidden">
            <input type="text" placeholder="Pilih PDF" id="input-pdf" name="pdf" class="form-control cursor" readonly>
          </div>
        </div>
      </div>
      <div class="form-group col-md-12">
        <label for="deskripsi">Deskripsi</label>
         <textarea class="form-control" rows="5" name="deskripsi"><?php if(isset($post_data['deskripsi'])) echo $post_data['deskripsi']?></textarea>
         <span class="help-block text-danger"><?php if(isset($error_array['deskripsi'])) echo $error_array['deskripsi']?></span>
      </div>
      <div class="form-group col-md-3">
        <label for="biaya">Biaya</label>
        <div class="input-group">
          <span class="input-group-addon p-2">Rp</span>
          <input type="text" placeholder="Biaya" name="biaya" id="input-biaya" class="form-control" value="<?php if(isset($post_data['biaya'])) echo $post_data['biaya']?>">
          <input type="number" id="real-input-biaya" name="biaya" class="hidden">
        </div>
        <span class="help-block text-danger"><?php if(isset($error_array['biaya'])) echo $error_array['biaya']?></span>
      </div>
      <div class="form-group hidden col-md-3" id="biaya_toggle">
        <label for="biaya-topik">Biaya per Topik</label>
        <div class="input-group">
          <span class="input-group-addon p-2">Rp</span>
          <input type="text" placeholder="Biaya" id="input-biaya-topik" name="biaya-topik" class="form-control" value="<?php if(isset($post_data['biaya-topik'])) echo $post_data['biaya-topik']?>">
          <input type="number" id="real-input-biaya-topik" name="biaya-topik" class="hidden" value="<?php if(isset($post_data['biaya-topik'])) echo $post_data['biaya-topik']?>">
        </div>
        <span class="help-block text-danger"><?php if(isset($error_array['biaya-topik'])) echo $error_array['biaya-topik']?></span>
      </div>
      <div class="form-group hidden col-md-3" id="kapasitas_toggle">
        <label for="kapasitas">Kapasitas Peserta</label>
        <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas" value="<?php if(isset($post_data['kapasitas'])) echo $post_data['kapasitas']?>">
        <span class="help-block text-danger"><?php if(isset($error_array['kapasitas'])) echo $error_array['kapasitas']?></span>
      </div>
      <div class="form-group col-md-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="peserta-lepas" id="inlineCheckbox1" value="2" <?php if(isset($post_data['peserta-lepas'])) echo 'checked'?>>
          <label class="form-check-label" for="inlineCheckbox1">Peserta Lepas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="evaluasi-mingguan" id="inlineCheckbox2" value="2" <?php if(isset($post_data['evaluasi-mingguan'])) echo 'checked'?>>
          <label class="form-check-label" for="inlineCheckbox2">Evaluasi Mingguan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="sistem-kuota" id="inlineCheckbox3" value="1" <?php if(isset($post_data['sistem-kuota'])) echo 'checked'?>>
          <label class="form-check-label" for="inlineCheckbox3">Pembatasan Kuota Peserta</label>
       </div>
      </div>
    </fieldset>

<fieldset class="mt-4">
  <legend>Rangkaian Topik</legend>
     <div class="text-right">
       <button type="button" id="tambah-topik-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Topik</button>
     </div>
     <div class="table-responsive mt-3">
       <table id="topik_tabel" class="table table-hover table-striped table-bordered">
         <thead class="thead-dark">
           <tr>
           <th class="w-15">Tanggal</th>
           <th class="w-20">Jam</th>
           <th class="w-10">Lokasi</th>
           <th class="w-25">Topik</th>
           <th class="w-20">Narasumber</th>
           <th class="hidden">Profesi</th>
           <th class="hidden">Lembaga</th>
           <th class="hidden">Jabatan</th>
           <th class="w-10">Aksi</th>
           <th class="hidden">Status</th>
           </tr>
          </thead>
          <tbody id="table-body-glr">
          </tbody>
        </table>
      </div>
      <div class="text-right">
        <input type="submit" id="simpan" value="Simpan" class="btn btn-success">
        <a href="<?php echo base_url()."informasi" ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
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
      <div class="modal-body" id="form">
         <div class="form-group col-md-12">
           <label for="topik">Topik</label>
           <input type="text" class="form-control" id="topik" placeholder="Topik">
         </div>
         <div class="form-group col-md-12">
           <label for="narasumber">Narasumber</label>
           <input type="text" class="form-control" id="narasumber" placeholder="Narasumber">
         </div>
         <div class="form-group col-md-12">
           <label for="profesi">Profesi</label>
           <input type="text" class="form-control" id="profesi" placeholder="Profesi">
         </div>
         <div class="form-group col-md-12">
           <label for="lembaga">Lembaga</label>
           <input type="text" class="form-control" id="lembaga" placeholder="Lembaga">
         </div>
         <div class="form-group col-md-12">
           <label for="jabatan">Jabatan</label>
           <input type="text" class="form-control" id="jabatan" placeholder="Jabatan">
         </div>
         <div class="form-group col-md-12">
           <label for="tanggal">Tanggal</label>
           <div class="input-group date" id="tanggal" data-target-input="nearest">
             <input type="text" id="tanggal-text" class="form-control datetimepicker-input" data-target="#tanggal"/>
               <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
               </div>
           </div>
         </div>
         <div class="form-group col-md-12">
           <label for="jam-mulai">Jam</label>
           <div class="row">
             <div class="col-md-5">
               <div class="input-group date" id="mulai" data-target-input="nearest">
                  <input type="text" id="jammulai" class="form-control datetimepicker-input" data-target="#mulai"/>
                    <div class="input-group-append" data-target="#mulai" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                    </div>
                </div>
             </div>
             <a>-</a>
             <div class="col-md-5">
               <div class="input-group date" id="selesai" data-target-input="nearest">
                  <input type="text" id="jamselesai" class="form-control datetimepicker-input" data-target="#selesai"/>
                    <div class="input-group-append" data-target="#selesai" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                    </div>
                </div>
             </div>
           </div>
         </div>
         <div class="form-group col-md-12">
           <label for="lokasi">Lokasi</label>
           <input type="text" class="form-control" id="lokasi" placeholder="Lokasi">
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

$(document).ready(function(){
    $("#tambah-topik-submit").click(function(){
       var topik = $('#topik').val();
       var narasumber = $('#narasumber').val();
       var profesi = $('#profesi').val();
       var lembaga = $('#lembaga').val();
       var jabatan = $('#jabatan').val();
       var tanggal = $('#tanggal-text').val();
       var jammulai = $('#jammulai').val();
       var jamselesai = $('#jamselesai').val();
       var lokasi = $('#lokasi').val();
       var button = '<button type="button" class="btn btn-danger btn-sm hapus"><i class="fa fa-close mr-1"></i>Hapus</button>';
       var status = 1;


        $("tbody").append("<tr>"+"<td>"+tanggal+"</td>"+"<td>"+jammulai+" - "+jamselesai+"</td>"+"<td>"+lokasi+"</td>"+"<td>"+topik+"</td>"+"<td>"+narasumber+"</td>"+"<td class="+'hidden'+">"+profesi+"</td>"+"<td class="+'hidden'+">"+lembaga+"</td>"+"<td class="+'hidden'+">"+jabatan+"</td>"+"<td>"+button+"</td>"+"<td class="+'hidden'+">"+status+"</td>"+"</tr>");
        $('#form').trigger("reset");
    });

    if ($("#inlineCheckbox3").is(":checked")) {
        $("#kapasitas_toggle").show();
    } else {
        $("#kapasitas_toggle").hide();
    }

    if ($("#inlineCheckbox1").is(":checked")) {
        $("#biaya_toggle").show();
    } else {
        $("#biaya_toggle").hide();
    }

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

    $('#tanggal').datetimepicker({
      format: 'L'
    });

    $('#selesai').datetimepicker({
      format: 'LT'
    });

    $('#mulai').datetimepicker({
      format: 'LT'
    });

    $('#tahun').datetimepicker({
      format: 'YYYY'
    });

    $('#simpan').click(function() {
      sendTableArticles();
    });

    $(document).on('click', '.hapus', function(){
      $(this).closest('tr').remove();
    });

    $('#input-biaya').number(true, 2, ',', '.');

    $('#input-biaya').on('keyup',function(e){
      $('#real-input-biaya').val($('#input-biaya').val()).keyup();
    });

    $('#input-biaya-topik').number(true, 2, ',', '.');

    $('#input-biaya-topik').on('keyup',function(e){
      $('#real-input-biaya-topik').val($('#input-biaya-topik').val()).keyup();
    });

    $('#input-gambar').add('#input-gambar-icon').on('click', function(event) {
              event.preventDefault();
              $('#input-gambar-file').click();
            });

            $('#input-gambar-file').on('change', function() {
              var filename = $(this).val().split(/(\\|\/)/g).pop();
              $('#input-gambar').val(filename).keyup();
            });

            $('#input-pdf').add('#input-pdf-icon').on('click', function(event) {
                      event.preventDefault();
                      $('#input-pdf-file').click();
                    });

                    $('#input-pdf-file').on('change', function() {
                      var filename = $(this).val().split(/(\\|\/)/g).pop();
                      $('#input-pdf').val(filename).keyup();
                    });

                    var rules = JSON.parse('<?php echo $rules ?>');
                    var form = $('#form');

                    if($("#inlineCheckbox3").is(':checked')){
            					rules = rules.concat(JSON.parse('<?php echo $kapasitas_rules ?>'));
            				}
                    if($("#inlineCheckbox1").is(':checked')){
            					rules = rules.concat(JSON.parse('<?php echo $biaya_topik_rules ?>'));
            				}
                    console.log(rules);
                    form.applyRules({
                      formRules : rules,
                      externalErrors : ''
                    });


                    $("#inlineCheckbox3").on('change',function(){
            					var currentRules = JSON.parse('<?php echo $rules ?>');
            					if($(this).is(':checked')){
            						currentRules = currentRules.concat(JSON.parse('<?php echo $kapasitas_rules ?>'));
            					}
                      if($("#inlineCheckbox1").is(':checked')){
            						currentRules = currentRules.concat(JSON.parse('<?php echo $biaya_topik_rules ?>'));
            					}

            					form.applyRules({
            						formRules : currentRules,
                      	externalErrors : ''
            					});
            				});

                    $("#inlineCheckbox1").on('change',function(){
            					var currentRules = JSON.parse('<?php echo $rules ?>');
            					if($(this).is(':checked')){
            						currentRules = currentRules.concat(JSON.parse('<?php echo $biaya_topik_rules ?>'));
            					}
                      if($("#inlineCheckbox3").is(':checked')){
            						currentRules = currentRules.concat(JSON.parse('<?php echo $kapasitas_rules ?>'));
            					}
                      form.applyRules({
            						formRules : currentRules,
                      	externalErrors : ''
            					});
            				});
});

function sendTableArticles() {
    var columns = [
        'tanggal',
        'jam',
        'lokasi',
        'topik',
        'narasumber',
        'profesi',
        'lembaga',
        'jabatan',
        'aksi',
        'status'
    ];

    var tableObject = $('#topik_tabel tbody tr').map(function (i) {
        var row = {};
        $(this).find('td').each(function (i) {
            var rowName = columns[i];
            row[rowName] = $(this).text();
        });

        return row;
    }).get();

    console.log(tableObject);
    $('#str').val(JSON.stringify(tableObject));
}


</script>
