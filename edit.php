<?php
    $title = 'Edit Record'; 
    
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './includes/auth_check.php'; 
    require './includes/sanitise.php';

    if(!isset($_GET['id']))
    {
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = test_input($_GET['id']);
        $result = $crud->getBlogDetails($id);
        $results = $crud->getTags();
    

    
?>
<script src='https://cdn.tiny.cloud/1/xwju8aclc7z7ic2h983o8hl3u7vwrsildirdk3pfwvot3z6p/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
  selector: 'textarea#content',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  images_upload_url : 'postAcceptor.php',
  automatic_uploads : true,
  images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'postAcceptor.php');

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image imagetools table',
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 });
  </script>

    <h1 class="text-center">Edit Record </h1>

    <form method="post" action="editpost.php" enctype="multipart/form-data">
    <input type="hidden" name="blog_id" value="<?php echo $result['blog_id'] ?>" />
        <div class="mb-3">
            <label for="blogtitle" class="form-label">Blog Title</label>
            <input required type="text" class="form-control" id="blogtitle" name="blogtitle" value="<?php echo $result['blogtitle'];?>">
        </div>
        <div class="mb-3">
            <label for="blogauthor" class="form-label">Blog Author</label>
            <input required type="text" class="form-control" id="blogauthor" name="blogauthor" value="<?php echo $result['blogauthor'];?>">
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
            <textarea class="form-control" id="content" name="content" rows="3"><?php echo $result['blogcontent'];?></textarea>
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
            <label for="ytlink" class="form-label">YouTube Link</label>
            <input type="text" class="form-control" id="ytlink" name="ytlink" value="<?php echo $result['ytlink'];?>">
        </div>
        <div class="mb-3">
            <label for="lilink" class="form-label">LinkedIn Link</label>
            <input type="text" class="form-control" id="lilink" name="lilink" value="<?php echo $result['lilink'];?>">
        </div>
        <input type="checkbox" class="form-check-input" name="needRequired" id="needRequired" onclick="EnableDisableTextBox(this)"/>
        <label for="needRequired" class="form-check-label">Has registration link?</label>
        <div class="mb-3">
            <label for="reglink" class="form-label">Registration Link</label>
            <input required type="text" class="form-control" id="reglink" name="reglink" <?php if (!isset($result['registrationlink'])) {
                echo "disabled";
            }; ?> value="<?php echo $result['registrationlink']; ?>">
        <script type="text/javascript">
            function EnableDisableTextBox(needRequired) {
                var regreq = document.getElementById("reglink");
                regreq.disabled = needRequired.checked ? false : true;
                if (!regreq.disabled) {
                    regreq.focus();
                }
            }
        </script>
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