<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home mr-1"></i>Beranda</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>informasi">Informasi</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>informasi/detail/<?php echo $ec->id_ec ?>">Detail</a></li>
    <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
  </ol>
</nav>
  <div class="text-left ml-3"><h5>Jadwal Kelas <?php echo $ec->jenis_ec. " : " . $ec->tema_ec ; ?></h5></div>
  <?php if(empty($topik_arr)):?>
  <div class="alert alert-info mb-0 mt-5" role="alert">
    <i class="fa fa-info-circle mr-2"></i>Jadwal belum tersedia
  </div>
  <?php else : ?>
  <table class="table table-hover table-striped table-bordered d-none d-sm-block">
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
  <div class="d-sm-none mt-4">
    <?php foreach ($data as $row): ?>
    <div class="card mt-2">
      <div class="card-body">
        <p class="card-title m-0"><?php echo "<b>Tanggal</b> : ".date($this->config->item('view_date_format'),strtotime($row->tanggal));?></p>
        <p class="card-text m-0"><?php echo "<b>Lokasi</b> : ". $row->lokasi;?></p>
        <p class="card-text m-0"><?php echo "<b>Jam</b> : ".$row->jam_mulai . " - " . $row->jam_selesai;?></p>
        <p class="card-text m-0"><?php echo "<b>Topik</b> : ".$row->nama_topik;?></p>
        <p class="card-text m-0"><?php echo "<b>Narasumber</b> : ".$row->nama;?></p>
      </div>
    </div>
    <?php endforeach ?>
  <?php endif; ?>
  </div>
</div>
