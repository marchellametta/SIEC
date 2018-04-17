<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_pembayaran']) ?>

<div class="text-left ml-3"><h5><?php echo 'Daftar Pembayaran ' . $ec->jenis_ec. " : " . $ec->tema_ec; ?></h5></div>
<ul class="nav nav-tabs border-dark" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active border-dark bg-dark" id="tetap-tab" data-toggle="tab" href="#tetap" role="tab" aria-controls="tetap" aria-selected="true">Peserta Tetap</a>
  </li>
  <li class="nav-item">
    <a class="nav-link border-dark bg-dark" id="lepas-tab" data-toggle="tab" href="#lepas" role="tab" aria-controls="lepas" aria-selected="false">Peserta Lepas</a>
  </li>
</ul>

<div class="tab-content">
  <div id="tetap" class="tab-pane fade show active" role="tabpanel" aria-labelledby="tetap-tab">
    <form method="post" action="<?php echo base_url() ?>kelas/pembayaran-tetap/<?php echo $ec->id_ec ?>">
    <table class="table table-hover table-striped table-bordered absensi mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="text-center w-45">Nama Peserta</th>
          <th scope="col" class="text-center w-10">Total Biaya</th>
          <th scope="col" class="text-center w-10">Telah Bayar</th>
          <th scope="col" class="text-center w-5">Status Pembayaran</th>
          <th scope="col" class="text-center w-5">Potongan Biaya</th>
          <th scope="col" class="text-center w-5">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tetap as $row): ?>
        <tr>
          <td><?php echo $row->nama;?></td>
          <td><?php echo "Rp. ".number_format($row->tagihan).",00 / Rp. ".number_format($row->tagihan_pelajar).",00";?><small> (khusus pelajar/mahsiswa)</small></td>
          <td>
            <input type="text" class="form-control hidden" name="telah-bayar[<?php echo $row->id_user ?>]" placeholder="Jumlah Bayar">
            <a><?php echo "Rp. ".number_format($row->telah_bayar).",00"; ?></a>
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input lunas" type="checkbox" value="<?php echo $row->id_user?>" name= "bayar[]" <?php if($row->status_lunas=='1') echo "checked"?>>
              <label class="form-check-label">Lunas</label>
            </div>
          </td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input pelajar" type="checkbox" value="<?php echo $row->id_user?>" name= "potongan[]" <?php if($row->status_pelajar=='1') echo "checked"?>>
              <label class="form-check-label">Pelajar/Mahasiswa</label>
            </div>
          </td>
          <td class="text-center">
            <button type="button" class="btn btn-primary bayar">Bayar sebagian</button>
            <button type="button" class="btn btn-primary lunas">Tandai Lunas</button>
          </td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
    <div class="text-right">
      <input type="submit" value="Simpan" class="btn btn-success">
      <a href="<?php echo base_url().'kelas/aktif'?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button></a>
    </div>
  </form>
  </div>
  <div id="lepas" class="tab-pane fade">
    <form method="post" action="<?php echo base_url() ?>kelas/pembayaran-lepas/<?php echo $ec->id_ec ?>">
    <table class="table table-hover table-striped table-bordered absensi mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="text-center w-30">Nama Peserta</th>
          <th scope="col" class="text-center w-30">Nama Topik</th>
          <th scope="col" class="text-center w-10">Total Biaya</th>
          <th scope="col" class="text-center w-10">Status Pembayaran</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lepas as $row): ?>
        <tr>
          <td><?php echo $row->nama;?></td>
          <td><?php echo $row->nama_topik;?></td>
          <td><?php echo "Rp. ".number_format($row->tagihan).",00";?></td>
          <td class="text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name= "bayar[<?php echo $row->id_topik?>][<?php echo $row->id_user?>]" <?php if($row->status_lunas==1) echo "checked"?>>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
    <div class="text-right">
      <input type="submit" value="Simpan" class="btn btn-success">
      <a href="<?php echo base_url().'kelas/aktif'?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button></a>
    </div>
  </form>
  </div>
</div>
</div>

<script>
$(document).ready(function(){
   $('.bayar').click(function(){
     $(this).parent().siblings().children('input').show();
     $(this).parent().siblings().children('a').hide();
     $(this).parent().siblings().children().children('.lunas').prop('checked',false);

   })

   $('.lunas').click(function(){
     $(this).parent().siblings().children('input').hide();
     $(this).parent().siblings().children('a').show();
     $(this).parent().siblings().children().children('.lunas').prop('checked',true);

   })
});
</script>
