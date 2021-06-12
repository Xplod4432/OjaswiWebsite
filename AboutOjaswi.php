<html>

<!-- Raven2 Example

     Use fgets function to get lines from
     a file one line at a time.  Then echo 
     the string to the document in formatted 
     form using pre tags.
-->

<head>
<title>About Ojaswi</title>
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
<centre>
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
</centre>

</body>
</html>
