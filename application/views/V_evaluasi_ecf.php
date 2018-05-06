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
  <form method="post" action="<?php echo base_url().'kelas-saya/isi-evaluasi/'.$ec->id_ec ?>">
  <fieldset class="col-md-12 col-lg-12">
    <div class="form-group col-12">
      <label for="komentar-ecf">Komentar tentang Extension Course Filsafat</label>
      <textarea class="form-control" rows="5" name="komentar-ecf"></textarea>
    </div>
    <div class="form-group col-12">
      <label for="komentar-tema">Komentar tentang tema <?php echo $ec->tema_ec?></label>
      <textarea class="form-control" rows="5" name="komentar-tema"></textarea>
    </div>
    <div class="form-group col-12">
      <label for="saran">Usul atau saran</label>
      <textarea class="form-control" rows="5" name="saran"></textarea>
    </div>
    <div class="text-right mt-5">
      <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
  </fieldset>
</form>
</div>
