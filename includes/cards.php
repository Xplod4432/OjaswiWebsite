<div class="col px-4 pt-2 lr-links">
<a href="./blogpage.php?id=<?php echo $card_href; ?>">
    <div class="text-white" style="position: relative; background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(<?php echo $card_src; ?>); background-repeat: no-repeat; background-size: cover; min-height: 40vh; border-radius: 25px">
    <div class="row pt-5" style="border-radius: 25px; margin: 0 0 -3% -3%; position: absolute; bottom: 3%; left: 3%; background: -webkit-linear-gradient(#f97f5f, #e33002); background: linear-gradient(rgba(0,0,0,0.001), rgba(0,0,0,1));">
        <h5 class="card-title"><?php echo $card_title; ?></h5>
        <p class="card-text"><?php echo $card_tag; ?></p>
        <p class="card-text"><?php echo $card_text; ?></p>
        <div class="col pb-3">
        <button class="btn btn-light rounded-pill">Continue reading <i class="bi bi-arrow-right-circle-fill"></i></button>
        </div>
    </div>
    </div>
</a>
</div>