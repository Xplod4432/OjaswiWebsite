<?php 
    $title = "About Ojaswi";
    $extracss = "./css/about.css";
    require './includes/header.php' ;

?>
<center>
<h1>About Ojaswi</h1><br/>
<p>
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
<h2>Dignitories</h2>
<div class="accordion" id="accordionExample">
<?php
    $text1 = fopen("./content/dignitaries/dignitaries.txt", "rb");
    $idk = array('One', 'Two', 'Three', 'Four', 'Five');
    $l = 0;
    $i;
    while (!feof($text1)) {
        $i=$idk[$l];
        $line=fgets($text1);
        echo "<div class='accordion-item'>
        <h2 class='accordion-header' id='heading$i'>
          <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$i' aria-expanded='false' aria-controls='collapse$i'>$line </button>
          </h2>
          <div id='collapse$i' class='accordion-collapse collapse' aria-labelledby='heading$i' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>";
        $desc=fgets($text1);
        echo "$desc 
        </div>
        </div>
      </div>";
      $l++;
    }
    fclose($text1);
?>
</div>
<?php
require "./includes/footer.php"
?>
