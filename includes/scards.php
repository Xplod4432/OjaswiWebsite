<div class="row my-3 m-lg-5 p-lg-5 row-cols-1 row-cols-lg-2 g-4 bg-light">
    <div class="col-12 col-md-4">
            <img class="img-fluid lozad" style="width: 100%;" src="<?php echo $card_src; ?>" alt="<?php echo $card_title; ?>">
    </div>
<div class="col-12 col-md-8 sr-links">
<a href="./blogpage.php?id=<?php echo $card_href; ?>">
        <h1 class="bold my-3 mx-3"><?php echo $card_title; ?></h1>
        <span class="text-black-50 mt-3 ms-3">By <?php echo $card_author; ?> - <?php echo date("F d, Y", strtotime($card_date)); ?></span>
        <div class="ps-2 pt-3 pb-3">
        <span class="p-2"><i class="bi bi-eye-fill" style="font-size:1.3rem;"></i><span class="text-black-50 px-2"><?php echo $card_views; ?></span></span>
        <span class="p-2"><i class="bi bi-chat-left-fill" style="font-size:1.1rem;"></i><span class="text-black-50 px-2"><?php echo $card_likes; ?></span></span>
        </div>
        <div class="row ps-3">
            <p class="card-text"><?php echo $card_text; ?></p>
        </div>
</a>
</div>
</div>