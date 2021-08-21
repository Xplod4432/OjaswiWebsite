<?php 
    $title = "About Ojaswi";
    require './includes/header.php';

?>
</div>
<center>
<div style="background-color: #FFE8DC">
<div class="car py-4">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item">
    <div class="container" style="background-color: #341809;">
    <div class="row p-5 align-items-center">
    <div class="col-sm-6"><h1 class="text-white bold">Upcoming Events</h1></div>
    <div class="col-sm-6"><div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="uploads/2021-08-17-22-10-46.png" class="img-fluid rounded-start" alt="event poster">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">ISLC 2.0</h5>
        <p class="card-text">A literary battle between the schools of LPU.</p>
        <a class="btn btn-orange-moon rounded-pill bold" href="https://tinyurl.com/ISLC-2byOjaswi">Register Now!</a>
      </div>
    </div>
  </div>
</div><div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="./images/eternalele.jpg" class="img-fluid rounded-start" alt="event poster">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Eternal Elegance 2021: Sea of Fresher's Talent</h5>
        <p class="card-text">Talent Hunt for Freshers of LPU</p>
        <a class="btn btn-orange-moon rounded-pill bold" href="https://tinyurl.com/EternalElegance2021byOjaswi">Register Now!</a>
      </div>
    </div>
  </div>
</div></div>
  </div>
    </div>
    </div>
    <div class="carousel-item active">
    <div class="container" style="background-color: #341809;">
    <div class="row p-5 align-items-center">
    <div class="row text-white">
        <h1 class="text-center bold">About Us</h1>
</div>
<p style="text-align: justify; color:#FFFFFF; padding: 3% 3% 3% 3%;">
<?php
    $text = fopen("./content/about/aboutOjaswi.txt", "rb");

    while(!feof($text))
    {
        $line=fgets($text);
        echo $line;
    }
    fclose($text);
?>
</p>
</div></div>
    </div>
    <div class="carousel-item">
    <div class="container p-5" style="background-color: #341809;">
<h1 class="bold text-white">Stars of Ojaswi</h1>
<div class="row" style="padding: 0 3% 0 3%;">
<?php
    $text1 = fopen("./content/dignitaries/dignitaries.txt", "rb");
    $l = 0;
    while (!feof($text1)) {
        $line1=fgets($text1);
        echo "<div class=\"card m-3\" style=\"max-width: 540px;\">
        <div class=\"row align-items-center g-0\">
          <div class=\"col-md-4\"><img src=\"$line1\" class=\"img-fluid rounded-start\" alt=\"Dignitary pic\">
          </div>";
        $desc=fgets($text1);
        echo "<div class=\"col-md-8\">
      <div class=\"card-body\">
        <h5 class=\"card-title\">$desc</h5>";
        $cont=fgets($text1);
        echo "
        <p class=\"card-text\">$cont</p>
      </div>
    </div>
  </div>
</div>";
    }
    fclose($text1);
?>
</div>
</div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
</center>
<?php
require "./includes/footer.php"
?>
