<?php
    $title = 'View Blog'; 

    require_once 'includes/header.php';
    require './db/conn.php';

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
<hr/>
<section>
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Comments</h1>
                <div class="comment mt-4 text-justify float-left">
                    <?php
                       $crud->getComments($id);
                    ?>
                </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
                <?php 
                        if (isset($_SESSION['last_submit']) && time()-$_SESSION['last_submit'] < 99999999)
                        {
                                echo "<h2>Thank you for your comment!</h2>";
                        }
                    else{
                        $_SESSION['last_submit'] = time();
                ?>
                <form method="post" action="insertcom.php" enctype="multipart/form-data">
                        <input type="hidden" name="blog_id" value="<?php echo $result['blog_id'] ?>" />
                        <div class="mb-3">
                        <label for="comment_name" class="form-label">Name</label>
                        <input required type="text" class="form-control" id="comment_name" name="comment_name"/>
                        </div>
                        <div class="mb-3">
                        <label for="comment_mail" class="form-label">e-Mail</label>
                        <input required type="text" class="form-control" id="comment_mail" name="comment_mail"></input>
                        </div>
                        <div class="mb-3">
                        <label for="comment_content" class="form-label">Content</label>
                        <textarea required class="form-control" id="comment_content" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        </div>
</section>
<?php } }?>
<?php require_once 'includes/footer.php'; ?>