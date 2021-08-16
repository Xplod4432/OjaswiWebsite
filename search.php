<?php
    $title = 'Search Blogs'; 

    require_once 'includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    // Get Blog by id
    if(!isset($_GET['Search'])){
        include './includes/errormessage.php';
        
    } else{
        $search = test_input($_GET['Search']);
    }
?>
<div class="row py-4">
        <h2 class="text-center bold">Search Results for "<?php echo $search; ?>"</h2>
</div>
<div class="container p-4">
  <?php $crud->searchBlogs($search); ?>
</div>
<?php require_once 'includes/footer.php'; ?>