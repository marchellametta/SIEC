<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_laporan']) ?>
  <div class="text-left ml-3"><h5>Laporan <?php echo $ec->jenis_ec. " : " . $ec->tema_ec ; ?></h5></div>
  <form method="post" action="<?php echo base_url().'kelas/laporan/unduh/'.$ec->id_ec ?>">
    <div class="form-group col-md-3">
      <select class="form-control" name="jenis-laporan" id="jenis-laporan">
        <option value="jumlah_kehadiran">Laporan Jumlah Kehadiran Peserta</option>
        <option value="pekerjaan">Laporan Statistik Pekerjaan Peserta</option>
        <option value="kehadiran">Laporan Persentase Kehadiran Peserta</option>
        <option value="evaluasi-tema">Hasil Evaluasi Tema</option>
        <option value="evaluasi-topik">Hasil Evaluasi Topik</option>
      </select>
    </div>
    <table class="table table-hover table-striped table-bordered ml-3 content" id="jumlah_kehadiran">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Topik</th>
        <th scope="col">Jumlah Peserta Terdaftar</th>
        <th scope="col">Jumlah Peserta Hadir</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($topik_arr as $row): ?>
      <tr>
        <th scope="row"><?php echo $row->num ?></th>
        <td><?php echo $row->nama_topik ?></td>
        <td><?php echo $row->jumlah_peserta ?></td>
        <td><?php echo $row->jumlah_hadir ?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <table class="table table-hover table-striped table-bordered ml-3 hidden content" id="pekerjaan">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Pekerjaan</th>
        <th scope="col">%</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pekerjaan as $row): ?>
      <tr>
        <th scope="row">1</th>
        <td><?php echo $row->nama_pekerjaan ?></td>
        <td><?php echo ($row->jumlah/$jumlah_peserta->jumlah_peserta)*100 ?>%</td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <table class="table table-hover table-striped table-bordered ml-3 hidden content" id="kehadiran">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Peserta</th>
        <th scope="col">%</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($kehadiran as $row): ?>
      <tr>
        <th scope="row">1</th>
        <td><?php echo $row->nama ?></td>
        <td><?php echo $row->persentase ?>%</td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <div id="evaluasi-tema" class="content hidden">
  <table class="table table-hover table-striped table-bordered ml-3">
    <thead class="thead-dark">
      <?php if($ec->jenis_ec=="Extension Course Filsafat"):?>
        <tr>
          <th scope="col">Soal1</th>
          <th scope="col">Soal2</th>
          <th scope="col">Soal3</th>
        </tr>
      <?php else: ?>
      <tr>
        <th scope="col">Soal</th>
        <th scope="col">Nilai 5</th>
        <th scope="col">Nilai 4</th>
        <th scope="col">Nilai 3</th>
        <th scope="col">Nilai 2</th>
        <th scope="col">Nilai 1</th>
      </tr>
    <?php endif ?>

    </thead>
    <tbody>
      <?php if($ec->jenis_ec=="Extension Course Filsafat"):?>
        <?php foreach ($evaluasi_tema as $row): ?>
        <tr>
          <td><?php echo $row->soal1 ?></td>
          <td><?php echo $row->soal2 ?></td>
          <td><?php echo $row->soal3 ?></td>
        </tr>
      <?php endforeach ?>
      <?php else: ?>
      <?php foreach ($evaluasi_tema as $row): ?>
      <tr>
        <td><?php echo $row->soal1 ?></td>
        <td><?php echo $row->nilai_5 ?></td>
        <td><?php echo $row->nilai_4 ?></td>
        <td><?php echo $row->nilai_3 ?></td>
        <td><?php echo $row->nilai_2 ?></td>
        <td><?php echo $row->nilai_1 ?></td>
      </tr>
    <?php endforeach ?>
  <?php endif ?>

    </tbody>
  </table>
  <?php if($ec->jenis_ec!="Extension Course Filsafat"):?>
  <table class="table table-hover table-striped table-bordered ml-3 mt-2">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Saran</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($saran_tema as $row): ?>
      <tr>
        <td><?php echo $row->saran ?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
