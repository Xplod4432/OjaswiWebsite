<?php 
    $title = "About Ojaswi";
    $extracss = "./css/about.css";
    require './includes/header.php' ;

?>
<center>
<h1>About Ojaswi</h1>

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

<h2>Dignitories</h2>
<?php 
$text1 = fopen("dignitories.txt", "rb");

// Output the text heading.
$line = rtrim(fgets($text1));
echo "<h4>" . $line . "</h4>";

// Output remainder of text lines.
echo "<pre class=\"prebody\">\n";


while($line = fgets($text1, 200))
{
    echo $line;
}
echo "</pre>";


// Output the text heading.
$line = rtrim(fgets($text1));
echo "<h3>" . $line . "</h3>";

// Output remainder of text lines.
echo "<pre class=\"prebody\">\n";


while($line = fgets($text1, 300))
{
    echo $line;
}
echo "</pre>";


?>
<centre>
<button type="button" id="button" class="btn btn-info btn-lg"><i class="bi-geo-alt-fill" style="font-size:1rem;"></i>&nbspLocate Us</button>
<br/>
<br/>

<div id="iframeHolder"></div>
</centre>
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
