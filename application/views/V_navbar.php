<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="fixed-top">
  <div class="text-right bg-black">
    <div class="dropdown">
    <button class="btn btn-sm dropdown-toggle bg-black text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-disabled="true" aria-haspopup="true" aria-expanded="false">
      Dropdown button
    </button>
    <div class="dropdown-menu bg-black" aria-labelledby="dropdownMenuButton">
      <small class="dropdown-item text-white" href="#">Kelas Saya</small>
      <div class="dropdown-divider"></div>
      <small class="dropdown-item text-white" href="#">Profil Saya</small>
      <div class="dropdown-divider"></div>
      <small class="dropdown-item text-white" href="#">Log Out</small>
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
