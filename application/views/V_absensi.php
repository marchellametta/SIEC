<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url() ?> "><i class="fa fa-home mr-1"></i>Beranda</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url() ?>kelas">Daftar Kelas</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url()."absensi/daftar-topik/". $ec->id_ec ?>">Daftar Topik</a></li>
      <li class="breadcrumb-item active" aria-current="page">Daftar Kehadiran</li>

    </ol>
  </nav>

<div class="text-left ml-3"><h5><?php echo 'Daftar Kehadiran Kelas ' . $topik->nama_topik ?></h5></div>
  <div class="text-left ml-3"><h6><?php echo $ec->jenis_ec. " : " . $ec->tema_ec; ?></h6></div>
  <div class="text-left ml-3"><h6><?php echo $topik->tanggal . ", " . $topik->jam_mulai . " - ". $topik->jam_selesai ?></h6></div>
  <form method="post" action="<?php echo base_url() ?>absensi/<?php echo $topik->id_topik ?>">
  <table class="table table-hover table-striped table-bordered absensi mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text-center">Nama Peserta</th>
        <th scope="col" class="text-center">Kehadiran</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo $row->nama;?></td>
        <td class="text-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php echo $row->id_peserta?>" name= "hadir[]">
          </div>
        </td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <div class="text-right">
    <input type="submit" value="Simpan" class="btn btn-success">
    <input type="submit" value="Batal" class="btn btn-danger">
  </div>
</form>
</div>
