<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">

<?php if(isset($topik)): ?>
  <div class="text-left ml-3"><h5><?php echo 'Daftar Peserta ' . $topik->nama_topik ?></h5></div>
  <div class="text-left ml-3"><h6><?php echo $ec->jenis_ec. " : " . $ec->tema_ec; ?></h6></div>
<?php else :?>
  <div class="text-left ml-3"><h5><?php echo 'Daftar Peserta ' .$ec->jenis_ec. " : " . $ec->tema_ec; ?></h5></div>
<?php endif; ?>
  <table class="table table-hover table-striped table-bordered absensi mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text-center">Nama Peserta</th>
        <th scope="col" class="text-center">Foto</th>
        <th scope="col" class="text-center">Alamat</th>
        <th scope="col" class="text-center">Pekerjaan</th>
        <th scope="col" class="text-center">Lembaga</th>
        <th scope="col" class="text-center">No. HP</th>
        <th scope="col" class="text-center">Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo $row->nama;?></td>
        <td><img class="w-50" src="<?php echo base_url(). $row->foto;?>"></td>
        <td><?php echo $row->alamat;?></td>
        <td><?php echo $row->pekerjaan;?></td>
        <td><?php echo $row->lembaga;?></td>
        <td><?php echo $row->no_hp;?></td>
        <td><?php echo $row->email;?></td>
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
