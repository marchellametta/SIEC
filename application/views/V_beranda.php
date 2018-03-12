<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</head>
<body>

<div id="beranda" class="carousel slide mb-5" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#beranda" data-slide-to="0" class="active"></li>
  <li data-target="#beranda" data-slide-to="1"></li>
  <li data-target="#beranda" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-100" src="<?php echo base_url();?>images/banner1.jpg">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="<?php echo base_url();?>images/banner2.jpg">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="<?php echo base_url();?>images/banner3.jpg">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#beranda" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#beranda" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

</body>
</html>


<script>
function carouselNormalization() {
  var items = $('#beranda .carousel-item'), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  if (items.length) {
    function normalizeHeights() {
      items.each(function() { //add heights to array
        heights.push($(this).height());
      });
      tallest = Math.min.apply(null, heights); //cache largest value
      items.each(function() {
        $(this).css('height', tallest + 'px');
      });
    };
    normalizeHeights();

    $(window).on('resize orientationchange', function() {
      tallest = 0, heights.length = 0; //reset vars
      items.each(function() {
        $(this).css('min-height', '0'); //reset min-height
      });
      normalizeHeights(); //run it again
    });
  }
}

$( document ).ready(function() {
    carouselNormalization();
});

</script>
