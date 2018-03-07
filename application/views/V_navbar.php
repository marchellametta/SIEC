<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="fixed-top">
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
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)=='informasi'){echo 'active';}?> nav-link" href="<?php echo base_url(); ?>informasi">INFORMASI</a>
        </li>
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)=='pendaftaran'){echo 'active';}?> nav-link" href="<?php echo base_url(); ?>pendaftaran">PENDAFTARAN</a>
        </li>
        <li class="nav-item dropdown mr-2">
         <a class="<?php if($this->uri->segment(1)=='lokasi' || $this->uri->segment(1)=='visimisi' ){echo 'active';}?> nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           TENTANG KAMI
         </a>
         <div class="dropdown-menu bg-dark w-100" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="<?php echo base_url();?>visimisi">Visi&Misi</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="<?php echo base_url(); ?>lokasi">Lokasi</a>
         </div>
       </li>
      </ul>
    </div>
  </nav>

</div>
