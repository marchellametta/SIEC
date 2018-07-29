<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url() ?> "><i class="fa fa-home mr-1"></i>Beranda</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url() .'kelas-saya/'?>">Kelas Saya</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url()."kelas-saya/detail/". $ec->id_ec ?>">Daftar Kelas Saya</a></li>
      <li class="breadcrumb-item active" aria-current="page">Isi Evaluasi</li>

    </ol>
  </nav>
  <div class="text-left ml-3"><h5>Lembar Evaluasi <?php echo $ec->jenis_ec. " : " . $ec->tema_ec ; ?></h5></div>
  <?php if(isset($topik)):?>
    <div class="text-left ml-3"><h5>Topik : <?php echo $topik->nama_topik; ?></h5></div>
    <form method="post" action="<?php echo base_url().'kelas-saya/isi-evaluasi/topik/'.$topik->id_topik ?>">
  <?php else : ?>
    <form method="post" action="<?php echo base_url().'kelas-saya/isi-evaluasi/'.$ec->id_ec ?>">
  <?php endif; ?>
  <fieldset class="col-md-12 col-lg-12">
    <table class="table table-hover table-striped table-bordered w-100">
      <thead class="thead-dark">
        <tr>
          <th scope="col" colspan="2">Skala penilaian dari yang <b>terburuk (1)</b> hingga <b>terbaik (5)</b></th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1 ?>
      <?php foreach ($data as $row) :?>
      <tr>
        <td><?php echo $row ?></td>
        <td>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="soal<?php echo $i?>" value="1"> 1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="soal<?php echo $i?>" value="2"> 2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="soal<?php echo $i?>" value="3"> 3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="soal<?php echo $i?>" value="4"> 4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="soal<?php echo $i?>" value="5"> 5
            </label>
          </div>
        </td>
      </tr>
      <?php $i++ ?>
      <?php endforeach ?>
      </tbody>
    </table>
    <div class="form-group col-12">
      <label for="saran">Usul atau saran</label>
      <textarea class="form-control" rows="5" name="saran"></textarea>
    </div>
    <div class="text-right mt-5">
      <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
  </fieldset>
</div>
