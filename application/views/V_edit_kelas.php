<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url() ?> "><i class="fa fa-home mr-1"></i>Beranda</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url() .'informasi/'. $link?>">Informasi</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url()."informasi/detail". $ec->id_ec ?>">Detail</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>

    </ol>
  </nav>
  <?php if (isset($error_message)): ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error_message ;?>
      </div>
  <?php endif ?>
  <form method="post" id="form-umum" action="<?php echo base_url().'editkelas/'.$ec->id_ec ?>" enctype="multipart/form-data">
    <input type="hidden" id="str" name="topik" value="" />
    <fieldset>
    <legend>Data Umum</legend>
     <div class="form-group col-md-6">
       <label for="jenis-ec">Jenis EC</label>
       <select class="form-control" name="jenis-ec">
         <?php foreach ($jenis_ec as $row): ?>
         <option value="<?php echo $row->id_jenis_ec ?>"><?php echo $row->jenis_ec ?></option>
       <?php endforeach; ?>
       </select>
       <span class="help-block text-danger"><?php if(isset($error_array['jenis-ec'])) echo $error_array['jenis-ec']?></span>
     </div>
     <div class="row ml-1">
       <div class="form-group col-md-3">
         <label for="pendidikan">Semester Pelaksanaan</label>
         <select class="form-control" name="semester">
           <option value="1" <?php if($ec->semester_pelaksanaan==1) echo 'selected'; ?>>Ganjil</option>
           <option value="2" <?php if($ec->semester_pelaksanaan==2) echo 'selected'; ?>>Genap</option>
         </select>
         <span class="help-block text-danger"><?php if(isset($error_array['semester'])) echo $error_array['semester']?></span>
       </div>
       <div class="form-group col-md-3">
         <label for="tahun">Tahun Pelaksanaan</label>
         <div class="input-group date" id="tahun" data-target-input="nearest">
           <input type="number" id="tahun-text" name="tahun" class="form-control datetimepicker-input" value="<?php echo $ec->tahun_pelaksanaan ?>" data-target="#tahun"/>
             <div class="input-group-append" data-target="#tahun" data-toggle="datetimepicker">
               <div class="input-group-text"><i class="fa fa-calendar"></i></div>
             </div>
         </div>
         <span class="help-block text-danger"><?php if(isset($error_array['tahun'])) echo $error_array['tahun']?></span>
       </div>
     </div>
      <div class="form-group col-md-6">
        <label for="tema">Tema Umum</label>
        <input type="text"  value="<?php echo $ec->tema_ec ?>"class="form-control" name="tema" placeholder="Tema Umum">
        <span class="help-block text-danger"><?php if(isset($error_array['tema'])) echo $error_array['tema']?></span>
      </div>
      <div class="row ml-2">
        <div class="form-group col-md-3">
          <label for="input-gambar" class="control-label">Gambar</label>
          <div class="input-group">
            <span id="input-gambar-icon" class="input-group-addon border"><i class="fa fa-upload p-2"></i></span>
            <input type="file" accept="image/*" name="gambar-file" id="input-gambar-file" class="hidden">
            <input type="text" value="<?php echo $ec->gambar ?>" placeholder="Pilih Gambar" id="input-gambar" name="gambar" class="form-control cursor" readonly>
          </div>
        </div>
      </div>
      <div class="form-group col-md-12">
        <label for="deskripsi">Deskripsi</label>
         <textarea class="form-control" rows="5" name="deskripsi"><?php echo $ec->deskripsi ?></textarea>
         <span class="help-block text-danger"><?php if(isset($error_array['deskripsi'])) echo $error_array['deskripsi']?></span>
      </div>
      <div class="row ml-1">
        <div class="form-group col-md-3">
          <label for="biaya">Biaya</label>
          <div class="input-group">
            <span class="input-group-addon p-2">Rp</span>
            <input type="text" placeholder="Biaya" name="biaya" id="input-biaya" class="form-control" value="<?php echo $ec->biaya ?>">
            <input type="number" id="real-input-biaya" name="biaya" class="hidden">
          </div>
          <span class="help-block text-danger"><?php if(isset($error_array['biaya'])) echo $error_array['biaya']?></span>
        </div>
        <div class="form-group col-md-3">
          <label for="biaya-pelajar">Biaya Pelajar/Mahasiswa</label>
          <div class="input-group">
            <span class="input-group-addon p-2">Rp</span>
            <input type="text" placeholder="Biaya" name="biaya-pelajar" id="input-biaya-pelajar" class="form-control" value="<?php echo $ec->biaya_pelajar ?>">
            <input type="number" id="real-input-biaya-pelajar" name="biaya-pelajar" class="hidden">
          </div>
          <span class="help-block text-danger"><?php if(isset($error_array['biaya-pelajar'])) echo $error_array['biaya-pelajar']?></span>
        </div>
      </div>
      <div class="form-group hidden col-md-3" id="biaya_toggle">
        <label for="biaya-topik">Biaya per Topik</label>
        <div class="input-group">
          <span class="input-group-addon p-2">Rp</span>
          <input type="text" placeholder="Biaya" id="input-biaya-topik" name="biaya-topik" value="<?php echo $ec->biaya_per_topik ?>" class="form-control">
          <input type="number" id="real-input-biaya-topik" value="<?php echo $ec->biaya_per_topik ?>" name="biaya-topik" class="hidden">
        </div>
        <span class="help-block text-danger"><?php if(isset($error_array['biaya-topik'])) echo $error_array['biaya-topik']?></span>
      </div>
      <div class="form-group hidden col-md-3" id="kapasitas_toggle">
        <label for="kapasitas">Kapasitas Peserta</label>
        <input type="text" class="form-control" value="<?php echo $ec->kapasitas_peserta ?>" name="kapasitas" placeholder="Kapasitas">
        <span class="help-block text-danger"><?php if(isset($error_array['kapasitas'])) echo $error_array['kapasitas']?></span>
      </div>
      <div class="form-group col-md-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="peserta-lepas" id="inlineCheckbox1" value="2" <?php if($ec->status_peserta==2) echo 'checked' ?>>
          <label class="form-check-label" for="inlineCheckbox1">Peserta Lepas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="evaluasi-mingguan" id="inlineCheckbox2" value="2" <?php if($ec->status_evaluasi==2) echo 'checked' ?>>
          <label class="form-check-label" for="inlineCheckbox2">Evaluasi Mingguan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="sistem-kuota" id="inlineCheckbox3" value="1" <?php if($ec->kapasitas_peserta!=0) echo 'checked' ?>>
          <label class="form-check-label" for="inlineCheckbox3">Pembatasan Kuota Peserta</label>
       </div>
      </div>
    </fieldset>

