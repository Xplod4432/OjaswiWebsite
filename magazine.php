<?php
    $title = "AGNIV";
    require_once './includes/header.php';
    $hit_count = @file_get_contents('count.txt'); // read the hit count from file
    $hit_count++; // increment the hit count by 1
    @file_put_contents('count.txt', $hit_count); // store the new hit count
    $Down_count = @file_get_contents('Down.txt');
?>
<div class="row my-3 m-md-4 align-items-center text-center">
<h1 class="bold pb-4">Annual Magazine : <span style="color: rgba(227,48,2,1);">AGNIV</span></h1>
<iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" style="border: 1px solid lightgray; width: 100%; height: 100%; min-height: 500px;" src="https://heyzine.com/flip-book/974cc5b050.html"></iframe>
</div>
<div class="row">
    <div class="col align-items-center text-center pt-4 ps-5">
        <h3 class="bold">
            Views: <?php echo $hit_count; ?>
        </h3>
    </div>
    <div class="col align-items-center text-center pt-4 ps-5">
        <h3 class="bold">
            Downloads: <?php echo $Down_count; ?>
        </h3>
    </div>
<div class="col lr-links align-items-center text-center">
<a class="bold btn btn-orange-moon rounded-3 my-3 px-3 mb-5 btn-lg" href="./download_mag.php" role="button">Download Magazine</a>
</div>
</div>
    <?php
    require_once './includes/footer.php';
?>