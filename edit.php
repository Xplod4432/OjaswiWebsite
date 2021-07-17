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
        $results = $crud->getTags();
    

    
?>

    <h1 class="text-center">Edit Record </h1>

    <form method="post" action="editpost.php" enctype="multipart/form-data">
    <input type="hidden" name="blog_id" value="<?php echo $result['blog_id'] ?>" />
        <div class="mb-3">
            <label for="blogtitle" class="form-label">Blog Title</label>
            <input required type="text" class="form-control" id="blogtitle" name="blogtitle" value="<?php echo $result['blogtitle'];?>">
        </div>
        <div class="mb-3">
            <label for="BlogTag" class="form-label">Select tag</label>
            <select id="BlogTag" name="BlogTag" class="form-select">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['blog_tag_id'] ?>" <?php if ($r['blog_tag_id'] == $result['blog_tag_id']) {
                       echo "selected";
                   }
                   ?>><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea required class="form-control" id="content" name="content" rows="3"><?php echo $result['blogcontent'];?></textarea>
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
        <input type="checkbox" class="form-check-input" name="needRequired" id="needRequired" onclick="EnableDisableTextBox(this)"/>
        <label for="needRequired" class="form-check-label">Has registration link?</label>
        </div>
        <div class="mb-3">
            <label for="reglink" class="form-label">Registration Link</label>
            <input required type="text" class="form-control" id="reglink" name="reglink" <?php if (!isset($result['registrationlink'])) {
                echo "disabled";
            }; ?> value="<?php echo $result['registrationlink']; ?>">
        </div>
        <script type="text/javascript">
            function EnableDisableTextBox(needRequired) {
                var regreq = document.getElementById("reglink");
                regreq.disabled = needRequired.checked ? false : true;
                if (!regreq.disabled) {
                    regreq.focus();
                }
            }
            var loadFile = function(event) {
                var output = document.getElementById('previewimage');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>