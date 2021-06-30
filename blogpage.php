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
<div class="">
        <h1><?php echo $result['blogtitle']; ?></h1>
        <p><?php echo $result['dateofblog']; ?></p>
        <img src="<?php echo $result['imagepath']; ?>">
        <a href="<?php echo $result['facebooklink']; ?>"><i class="bi-facebook" style="font-size:1rem;"></i></a>
        <a href="<?php echo $result['instalink']; ?>"><i class="bi-instagram" style="font-size:1rem;"></i></a>
        <p><?php echo $result['blogcontent']; ?></p>
        <p><?php echo $result['registrationlink']; ?></p>
    </div>
<?php }?>
<?php require_once 'includes/footer.php'; ?>