<?php endif; ?>
</div>
<div id="evaluasi-topik" class="content hidden">
  <div class="form-group col-md-3">
    <select class="form-control" name="id-topik" id="id_topik">
      <option selected value>Semua Topik</option>
      <?php foreach ($topik_arr as $temp): ?>
        <option value="<?php echo $temp->id_topik?>"><?php echo $temp->nama_topik ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <?php if(!empty($evaluasi_topik)): ?>
    <?php foreach ($topik_arr as $row): ?>
      <table class="topik table table-hover table-striped table-bordered ml-3" id="hasil<?php echo $row->id_topik ?>">
        <thead class="thead-dark">
          <?php if($ec->jenis_ec=="Extension Course Filsafat"):?>
            <tr>
              <th scope="col">Soal1</th>
              <th scope="col">Soal2</th>
              <th scope="col">Soal3</th>
            </tr>
          <?php else: ?>
          <tr>
            <th scope="col">Soal</th>
            <th scope="col">Nilai 5</th>
            <th scope="col">Nilai 4</th>
            <th scope="col">Nilai 3</th>
            <th scope="col">Nilai 2</th>
            <th scope="col">Nilai 1</th>
          </tr>
        <?php endif ?>

        </thead>
        <tbody>
          <?php if($ec->jenis_ec=="Extension Course Filsafat"):?>
            <?php foreach ($evaluasi_topik[$row->id_topik] as $temp): ?>
            <tr>
              <td><?php echo $temp->soal1 ?></td>
              <td><?php echo $temp->soal2 ?></td>
              <td><?php echo $temp->soal3 ?></td>
            </tr>
            <?php endforeach ?>
          <?php else: ?>
            <?php foreach ($evaluasi_topik[$row->id_topik] as $temp): ?>
            <tr>
              <td><?php echo $temp->soal1 ?></td>
              <td><?php echo $temp->nilai_5 ?></td>
              <td><?php echo $temp->nilai_4 ?></td>
              <td><?php echo $temp->nilai_3 ?></td>
              <td><?php echo $temp->nilai_2 ?></td>
              <td><?php echo $temp->nilai_1 ?></td>
            </tr>
          <?php endforeach ?>
        <?php endif ?>

        </tbody>
      </table>
      <?php if($ec->jenis_ec!="Extension Course Filsafat"):?>
      <table class="topik table table-hover table-striped table-bordered ml-3 mt-2" id="saran<?php echo $row->id_topik ?>">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Saran</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($saran_topik[$row->id_topik] as $temp): ?>
          <tr>
            <td><?php echo $temp->saran ?></td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>

</div>
<div class="row">
  <div class="col-xs-6">
    <a href="<?php echo base_url() . 'kelas/'.$link ?>" id="btn-kembali" class="btn btn-secondary"><span class="fa fa-chevron-left mr-2"></span>Kembali</a>
  </div>
  <div class="col-xs-6 ml-auto">
    <input type="submit" id="simpan" value="Unduh Laporan" class="btn btn-primary">
  </div>
</div>
</form>
<div class="container col-md-6 hidden">
  <div id="chartContainer" style="position: relative; left: 50px; border: 2px solid #73AD21; height: 360px; width: 90%;"></div>
</div>


</div>
<script>

$('#jenis-laporan').change(function() {
        var x = $(this).val();
        // and update the hidden input's value
        //alert('#'+x);
        $('.content').hide();
        $('#'+x).show();
    });

$('#id_topik').change(function() {
    var x = $(this).val();
    //alert(x);
    if(x==""){
      $('.topik').show();
    }else{
      // and update the hidden input's value
      $('.topik').hide();
      //alert('#'+x);
      $('#hasil'+x).show();
      $('#saran'+x).show();
    }

});
</script>