<fieldset class="mt-4">
  <legend>Rangkaian Topik</legend>
     <div class="text-right">
       <button type="button" id="tambah-topik-btn" class="btn btn-primary" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i>Tambah Topik</button>
     </div>
     <div class="table-responsive mt-3">
       <table id="topik_tabel" class="table table-hover table-striped table-bordered">
         <thead class="thead-dark">
           <tr>
             <th class="w-15">Rangkaian Topik</th>
             <th class="w-10">Aksi</th>
           </tr>
          </thead>
          <tbody id="table-body-glr">
            <?php foreach ($topik as $row): ?>
              <tr>
                <td>
                  <ul>
                    <li class="hidden id_topik">
                      <span class="id"><?php echo $row->id_topik; ?></span>
                    </li>
                    <li>
                      <b>
                        Tanggal:
                      </b>
                      <span class="t"><?php echo $row->tanggal; ?></span>
                    </li>
                    <li>
                      <b>
                        Waktu:
                      </b>
                      <span class="w"><?php echo date('H:i',strtotime($row->jam_mulai)) ." - ". date('H:i',strtotime($row->jam_selesai)); ?></span>
                    </li>
                    <li>
                      <b>
                        Lokasi:
                      </b>
                      <span class="l"><?php echo $row->lokasi; ?></span>
                    </li>
                    <li>
                      <b>
                        Nama topik:
                      </b>
                      <span class="n"><?php echo $row->nama_topik; ?></span>
                    </li>
                    <li class="split">
                      <b>
                        Narasumber:
                      </b>
                      <br>
                      <span class="nr"><?php foreach ($row->narasumber as $temp): ?><?php echo "<a>".$temp->nama."</a>,<a> ".$temp->profesi."</a>,<a> ".$temp->lembaga."</a>,<a> ".$temp->jabatan."</a><a class=hidden>, ".$temp->id_narasumber."</a><a class='hidden'>, 3</a></br>"; ?><?php endforeach; ?>
                      </span>
                    </li>
                    <li class="hidden status">
                      <span><?php echo $row->status ?></span>
                    </li>
                </td>
                <td>
                  <button type="button" class="btn btn-success btn-sm edit"><i class="fa fa-edit mr-1"></i>Edit</button>
                  <button type="button" class="btn btn-danger btn-sm hapus ml-2"><i class="fa fa-close mr-1"></i>Hapus</button>
                </td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class="text-right">
        <input type="submit" id="simpan" value="Simpan" class="btn btn-success">
        <a href="<?php echo base_url()."informasi/aktif" ?>"><button type="button" class="btn btn-danger">Batal</button></a>
      </div>
