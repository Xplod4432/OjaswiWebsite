<?php
    $title = 'Edit Record'; 
    
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php'; 

    if(!isset($_GET['id']))
    {
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $result = $crud->getBlogDetails($id);
    

    
?>

    <h1 class="text-center">Edit Record </h1>

    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="blogtitle" class="form-label">Blog Title</label>
            <input required type="text" class="form-control" id="blogtitle" name="blogtitle" value="<?php echo $result['blogtitle'];?>">
        </div>
        <div class="mb-3">
            <label for="dateofblog" class="form-label">Date</label>
            <input required type="text" class="form-control" id="dateofblog" name="dateofblog" value="<?php echo $result['dateofblog'];?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea required class="form-control" id="content" name="content" rows="3" value="<?php echo $result['blogcontent'];?>"></textarea>
        </div>
        <div class="mb-3">
            <label for="previewtxt" class="form-label">Content Preview</label>
            <input required type="text" class="form-control" id="previewtxt" name="previewtxt" value="<?php echo $result['blogpreview'];?>"></input>
        </div>
        <div class="mb-3">
            <label for="fblink" class="form-label">Facebook link</label>
            <input required type="text" class="form-control" id="fblink" name="fblink" value="<?php echo $result['facebooklink'];?>">
        </div>
        <div class="mb-3">
            <label for="instalink" class="form-label">Instagram Link</label>
            <input required type="text" class="form-control" id="instalink" name="instalink" value="<?php echo $result['instalink'];?>">
        </div>
        <div class="mb-3">
            <label for="reglink" class="form-label">Registration Link</label>
            <input required type="text" class="form-control" id="reglink" name="reglink" value="<?php echo $result['registrationlink'];?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>