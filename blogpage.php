<?php
    $title = 'View Blog'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php'; 

    // Get Blog by id
    if(!isset($_GET['id'])){
        include './includes/errormessage.php';
        
    } else{
        $id = $_GET['id'];
        $result = $crud->getBlogDetails($id);
    
    
?>
<div class="row">
        <h1><?php echo $result['blogtitle']; ?></h1>
</div>
<div class="row">
        <div class="col"><?php echo $result['dateofblog']; ?></div>
</div>
<div class="row row-cols-md-6 row-cols-lg-12">
    <div class="col-12 col-md-8">
            <img class="img-fluid" style="width: 100vw;" src="<?php echo $result['imagepath']; ?>" alt="<?php echo $result['blogtitle']; ?>">
    </div>
    <div class="row row-cols-sm-2 row-cols-md-1">
            <div class="col d-flex justify-content-center"><a href="<?php echo $result['facebooklink']; ?>"><i class="bi-facebook" style="font-size:4em;"></i></a></div>
            <div class="col d-flex justify-content-center"><a href="<?php echo $result['instalink']; ?>"><i class="bi-instagram" style="font-size:4em;"></i></a></div>
    </div>
</div>
<div class="row">
        <div class="col"><p><?php echo $result['blogcontent']; ?></p></div>
        <?php if (!empty($result['registrationlink'])) { ?>
                <div class="col"><p><a href="<?php echo $result['registrationlink']; ?>">Register Here</a></p></div>
        <?php } ?>
</div>
<?php }?>
<?php require_once 'includes/footer.php'; ?>