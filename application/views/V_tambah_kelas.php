<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <form method="post" action="<?php echo base_url('tambahkelas') ?>" enctype="multipart/form-data">
    <input type="hidden" id="str" name="topik" value="" />
    <fieldset>
    <legend>Data Umum</legend>
     <div class="form-group col-md-6">
       <label for="pendidikan">Jenis EC</label>
       <select class="form-control" name="jenis-ec">
         <?php foreach ($jenis_ec as $row): ?>
         <option value="<?php echo $row->id_jenis_ec ?>"><?php echo $row->jenis_ec ?></option>
       <?php endforeach; ?>
       </select>
     </div>
     <div class="row ml-1">
       <div class="form-group col-md-3">
         <label for="pendidikan">Semester Pelaksanaan</label>
         <select class="form-control" name="semester">
           <option value="1">Ganjil</option>
           <option value="2">Genap</option>
         </select>
       </div>
       <div class="form-group col-md-3">
         <label for="tahun">Tahun Pelaksanaan</label>
         <input type="number" class="form-control" name="tahun" placeholder="Tahun">
       </div>
     </div>
      <div class="form-group col-md-6">
        <label for="tema">Tema Umum</label>
        <input type="text" class="form-control" name="tema" placeholder="Tema Umum">
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
         <textarea class="form-control" rows="5" name="deskripsi"></textarea>
      </div>
      <div class="form-group col-md-3">
        <label for="biaya">Biaya</label>
         <input type="text" class="form-control" name="biaya" placeholder="Biaya">
      </div>
      <div class="form-group hidden col-md-3" id="biaya_toggle">
        <label for="biaya-topik">Biaya per Topik</label>
        <input type="text" class="form-control" name="biaya-topik" placeholder="Biaya per Topik">
      </div>
      <div class="form-group hidden col-md-3" id="kapasitas_toggle">
        <label for="kapasitas">Kapasitas Peserta</label>
        <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas">
      </div>
      <div class="form-group col-md-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="peserta-lepas" id="inlineCheckbox1" value="2">
          <label class="form-check-label" for="inlineCheckbox1">Peserta Lepas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="evaluasi-mingguan" id="inlineCheckbox2" value="2">
          <label class="form-check-label" for="inlineCheckbox2">Evaluasi Mingguan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="sistem-kuota" id="inlineCheckbox3" value="1">
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
           <th class="w-10">  </th>
           </tr>
          </thead>
          <tbody id="table-body-glr">
          </tbody>
        </table>
      </div>
      <div class="text-right">
        <input type="submit" id="simpan" value="Simpan" class="btn btn-success">
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
       var tanggal = $('#tanggal-text').val();
       var jammulai = $('#jammulai').val();
       var jamselesai = $('#jamselesai').val();
       var lokasi = $('#lokasi').val();


        $("tbody").append("<tr>"+"<td>"+tanggal+"</td>"+"<td>"+jammulai+" - "+jamselesai+"</td>"+"<td>"+lokasi+"</td>"+"<td>"+topik+"</td>"+"<td>"+narasumber+"</td>"+"</tr>");
        $('#form').trigger("reset");
    });

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

    $('#simpan').click(function() {
      sendTableArticles();
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

});

function sendTableArticles() {
    alert("hai");
    var columns = [
        'tanggal',
        'jam',
        'lokasi',
        'topik',
        'narasumber'
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
