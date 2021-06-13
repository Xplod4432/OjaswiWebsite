<?php 
    $title = "HomePage";
    require './includes/header.php'
?>
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/000107506.jpg" class="d-block w-100" alt="image1">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <?php 
    $car_src = "blog-ph.jpg";
    $car_alt = "image2";
    $car_head = "Second slide label";
    $car_desc = "Some representative placeholder content for the second slide.";
    include "./includes/carousel.php"
    ?>
    <?php 
    $car_src = "I86rTVl.jpeg";
    $car_alt = "image3";
    $car_head = "Third slide label";
    $car_desc = "Some representative placeholder content for the third slide.";
    include "./includes/carousel.php"
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
<div>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php 
    $card_src = "I86rTVl.jpeg";
    $card_title = "Card title";
    $card_text = "This is a short card.";
    $card_href = "#";
    include "./includes/cards.php";
?>
  <div class="col">
    <div class="card h-100">
    <img src="./images/I86rTVl.jpeg" class="card-img-top" alt="sample image">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a short card.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <img src="./images/I86rTVl.jpeg" class="card-img-top" alt="sample image">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="./images/I86rTVl.jpeg" class="card-img-top" alt="sample image">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
<?php
  include 'includes/footer.php'
?>