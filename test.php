<?php 
    $title = "About Ojaswi";
    require './includes/header.php';
?>
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
<?php
require "./includes/footer.php";
?>