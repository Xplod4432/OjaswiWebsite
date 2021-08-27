<?php 
    $title = "Student Organization Ojaswi";
    require './includes/header.php';
    require './db/conn.php';
    
    $results = $crud->getBlogs();
    $carousel_get = $crud->getCarousel();
?>
<div class="row row-cols-1 row-cols-lg-2 g-4 mt-2">
  <div class="col col-lg-6 my-5">
    <h1 class="bold"><span style="color: rgba(227,48,2,1); font-size: 150%;">Determine to Shine</span></h1>
    <div class="my-4 text-secondary">
			<span style="font-size: 120%">Like the legendary phoenix in our logo, we always try to come back stronger with each failure, which goes hand in hand with our motto.</span>
		</div>
    <a class="bold btn btn-orange-moon rounded-3 mt-3 px-3 mb-5" href="./AboutOjaswi.php" role="button">About Us</a>
    <div class="row pt-5">
    <h1 class="bold">Annual Magazine : <span style="color: rgba(227,48,2,1);">AGNIV</span></h1>
    <div class="my-4 text-secondary">
    <a class="bold btn btn-orange-moon rounded-3 my-3 px-3 mb-5" href="./magazine.php" role="button">Read Further</a>
		</div>
</div>
  </div>
  <div class="col col-lg-6 my-5">
	<div id="carouselExampleCaptions" class="carousel slide py-2" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
   
    <?php
    $is_first = "active";
    for ($i=0; $i < 3; $i++) { 
    $c = $carousel_get->fetch(PDO::FETCH_ASSOC);
    $car_src = $c['imagepath'];
    $car_alt = $c['blogtitle'];
    $car_head = $c['blogtitle'];
    $car_desc = $c['blogpreview'];
    $car_link = $c['blog_id'];
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
</div>
  </div>
<div class="row row-cols-1 row-cols-md-3 g-4 px-3 mb-5 mt-3 pb-3 bg-light">
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
<div class="align-items-center text-center p-5"><a class="bold btn btn-orange-moon rounded-3 m-5 btn-lg" href="./moreblogs.php">Read More</a></div>
<?php
  include 'includes/footer.php'
?>