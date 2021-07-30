<?php
    $title = 'Search Blogs'; 

    require_once 'includes/header.php';
    require_once './db/conn.php';

    // Get Blog by id
    if(!isset($_GET['Search'])){
        include './includes/errormessage.php';
        
    } else{
        $search =$_GET['Search'];
    }
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <?php $crud->searchBlogs($search); ?>
</div>
<?php require_once 'includes/footer.php'; ?>