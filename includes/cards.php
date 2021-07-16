<div class="col py-2">
    <div class="card h-100 shadow-lg p-3 mb-5 bg-white rounded">
    <img src="<?php echo $card_src; ?>" class="card-img-top" alt="sample image">
      <div class="card-body">
        <h5 class="card-title"><?php echo $card_title; ?></h5>
        <p class="card-text"><?php echo $card_tag; ?></p>
        <p class="card-text"><?php echo $card_text; ?></p>
        <a href="./blogpage.php?id=<?php echo $card_href; ?>" class="btn btn-primary">Continue reading</a>
      </div>
    </div>
  </div>