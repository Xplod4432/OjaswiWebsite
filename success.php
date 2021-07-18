<?php
    $title = 'Success'; 
    require_once 'includes/header.php'; 

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $btitle = $_POST['blogtitle'];
        $tag = $_POST['BlogTag'];
        $dob = date('Y-m-d H:i:s');
        $tempdob = date('Y-m-d');
        $temptime = date('H-i-s');
        $bcontent = $_POST['content'];
        $bpreview = $_POST['previewtxt'];
        $fblink = $_POST['fblink'];
        $instalink = $_POST['instalink'];
        $reglink='';
        if (isset($_POST['reglink'])) {
            $reglink = $_POST['reglink'];
        }

        $orig_file = $_FILES["blogimage"]["tmp_name"];
        $ext = pathinfo($_FILES["blogimage"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$tempdob-$temptime.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertBlogs($btitle, $tag, $dob, $bcontent, $bpreview,$fblink,$instalink,$reglink,$destination);
        $TagName = $crud->getTagById($tag);
        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

        

    }
?>    
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Card Preview</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Blog Preview</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
        $i=0;
    while ($i<3) {
        $card_src = $destination;
        $card_title = $btitle;
        $card_tag = $TagName['name'];
        $card_text = $bpreview;

        include "./includes/cards.php";
        ++$i;
    } ?>
    </div></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="">
        <h1><?php echo $btitle; ?></h1>
        <p><?php echo $dob; ?></p>
        <img class="img-fluid" src="<?php echo $destination; ?>" alt="<?php echo $btitle; ?>">
        <a href="<?php echo $fblink; ?>"><i class="bi-facebook" style="font-size:1rem;"></i></a>
        <a href="<?php echo $instalink; ?>"><i class="bi-instagram" style="font-size:1rem;"></i></a>
        <p><?php echo $bcontent; ?></p>
        <?php if (!empty($reglink)) { ?>
        <p><a href="<?php echo $reglink; ?>">Register here</a></p>
        <?php } ?>
    </div></div>
</div>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>