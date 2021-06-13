<html>

<!-- Raven2 Example

     Use fgets function to get lines from
     a file one line at a time.  Then echo 
     the string to the document in formatted 
     form using pre tags.
-->

<head>
<title>About Ojaswi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="./css/local.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<style>
body     { background-color: #FA8128;
           color:            #600000;
           margin: 50px 50px 50px 50px; }
           font-size: 12pt;
            }
h1       { font-size: 300%; 
           font-family: "Times New Roman"}
h2       { font-family: Verdana;
           font-size: 150%; }
.prebody { font-family: Arial;
           font-size: 90%;
           margin: 25px 50px 75px 100px; }
</style>
</head>

<body>
<center>
<h2>About Ojaswi</h2>

<?php
    $text = fopen("aboutOjaswi.txt", "rb");

    // Output the poem heading.
    $line = rtrim(fgets($text));
    echo "<h1>" . $line . "</h1>";

    // Output remainder of poem lines.
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

// Output the poem heading.
$line = rtrim(fgets($text1));
echo "<h1>" . $line . "</h1>";

// Output remainder of poem lines.
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
