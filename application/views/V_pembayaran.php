<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_pembayaran']) ?>

<div class="text-left ml-3"><h5><?php echo 'Daftar Pembayaran ' . $ec->jenis_ec. " : " . $ec->tema_ec; ?></h5></div>
  <form method="post" action="<?php echo base_url() ?>kelas/pembayaran/<?php echo $ec->id_ec ?>">
  <table class="table table-hover table-striped table-bordered absensi mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text-center">Nama Peserta</th>
        <th scope="col" class="text-center">Status Pembayaran</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo $row->nama;?></td>
        <td class="text-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php echo $row->id_user?>" name= "bayar[]">
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
