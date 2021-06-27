<?php 
    $title = "HomePage";
    require './includes/header.php'
?>
	<div id="carouselExampleCaptions" class="carousel slide py-2" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
   
    <?php
    $car_txt = fopen("./content/carousel/carousel.txt", "rb");
    $is_first = "active";
    while (!feof($car_txt)) {
    $car_src = fgets($car_txt);
    $car_alt = fgets($car_txt);
    $car_head = fgets($car_txt);
    $car_desc = fgets($car_txt);
    include "./includes/carousel.php";
    $is_first = "";
    }
    fclose($car_txt);
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
$crd_txt = fopen("./content/cards/cards.txt", "rb");
  while (!feof($crd_txt)) {
    $card_src = fgets($crd_txt);
    $card_title = fgets($crd_txt);
    $card_text = fgets($crd_txt);
    $card_href = fgets($crd_txt);
    include "./includes/cards.php";
  }
  fclose($crd_txt);
?>
</div>
<?php
  include 'includes/footer.php'
?>