<?php 
    $title = "Create Blog";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';

    $results = $crud->getTags();
?>
    <h1 class="text-center">Create a new Blog</h1>
    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="blogtitle" class="form-label">Blog Title</label>
            <input required type="text" class="form-control" id="blogtitle" name="blogtitle">
        </div>
        <div class="mb-3">
            <label for="BlogTag" class="form-label">Select tag</label>
            <select id="BlogTag" name="BlogTag" class="form-select">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['blog_tag_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
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
        <input type="checkbox" class="form-check-input" name="needRequired" id="needRequired" onclick="EnableDisableTextBox(this)"/>
        <label for="needRequired" class="form-check-label">Has registration link?</label>
        </div>
        <div class="mb-3">
            <label for="reglink" class="form-label">Registration Link</label>
            <input required type="text" class="form-control" id="reglink" name="reglink" disabled>
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
        <div class="custom-file mb-3 py-3">
        <label class="custom-file-label" for="blogimage">Upload Image</label><br/><br/>
            <input type="file" accept="image/*" class="custom-file-input" id="blogimage" name="blogimage" onchange="loadFile(event)">
            <img id="previewimage" src="#" class="img-fluid" style="width: 100vw;" alt="preview image"/>
        </div>
        <div class="py-3">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php
  require './includes/footer.php'
?>