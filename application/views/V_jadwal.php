<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5">
  <div class="text-left ml-3"><h5>Jadwal Kelas</h5></div>
  <div class="text-left ml-3"><h5><?php echo $ec->jenis_ec. " : " . $ec->tema_ec; ?></h5></div>
  <table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Lokasi</th>
        <th scope="col">Jam</th>
        <th scope="col">Topik</th>
        <th scope="col">Narasumber</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo date($this->config->item('view_date_format'),strtotime($row->tanggal));?></td>
        <td><?php echo $row->lokasi;?></td>
        <td><?php echo $row->jam_mulai . " - " . $row->jam_selesai;?></td>
        <td><?php echo $row->nama_topik;?></td>
        <td><?php echo $row->nama;?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>
