<?php 
    $title = "About Ojaswi";
    $extracss = "./css/about.css";
    require './includes/header.php' 
?>
<center>
<h2>About Ojaswi</h2>

<?php
    $text = fopen("aboutOjaswi.txt", "rb");

    // Output the text heading.
    $line = rtrim(fgets($text));
    echo "<h1>" . $line . "</h1>";

    // Output remainder of text lines.
    echo "<pre class=\"prebody\">\n";

    while($line = fgets($text, 100))
    {
        echo $line;
    }
    echo "</pre>";
?>

<h1>Dignitories</h1>
<?php 
$text1 = fopen("dignitories.txt", "rb");

// Output the text heading.
$line = rtrim(fgets($text1));
echo "<h1>" . $line . "</h1>";

// Output remainder of text lines.
echo "<pre class=\"h2\">\n";


while($line = fgets($text1, 50))
{
    echo $line;
}
echo "</pre>";
?>
<button type="button" id="button" class="btn btn-info btn-lg">Locate Us</button>
<br/>
<br/>
<div id="iframeHolder"></div>
</center>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#button').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder').html('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.726564801247!2d75.70295481498906!3d31.255991981457804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5f5e9c489cf3%3A0x4049a5409d53c300!2sLovely%20Professional%20University!5e0!3m2!1sen!2sin!4v1623524672797!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>');
        }
    });   
});
</script>
<?php
include "./includes/footer.php"
?>
