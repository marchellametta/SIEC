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
  <li data-target="#beranda" data-slide-to="3"></li>
  <li data-target="#beranda" data-slide-to="4"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <?php foreach ($banner as $row): ?>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url().$row->banner;?>">
    </div>
  <?php endforeach; ?>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#beranda" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#beranda" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

<div class="text-left ml-3"><h5>Berita</h5></div>


<?php foreach ($berita as $row): ?>
  <div class="row mr-3 ml-3 pb-5 pt-4 border-bottom border-dark">
    <div class="col-md-3 col-lg-6">
      <img class="w-100" src="<?php echo base_url(). $row->gambar ?>">
    </div>
    <div class="col-md-6 col-lg-6 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
      <h5><?php echo $row->judul ?></h5>
      <p class="text-justify"><?php echo $row->isi ?></p>
    </div>
  </div>
<?php endforeach; ?>

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
      tallest = Math.min.apply(1000, heights); //cache largest value
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
   $( '.carousel-item' ).first().addClass('active');
});

$(window).on("load", function() {
  carouselNormalization();
});

</script>
