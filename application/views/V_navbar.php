<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="fixed-top">
  <div class="d-flex flex-row-reverse bg-black">
    <?php if($this->session->userdata('id_user')): ?>
    <div class="dropdown">
      <button class="btn btn-sm dropdown-toggle bg-black text-white" type="button" id="role" data-toggle="dropdown" data-disabled="true" aria-haspopup="true" aria-expanded="false">
        Anda masuk sebagai <b id="role-text"><?php echo $this->session->userdata('current_roles')->role_name ?></b>
      </button>
      <div class="dropdown-menu dropdown-menu-right bg-black" aria-labelledby="role">
        <?php foreach ($this->session->userdata('roles') as $row) :?>
          <a class="dropdown-item text-white" href="<?php echo base_url()."change-role/".$row->role_id?>"><?php echo $row->role_name?></a>
          <div class="dropdown-divider"></div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
    <button class="btn btn-sm bg-black text-white" type="button">
      <i class="fa fa-sign-in mr-1"></i>Login
    </button>
  <?php endif; ?>
    <div class="dropdown hidden" id="peserta">
    <button class="btn btn-sm dropdown-toggle bg-black text-white" type="button" id="menu" data-toggle="dropdown" data-disabled="true" aria-haspopup="true" aria-expanded="false">
      Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b>
    </button>
    <div class="dropdown-menu bg-black" aria-labelledby="menu">
      <a href="<?php echo base_url()."kelas-saya"?>"><small class="dropdown-item text-white"><i class="fa fa-list-alt text-white mr-1"></i>Kelas Saya</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."profil/".$this->session->userdata('id_user')?>"><small class="dropdown-item text-white"><i class="fa fa-user text-white mr-1"></i>Profil Saya</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."logout"?>"><small class="dropdown-item text-white"><i class="fa fa-sign-out mr-1"></i>Log Out</small></a>
    </div>
    </div>
    <div class="dropdown hidden" id="panitia">
    <button class="btn btn-sm dropdown-toggle bg-black text-white" type="button" id="menu" data-toggle="dropdown" data-disabled="true" aria-haspopup="true" aria-expanded="false">
      Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b>
    </button>
    <div class="dropdown-menu bg-black" aria-labelledby="menu">
      <a href="<?php echo base_url()."kelas/aktif"?>"><small class="dropdown-item text-white"><i class="fa fa-list-alt text-white mr-1"></i>Daftar Kelas</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."profil/".$this->session->userdata('id_user')?>"><small class="dropdown-item text-white"><i class="fa fa-user text-white mr-1"></i>Profil Saya</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."logout"?>"><small class="dropdown-item text-white" href="<?php echo base_url()."logout"?>"><i class="fa fa-sign-out mr-1"></i>Log Out</small></a>
    </div>
    </div>
    <div class="dropdown hidden" id="admin">
    <button class="btn btn-sm dropdown-toggle bg-black text-white" type="button" id="menu" data-toggle="dropdown" data-disabled="true" aria-haspopup="true" aria-expanded="false">
      Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b>
    </button>
    <div class="dropdown-menu bg-black" aria-labelledby="menu">
      <a href="<?php echo base_url()."kelola-beranda"?>"><small class="dropdown-item text-white"><i class="fa fa-list-alt text-white mr-1"></i>Kelola Beranda</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."acl"?>"><small class="dropdown-item text-white"><i class="fa fa-user text-white mr-1"></i>Pengaturan Pengguna</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."pendaftaran/panitia"?>"><small class="dropdown-item text-white"><i class="fa fa-user text-white mr-1"></i>Pendaftaran Panitia</small></a>
      <div class="dropdown-divider"></div>
      <a href="<?php echo base_url()."logout"?>"><small class="dropdown-item text-white" href="<?php echo base_url()."logout"?>"><i class="fa fa-sign-out mr-1"></i>Log Out</small></a>
    </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand border-right mw-25" href="<?php echo base_url(); ?>"><img class="img-responsive w-100" src="<?php echo base_url();?>images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)==''){echo 'active';}?> nav-link" href="<?php echo base_url(); ?>">BERANDA</a>
        </li>
        <li class="nav-item dropdown">
         <a class="<?php if($this->uri->segment(1)=='informasi' ){echo 'active';}?> nav-link dropdown-toggle" href="#" id="informasiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           INFORMASI
         </a>
         <div class="dropdown-menu bg-dark" aria-labelledby="informasiDropdown">
           <a class="dropdown-item text-white" href="<?php echo base_url();?>informasi/aktif">Kelas yang Sedang Berjalan</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item text-white" href="<?php echo base_url(); ?>informasi/riwayat">Riwayat Kelas</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item text-white" href="<?php echo base_url(); ?>informasi/mendatang">Kelas Mendatang</a>
         </div>
       </li>
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)=='pendaftaran'){echo 'active';}?> nav-link" href="<?php echo base_url(); ?>pendaftaran">PENDAFTARAN</a>
        </li>
        <li class="nav-item dropdown mr-2">
         <a class="<?php if($this->uri->segment(1)=='lokasi' || $this->uri->segment(1)=='visimisi' ){echo 'active';}?> nav-link dropdown-toggle" href="#" id="tentangKamiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           TENTANG KAMI
         </a>
         <div class="dropdown-menu bg-dark w-100" aria-labelledby="tentangKamiDropdown">
           <a class="dropdown-item text-white" href="<?php echo base_url();?>visimisi">Visi&Misi</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item text-white" href="<?php echo base_url(); ?>lokasi">Lokasi</a>
         </div>
       </li>
      </ul>
    </div>
  </nav>

</div>
<script>
$( document ).ready(function() {
    $('#'+$('#role-text').text()).show();
});
</script>
