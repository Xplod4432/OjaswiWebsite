<?php

$download_count = @file_get_contents('Down.txt');
$download_count++;
@file_put_contents('Down.txt', $download_count);

header('Location: ./content/magazine/Agniv.pdf'); // redirect to the real file to be downloaded
?>