<?php
    $title = 'Success'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $btitle = $_POST['blogtitle'];
        $dob = $_POST['dateofblog'];
        $bcontent = $_POST['content'];
        $bpreview = $_POST['previewtxt'];
        $fblink = $_POST['fblink'];
        $instalink = $_POST['instalink'];
        $reglink = $_POST['reglink'];

        $orig_file = $_FILES["blogimage"]["tmp_name"];
        $ext = pathinfo($_FILES["blogimage"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$dob.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertBlogs($btitle, $dob, $bcontent, $bpreview,$fblink,$instalink,$reglink,$destination);
        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

        

    }
?>
    

    
    <div class="col py-2">
    <div class="card h-100 shadow-lg p-3 mb-5 bg-white rounded">
    <img src="<?php echo $destination; ?>" class="card-img-top" style="width:30%;"alt="<?php echo $btitle; ?>">
      <div class="card-body">
            <h5 class="card-title"><?php echo $btitle; ?></h5>
            <p class="card-text"><?php echo $bpreview; ?></p>
            <a href="#" class="btn btn-primary">Continue reading</a>
        </div>
    </div>
    </div>
    <div class="">
        <h1><?php echo $btitle; ?></h1>
        <p><?php echo $dob; ?></p>
        <img src="<?php echo $destination; ?>">
        <a href="<?php echo $fblink; ?>"><i class="bi-facebook" style="font-size:1rem;"></i></a>
        <a href="<?php echo $instalink; ?>"><i class="bi-instagram" style="font-size:1rem;"></i></a>
        <p><?php echo $bcontent; ?></p>
        <p><?php echo $reglink; ?></p>
    </div>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>