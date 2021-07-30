<?php 
    $title = "HomePage";
    require './includes/header.php';
    require './db/conn.php';
    
    $results = $crud->getBlogs();
    $carousel_get = $crud->getCarousel();
?>
	<div id="carouselExampleCaptions" class="carousel slide py-2" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
   
    <?php
    /*$car_txt = fopen("./content/carousel/carousel.txt", "rb");
    $is_first = "active";
    while (!feof($car_txt)) {
    $car_src = fgets($car_txt);
    $car_alt = fgets($car_txt);
    $car_head = fgets($car_txt);
    $car_desc = fgets($car_txt);
    include "./includes/carousel.php";
    $is_first = "";
    }
    fclose($car_txt);*/
    $is_first = "active";
    for ($i=0; $i < 3; $i++) { 
    $c = $carousel_get->fetch(PDO::FETCH_ASSOC);
    $car_src = $c['imagepath'];
    $car_alt = $c['blogtitle'];
    $car_head = $c['blogtitle'];
    $car_desc = $c['blogpreview'];
    include "./includes/carousel.php";
    $is_first = "";
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php
  while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
    $card_src = $r['imagepath'];
    $card_title = $r['blogtitle'];
    $card_tag = $r['name'];
    $card_text = $r['blogpreview'];
    $card_href = $r['blog_id'];
    include "./includes/cards.php";
  }
?>
</div>
<?php
  include 'includes/footer.php'
?>