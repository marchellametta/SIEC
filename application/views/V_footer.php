<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <footer class="footer bg-dark text-light pb-3 navbar-fixed-bottom">
    <div class="row ml-3 mr-3">
      <div class="col-md-4 text-center">
        <h3 class="mt-3">Contact Us</h3>
        <div class="col-md-12 justify-content-center">
          <small><i class="rounded-circle fa fa-phone mr-1 mt-1"></i>+1 555 123456</small>
        </div>
        <div class="col-md-12 justify-content-center">
          <small><i class="rounded-circle fa fa-phone mr-1 mt-1"></i>+1 555 123456</small>
        </div>
        <div class="col-md-12 justify-content-center">
          <small><i class="rounded-circle fa fa-phone mr-1 mt-1"></i>+1 555 123456</small>
        </div>
      </div>
    <div class="col-md-4 text-center">
      <h3 class="mt-3 text-center">SOCIAL MEDIA</h3>
      <i class="big-icon fa fa-facebook mr-1 mt-1"></i>
      <i class="big-icon -circle fa fa-twitter mr-1 mt-1"></i>
      <i class="big-icon fa fa-envelope mr-1 mt-1"></i>
    </div>
    <div class="col-md-4 text-center">
      <h3 class="mt-3 text-center">UNPAR OFFICIAL WEBSITE</h3>
      <a href="http://unpar.ac.id/"><img class="w-25" src="<?php echo base_url()?>images/unpar.png"></a>
    </div>
  </div>
  </footer>

  <script>

  $(document).ready(function() {

   var docHeight = $(window).height();
   var footerHeight = $('.footer').outerHeight();
   var footerTop = $('.footer').position().top + footerHeight;

   if (footerTop < docHeight) {
    $('.footer').css('margin-top', 50+(docHeight - footerTop) + 'px');
   }
  });
 </script>
