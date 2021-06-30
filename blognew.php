<?php 
    $title = "Create Blog";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';
?>
    <h1 class="text-center">Create a new Blog</h1>
    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="blogtitle" class="form-label">Blog Title</label>
            <input required type="text" class="form-control" id="blogtitle" name="blogtitle">
        </div>
        <div class="mb-3">
            <label for="dateofblog" class="form-label">Date</label>
            <input required type="text" class="form-control" id="dateofblog" name="dateofblog">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea required class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="previewtxt" class="form-label">Content Preview</label>
            <input required type="text" class="form-control" id="previewtxt" name="previewtxt"></input>
        </div>
        <div class="mb-3">
            <label for="fblink" class="form-label">Facebook link</label>
            <input required type="text" class="form-control" id="fblink" name="fblink">
        </div>
        <div class="mb-3">
            <label for="instalink" class="form-label">Instagram Link</label>
            <input required type="text" class="form-control" id="instalink" name="instalink">
        </div>
        <div class="mb-3">
            <label for="reglink" class="form-label">Registration Link</label>
            <input required type="text" class="form-control" id="reglink" name="reglink">
        </div>
        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="blogimage" name="blogimage" >
            <label class="custom-file-label" for="blogimage">Choose File</label>
            <small id="blogimage" class="form-text text-danger">File Upload is Optional</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
<?php
  require './includes/footer.php'
?>