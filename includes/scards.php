<div class="row m-5 p-5 row-cols-1 row-cols-lg-2 g-4 bg-light">
    <div class="col-12 col-md-4">
            <img class="img-fluid" style="width: 100%;" src="<?php echo $card_src; ?>" alt="<?php echo $card_title; ?>">
    </div>
<div class="col-12 col-md-8 sr-links">
<a href="./blogpage.php?id=<?php echo $card_href; ?>">
        <h1 class="bold my-3 mx-3"><?php echo $card_title; ?></h1>
        <span class="text-black-50 mt-3 ms-3">By <?php echo $card_author; ?> - <?php echo date("F d, Y", strtotime($card_date)); ?></span>
        <div class="row px-5 pt-3 pb-3">
            <div class="col p-2"><i class="bi bi-eye-fill" style="font-size:1rem;"></i><span class="text-black-50 px-2"><?php echo $card_views; ?></span></div>
            <div class="col p-2"><i class="bi bi-hand-thumbs-up-fill" style="font-size:1rem;"></i><span class="text-black-50 px-2"><?php echo $card_likes; ?></span></div>
        </div>
        <div class="row ps-3">
            <p class="card-text"><?php echo $card_text; ?></p>
        </div>
</a>
</div>
</div>