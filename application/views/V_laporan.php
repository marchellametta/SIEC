<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <div class="text-left ml-3"><h5>Laporan <?php echo $ec->jenis_ec. " : " . $ec->tema_ec ; ?></h5></div>
  <form method="post" action="<?php echo base_url().'laporan/unduh/'.$ec->id_ec ?>">
    <div class="form-group col-md-3">
      <select class="form-control" name="jenis-laporan" id="jenis-laporan">
        <option value="jumlah_kehadiran">Laporan Jumlah Kehadiran Peserta</option>
        <option value="pekerjaan">Laporan Statistik Pekerjaan Peserta</option>
        <option value="kehadiran">Laporan Persentase Kehadiran Peserta</option>
      </select>
    </div>
    <table class="table table-hover table-striped table-bordered ml-3" id="jumlah_kehadiran">
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
  <table class="table table-hover table-striped table-bordered ml-3 hidden" id="pekerjaan">
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
        <td><?php echo $row->pekerjaan ?></td>
        <td><?php echo ($row->jumlah/$jumlah_peserta->jumlah_peserta)*100 ?>%</td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <table class="table table-hover table-striped table-bordered ml-3 hidden" id="kehadiran">
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
  <div class="text-right">
    <input type="submit" id="simpan" value="Unduh Laporan" class="btn btn-primary">
  </div>
</form>

</div>
<script>
$('#jenis-laporan').change(function() {
        var x = $(this).val();
        // and update the hidden input's value
        //alert('#'+x);
        $('.table').hide();
        $('#'+x).show();
    });
</script>
