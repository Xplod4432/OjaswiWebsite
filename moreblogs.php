<?php
    $title = 'Search Blogs'; 

    require_once 'includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    // Get Blog by id
    if(!isset($_GET['moreid'])){
        $blogoffset=0;
        
    } else{
        $blogoffset = test_input($_GET['moreid']);
    }
?>
<div class="row py-4">
        <h2 class="text-center bold">All Blogs Page -<?php echo $blogoffset; ?> of 5</h2>
</div>
<div class="container p-4">
  <?php $crud->allBlogs($blogoffset); ?>
</div>
<div class="p-5">
    <?php if ($blogoffset > 0) {?><span><a class="bold btn btn-orange-moon rounded-3 m-5 btn-lg" href="./moreblogs.php?moreid=<?php echo ($blogoffset-1); ?>">Previous Page</a></span><?php }?>
    <?php if ($blogoffset < 5) {?><span><a class="bold btn btn-orange-moon rounded-3 m-5 btn-lg" href="./moreblogs.php?moreid=<?php echo ($blogoffset+1); ?>">Next Page</a></span><?php }?>
</div>
<?php require_once 'includes/footer.php'; ?>