</fieldset>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Tambah Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="form">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col-md-12">
              <label for="topik">Topik</label>
              <input type="text" class="form-control" id="topik" placeholder="Topik">
            </div>
            <div class="form-group col-md-12 hidden">
              <input type="text" class="form-control" id="id_topik" placeholder="Topik">
            </div>
            <div class= "row">
              <div class="col-md-10"  id="nara">
                <div class="block_nara">
                  <div class="row ml-1">
                    <div class="form-group col-md-10">
                      <label for="narasumber">Narasumber</label>
                      <input type="text" class="form-control narasumber" id="narasumber1" data-urutan="1" placeholder="Narasumber">
                    </div>
                    <div class="col-md-2 pr-0">
                      <a class="hapus-narasumber button btn-danger rounded text-white pl-1 pr-1" data-toggle="tooltip" title="Hapus narasumber"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="profesi">Profesi</label>
                    <input type="text" class="form-control profesi" id="profesi1" data-urutan="1" placeholder="Profesi">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="lembaga">Lembaga</label>
                    <input type="text" class="form-control lembaga" id="lembaga1" data-urutan="1" placeholder="Lembaga">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control jabatan" id="jabatan1" data-urutan="1" placeholder="Jabatan">
                    <input type="text" class="form-control id_narasumber hidden" id="id_narasumber1" data-urutan="1">
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <a id="tambah-narasumber" class="button btn-secondary rounded text-white pl-2 pr-2" data-toggle="tooltip" title="Tambah narasumber"><i class="fa fa-plus"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
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
        </div>

      </div>
      <div class="modal-footer">
        <button id="tambah-topik-submit" type="button" class="btn btn-success" data-dismiss="modal">Tambah</button>
        <button id="edit-topik-submit" type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){
  var i = 1;
  $('[data-toggle="tooltip"]').tooltip();
  $("#tambah-narasumber").click(function(){
    i = i+1;
    $("#nara").append('<div class="block_nara"><div class="row ml-1"><div class="form-group col-md-10">'+
      '<label for="narasumber">Narasumber</label>'+
      '<input type="text" class="form-control narasumber" id="narasumber'+i+'" data-urutan="1" placeholder="Narasumber">'+
    '</div>'+
    '<div class="col-md-2 pr-0">'+
      '<a class=" hapus-narasumber button btn-danger rounded text-white pl-1 pr-1" data-toggle="tooltip" title="Hapus narasumber"><i class="fa fa-times"></i></a>'+
    '</div>'+'</div>'+
    '<div class="form-group col-md-12">'+
      '<label for="profesi">Profesi</label>'+
      '<input type="text" class="form-control profesi" id="profesi'+i+'" data-urutan="'+i+'" placeholder="Profesi">'+
    '</div>'+
    '<div class="form-group col-md-12">'+
      '<label for="lembaga">Lembaga</label>'+
      '<input type="text" class="form-control lembaga" id="lembaga'+i+'" data-urutan="'+i+'" placeholder="Lembaga">'+
    '</div>'+
    '<div class="form-group col-md-12">'+
      '<label for="jabatan">Jabatan</label>'+
      '<input type="text" class="form-control jabatan" id="jabatan'+i+'" data-urutan="'+i+'" placeholder="Jabatan">'+
      '<input type="text" class="form-control id_narasumber hidden" id="id_narasumber'+i+'" data-urutan="1">'+
    '</div></div>');
    $(".narasumber").each(function(index) {
    enableAutoComplete($(this));
  });

  });

  function enableAutoComplete($element) {
    var baseUrl = '<?php echo base_url() ?>';
    var input = '';
    var realId = '';
    var realProfesi = '';
    var realJabatan = '';
    var realLembaga = '';
    $element.autocomplete({
      source : function(req,res){
        input = $('#'+($element.prop("id")));
        //alert('#'+($element.prop("id")));
        realId = $('#'+input.parent().parent().siblings().children('.id_narasumber').prop("id"));
        realProfesi = $('#'+input.parent().parent().siblings().children('.profesi').prop("id"));
        realJabatan = $('#'+input.parent().parent().siblings().children('.jabatan').prop("id"));
        realLembaga = $('#'+input.parent().parent().siblings().children('.lembaga').prop("id"));
        //alert(realInput);
        var postData = {
          narasumber : input.val()
        };
        var url = baseUrl + 'narasumber/search';
        $.get(url,postData).then(function(suggestions){
            var tmp = suggestions.map(function(item){
              return {
                label : item.nama,
                value : item.id_narasumber,
                profesi : item.profesi,
                jabatan : item.jabatan,
                lembaga : item.lembaga
              };
            });
            console.log(tmp);
            res(tmp);
          });
        },
        select : function(e,ui){
           e.preventDefault();
           e.target.value = ui.item.label;
           realId.val(ui.item.value).keyup();
           realProfesi.val(ui.item.profesi).keyup();
           realJabatan.val(ui.item.jabatan).keyup();
           realLembaga.val(ui.item.lembaga).keyup();
         },
         focus : function(e,ui){
            e.preventDefault();
            e.target.value = ui.item.label;
            realId.val(ui.item.value).keyup();
            realProfesi.val(ui.item.profesi).keyup();
            realJabatan.val(ui.item.jabatan).keyup();
            realLembaga.val(ui.item.lembaga).keyup();
          },
         change : function(e, ui) {
           e.preventDefault();
           if (ui.item == null) {
             e.target.value = '';
             realId.val('').keyup();
             realProfesi.val('').keyup();
             realJabatan.val('').keyup();
             realLembaga.val('').keyup();
           }
         }
    });
  }

  $(function () {
    var baseUrl = '<?php echo base_url() ?>';
    var input = '';
    var realId = '';
    var realProfesi = '';
    var realJabatan = '';
    var realLembaga = '';
    $('.narasumber').autocomplete({
      source : function(req,res){
        input = $('#'+($(this.element).prop("id")));
        realId = $('#'+input.parent().parent().siblings().children('.id_narasumber').prop("id"));
        realProfesi = $('#'+input.parent().parent().siblings().children('.profesi').prop("id"));
        realJabatan = $('#'+input.parent().parent().siblings().children('.jabatan').prop("id"));
        realLembaga = $('#'+input.parent().parent().siblings().children('.lembaga').prop("id"));
        //alert(realInput);
        var postData = {
          narasumber : input.val()
        };
        var url = baseUrl + 'narasumber/search';
        $.get(url,postData).then(function(suggestions){
            var tmp = suggestions.map(function(item){
              return {
                label : item.nama,
                value : item.id_narasumber,
                profesi : item.profesi,
                jabatan : item.jabatan,
                lembaga : item.lembaga
              };
            });
            console.log(tmp);
            res(tmp);
          });
        },
        select : function(e,ui){
           e.preventDefault();
           e.target.value = ui.item.label;
           realId.val(ui.item.value).keyup();
           realProfesi.val(ui.item.profesi).keyup();
           realJabatan.val(ui.item.jabatan).keyup();
           realLembaga.val(ui.item.lembaga).keyup();
         },
         focus : function(e,ui){
            e.preventDefault();
            e.target.value = ui.item.label;
            realId.val(ui.item.value).keyup();
            realProfesi.val(ui.item.profesi).keyup();
            realJabatan.val(ui.item.jabatan).keyup();
            realLembaga.val(ui.item.lembaga).keyup();
          },
         change : function(e, ui) {
           e.preventDefault();
           if (ui.item == null) {
             //e.target.value = '';
             realId.val('').keyup();
             realProfesi.val('').keyup();
             realJabatan.val('').keyup();
             realLembaga.val('').keyup();
           }
         }
    });
   });

  // $(function () {
  //   var baseUrl = '<?php echo base_url() ?>';
  //
  //   var inputPeserta= $('#narasumber1');
  //   var realInputPeserta = $('#profesi1');
  //
  //   inputPeserta.autocomplete({
  //     source : function(req,res){
  //       var postData = {
  //         narasumber : inputPeserta.val()
  //       };
  //       var url = baseUrl + 'narasumber/search';
  //       $.get(url,postData).then(function(suggestions){
  //           var tmp = suggestions.map(function(item){
  //             return {
  //               label : item.nama,
  //               value : item.id_narasumber
  //             };
  //           });
  //           console.log(tmp);
  //           res(tmp);
  //         });
  //       },
        // select : function(e,ui){
        //    e.preventDefault();
        //    e.target.value = ui.item.label;
        //    realInputPeserta.val(ui.item.value).keyup();
        //  },
        //  focus : function(e,ui){
        //     e.preventDefault();
        //     e.target.value = ui.item.label;
        //     realInputPeserta.val(ui.item.value).keyup();
        //   },
        //  change : function(e, ui) {
        //    e.preventDefault();
        //    if (ui.item == null) {
        //      e.target.value = '';
        //      realInputPeserta.val('').keyup();
        //    }
        //  }
  //   });
  //
  //   //inputPeserta.autocomplete( "option", "appendTo", ".eventInsForm" );
  //  });


  $("#tambah-topik-submit").click(function(){
    var topik = $('#topik').val();
    var id_topik = $('#id_topik').val();
    var tanggal = $('#tanggal-text').val();
    var jammulai = $('#jammulai').val();
    var jamselesai = $('#jamselesai').val();
    var lokasi = $('#lokasi').val();
    var button = '<button type="button" class="btn btn-danger btn-sm hapus ml-2"><i class="fa fa-close mr-1"></i>Hapus</button>';
    var buttonedit = '<button type="button" class="btn btn-success btn-sm edit"><i class="fa fa-edit mr-1"></i>Edit</button>';
    var status = '<span>'+1+'</span>';
    var file = '<span>'+$('#input-pdf-file').prop('files')+'</span>';
    var narasumber ='';


    $('.narasumber').each(function() {
      if($(this).is(":visible")){
        narasumber = narasumber + '<a>'+ $(this).val()+'</a>,<a> ';
        narasumber = narasumber+ $(this).parent().parent().siblings().children('.profesi').val()+'</a>,<a> ';
        narasumber = narasumber+ $(this).parent().parent().siblings().children('.lembaga').val()+'</a>,<a> ';
        narasumber = narasumber+ $(this).parent().parent().siblings().children('.jabatan').val()+'</a><a class="hidden">, '+$(this).parent().parent().siblings().children('.id_narasumber').val()+'</a><a class="hidden">,1</a>';
        narasumber = narasumber+ '<br>';
      }
    });


     $("tbody").append("<tr>"+"<td>"+"<ul>"+"<li class='hidden id_topik'><span class='id'>"+id_topik+"</li>"+"<li><b>Tanggal: </b><span class='t'>"+tanggal+"<li><b>Waktu: </b><span class='w'>"+jammulai+" - "+jamselesai+"</li>"+"<li><b>Lokasi: </b><span class='l'>"+lokasi+"</li>"+"<li><b>Nama topik: </b><span class='n'>"+topik+"</li>"+'<li class="split"><b>Narasumber:</b><br><span class="nr">'+narasumber+"</li>"+"<li class='hidden status'>"+status+"</li>"+"</ul>"+"</td>"+"<td>"+buttonedit+button+'</td>'+"</tr>");
  });

  $("#modal").on("hidden.bs.modal", function () {
    $( "#form input" ).each(function() {
       $(this).val('');
    });
    $("#nara").html('<div class="block_nara"><div class="row ml-1"><div class="form-group col-md-10">'+
      '<label for="narasumber">Narasumber</label>'+
      '<input type="text" class="form-control narasumber" id="narasumber1" data-urutan="1" placeholder="Narasumber">'+
    '</div>'+
    '<div class="col-md-2 pr-0">'+
      '<a class=" hapus-narasumber button btn-danger rounded text-white pl-1 pr-1" data-toggle="tooltip" title="Hapus narasumber"><i class="fa fa-times"></i></a>'+
    '</div>'+'</div>'+
    '<div class="form-group col-md-12">'+
      '<label for="profesi">Profesi</label>'+
      '<input type="text" class="form-control profesi" id="profesi'+i+'" data-urutan="'+i+'" placeholder="Profesi">'+
    '</div>'+
    '<div class="form-group col-md-12">'+
      '<label for="lembaga">Lembaga</label>'+
      '<input type="text" class="form-control lembaga" id="lembaga'+i+'" data-urutan="'+i+'" placeholder="Lembaga">'+
    '</div>'+
    '<div class="form-group col-md-12">'+
      '<label for="jabatan">Jabatan</label>'+
      '<input type="text" class="form-control jabatan" id="jabatan'+i+'" data-urutan="'+i+'" placeholder="Jabatan">'+
      '<input type="text" class="form-control id_narasumber hidden" id="id_narasumber'+i+'" data-urutan="1">'+
    '</div></div>');
    i=1;

  });

    if ($('#inlineCheckbox3').is(':checked')) {
        $('#kapasitas_toggle').show();
    } else {
        $('#kapasitas_toggle').hide();
    }

    if ($('#inlineCheckbox1').is(':checked')) {
        $('#biaya_toggle').show();
    } else {
        $('#biaya_toggle').hide();
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
      format: 'HH:mm'
    });

    $('#mulai').datetimepicker({
      format: 'HH:mm'
    });

    $('#tahun').datetimepicker({
      format: 'YYYY'
    });

    $('#simpan').click(function() {
      sendTableArticles();
    });

    $(document).on('click', '.hapus', function(){
      //alert($(this).closest('tr').find('.status span').text());
      if(($(this).closest('tr').find('.status span').text()==3) || ($(this).closest('tr').find('.status span').text()==2&&$(this).closest('tr').find('.id_topik span').text()!='')){
        //alert("hai");
        $(this).closest('tr').find('.status span').text("4");
        $(this).closest('tr').hide();
      }else{
        //alert("nahloh");
        $(this).closest('tr').remove();
      }
    });

    $(document).on('click', '#tambah-topik-btn', function(){
      $('#edit-topik-submit').hide();
      $('#tambah-topik-submit').show();
      sendTableArticles();
    });

    $(document).on('click', '.hapus-narasumber', function(){
      //alert($(this).parent().siblings().children('.narasumber').val());
      $(this).parent().siblings().children('.narasumber').hide();
      $(this).closest('.block_nara').hide();
      // $(this).closest('.jabatan').hide();
      // $(this).closest('.lembaga').hide();
    });

    $(document).on('click', '.edit', function(){
      //$(this).closest('tr').remove();
      //alert($(this).parent().siblings('td').children().children('li').children('.aaa').text());
      $('#edit-topik-submit').show();
      $('#tambah-topik-submit').hide();
      //$(this).closest('tr').remove();
      var $this = $(this);
      var jam = $(this).parent().siblings('td').children().children('li').children('.w').text();
      var nara = $(this).parent().siblings('td').children().children('li').children('.nr').html();
      var jam_arr = jam.split(' - ');
      var narasumber_arr = nara.split('<br>');
      var length = narasumber_arr.length-1;
      var i = 2;
      if(length>1){
        while(i<=length){
          $("#nara").append('<div class="block_nara"><div class="row ml-1"><div class="form-group col-md-10">'+
            '<label for="narasumber">Narasumber</label>'+
            '<input type="text" class="form-control narasumber" id="narasumber'+i+'" data-urutan="1" placeholder="Narasumber">'+
          '</div>'+
          '<div class="col-md-2 pr-0">'+
            '<a class=" hapus-narasumber button btn-danger rounded text-white pl-1 pr-1" data-toggle="tooltip" title="Hapus narasumber"><i class="fa fa-times"></i></a>'+
          '</div>'+'</div>'+
          '<div class="form-group col-md-12">'+
            '<label for="profesi">Profesi</label>'+
            '<input type="text" class="form-control profesi" id="profesi'+i+'" data-urutan="'+i+'" placeholder="Profesi">'+
          '</div>'+
          '<div class="form-group col-md-12">'+
            '<label for="lembaga">Lembaga</label>'+
            '<input type="text" class="form-control lembaga" id="lembaga'+i+'" data-urutan="'+i+'" placeholder="Lembaga">'+
          '</div>'+
          '<div class="form-group col-md-12">'+
            '<label for="jabatan">Jabatan</label>'+
            '<input type="text" class="form-control jabatan" id="jabatan'+i+'" data-urutan="'+i+'" placeholder="Jabatan">'+
            '<input type="text" class="form-control id_narasumber hidden" id="id_narasumber'+i+'" data-urutan="1">'+
          '</div></div>');
          $(".narasumber").each(function(index) {
          enableAutoComplete($(this));
        });
          i = i+1;
        }
      }
      for(var j=0; j<length;j++){
        //console.log(narasumber_arr);
        var narasumber = narasumber_arr[j].split(',');
        console.log(narasumber[4]);
        $('#modal #narasumber'+(j+1)).val($.trim(narasumber[0]).substr(3,narasumber[0].length-7));
        if(narasumber[1]!=' ') $('#modal #profesi'+(j+1)).val($.trim(narasumber[1]).substr(4,narasumber[1].length-8));
        if(narasumber[2]!=' ') $('#modal #lembaga'+(j+1)).val($.trim(narasumber[2]).substr(4,narasumber[2].length-8));
        if(narasumber[3]!=' ') $('#modal #jabatan'+(j+1)).val($.trim(narasumber[3]).substr(4,narasumber[3].length-26));
        if(narasumber[4]!=' ') $('#modal #id_narasumber'+(j+1)).val($.trim(narasumber[4]).substr(0,narasumber[4].length-23));
      }

      $('#modal').modal('show');
      $('#modal #tanggal-text').val($(this).parent().siblings('td').children().children('li').children('.t').text());
      $('#modal #topik').val($(this).parent().siblings('td').children().children('li').children('.n').text());
      $('#modal #lokasi').val($(this).parent().siblings('td').children().children('li').children('.l').text());
      $('#modal #jammulai').val(jam_arr[0]);
      $('#modal #jamselesai').val(jam_arr[1]);
      //alert($(this).parent().siblings('td').children().children('li').children('.id').text());
      $('#modal #id_topik').val($.trim($(this).parent().siblings('td').children().children('li').children('.id').text()));

      $("#edit-topik-submit").unbind().click(function(){
        //alert("hai");
         var topik = $('#topik').val();
         var id_topik = $('#id_topik').val();
         var tanggal = $('#tanggal-text').val();
         var jammulai = $('#jammulai').val();
         var jamselesai = $('#jamselesai').val();
         var lokasi = $('#lokasi').val();
         var button = '<button type="button" class="btn btn-danger btn-sm hapus ml-2"><i class="fa fa-close mr-1"></i>Hapus</button>';
         var buttonedit = '<button type="button" class="btn btn-success btn-sm edit"><i class="fa fa-edit mr-1"></i>Edit</button>';
         var status = '<span>'+2+'</span>';
         var file = '<span>'+$('#input-pdf-file').prop('files')+'</span>';
         var narasumber ='';

         $('.narasumber').each(function() {
           //alert($(this).parent().parent().siblings().children('.id_narasumber').val());
           if($(this).is(":visible")){
             //alert($(this).val());
             narasumber = narasumber+ '<a>'+ $(this).val()+'</a>,<a> ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.profesi').val()+'</a>,<a> ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.lembaga').val()+'</a>,<a> ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.jabatan').val()+'</a><a class="hidden">, ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.id_narasumber').val()+'</a>';
             narasumber = narasumber+ '<a class="hidden">,2</a>';
             narasumber = narasumber+ '<br>';
           }else{
             narasumber = narasumber+ '<div class="hidden"><a>'+$(this).val()+'</a>,<a> ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.profesi').val()+'</a>,<a> ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.lembaga').val()+'</a>,<a> ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.jabatan').val()+'</a><a class="hidden">, ';
             narasumber = narasumber+ $(this).parent().parent().siblings().children('.id_narasumber').val()+'</a>';
             narasumber = narasumber+ '<a class="hidden">,4</a></div>';
             narasumber = narasumber+ '<br>';
           }
         });

         $this.closest('tr').remove();
        $("tbody").append("<tr>"+"<td>"+"<ul>"+"<li class='hidden id_topik'><span class='id'>"+id_topik+"</li>"+"<li><b>Tanggal: </b><span class='t'>"+tanggal+"<li><b>Waktu: </b><span class='w'>"+jammulai+" - "+jamselesai+"</li>"+"<li><b>Lokasi: </b><span class='l'>"+lokasi+"</li>"+"<li><b>Nama topik: </b><span class='n'>"+topik+"</li>"+'<li class="split"><b>Narasumber:</b><br><span class="nr">'+narasumber+"</li>"+"<li class='hidden status'>"+status+"</li>"+"</ul>"+"</td>"+"<td>"+buttonedit+button+'</td>'+"</tr>");
        //$('#form').trigger("reset");
      });
    });

    $('#input-biaya').number(true, 2, ',', '.');


    $('#input-biaya').on('keyup',function(e){
      $('#real-input-biaya').val($('#input-biaya').val()).keyup();
    });

    $('#input-biaya-pelajar').number(true, 2, ',', '.');

    $('#input-biaya-pelajar').on('keyup',function(e){
      $('#real-input-biaya-pelajar').val($('#input-biaya-pelajar').val()).keyup();
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
                    var form = $('#form-umum');

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
        'id_topik',
        'tanggal',
        'jam',
        'lokasi',
        'topik',
        'narasumber',
        'status',
        'ids'
    ];

    var tableObject = $('#topik_tabel tbody tr td ul').map(function (i) {
        var row = {};
        $(this).find('li').each(function (i) {
          if($(this).hasClass("split")){
            var data = $(this).children('span').html().split('<br>');
            console.log(data);
            var rowName = columns[i];
            row[rowName] = data;
          }else{
            var rowName = columns[i];
            row[rowName] = $(this).children('span').text();
          }

        });

        return row;
    }).get();

    console.log(tableObject);
    $('#str').val(JSON.stringify(tableObject));
}


</script>
