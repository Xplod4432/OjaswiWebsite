<?php
    $title = 'Search Blogs'; 

    require_once 'includes/header.php';

    // Get Blog by id
    if(!isset($_GET['Search'])){
        include './includes/errormessage.php';
        
    } else{
        $search =$_GET['Search'];
        $results = $crud->searchBlogs($search);
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
  while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
    $card_src = $r['imagepath'];
    $card_title = $r['blogtitle'];
    $card_tag = $r['name'];
    $card_text = $r['blogpreview'];
    $card_href = $r['blog_id'];
    include "./includes/cards.php";
  }
?>
<?php }?>
</div>
<?php require_once 'includes/footer.php'; ?>