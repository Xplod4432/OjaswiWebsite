<?php 
    $title = "About Ojaswi";
    $extracss = "./css/about.css";
    require './includes/header.php' ;

?>
<center>
<h1>About Ojaswi</h1><br/>
<p>
<?php
    $text = fopen("aboutOjaswi.txt", "rb");

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
    $text1 = fopen("dignitories.txt", "rb");
    $i = 0;
    while (!feof($text1)) {
        $line=fgets($text1);
        echo "<div class='accordion-item'>
        <h2 class='accordion-header' id='heading$i'>
          <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$i' aria-expanded='true' aria-controls='collapse$i'>$line </button>
          </h2>
          <div id='collapse$i' class='accordion-collapse collapse show' aria-labelledby='heading$i' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>";
        $desc=fgets($text1);
        echo "$desc 
        </div>
        </div>
      </div>";
      $i++;
    }
    fclose($text1);
?>
</div>
<button type="button" id="button" class="btn btn-info btn-lg"><i class="bi-geo-alt-fill" style="font-size:1rem;"></i>&nbspLocate Us</button>
<br/>
<br/>

<div id="iframeHolder"></div>
</center>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#button').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder').html('<iframe src="https://www.google.com/maps/d/embed?mid=1fOWrMPRrasEddZTtDvLXWmse3Fw" width="640" height="480"></iframe>');
        }
    });   
});
</script>
<?php
require "./includes/footer.php"
?>
