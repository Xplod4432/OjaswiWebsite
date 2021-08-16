<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $btitle = test_input($_POST['blogtitle']);
        $bauthor = test_input($_POST['blogauthor']);
        $tag = test_input($_POST['BlogTag']);
        $dob = date('Y-m-d H:i:s');
        $tempdob = date('Y-m-d');
        $temptime = date('H-i-s');
        $bcontent = $_POST['content'];
        $bpreview = test_input($_POST['previewtxt']);
        $fblink = test_input($_POST['fblink']);
        $instalink = test_input($_POST['instalink']);
        $ytlink = test_input($_POST['ytlink']);
        $lilink = test_input($_POST['lilink']);
        $reglink='';
        if (isset($_POST['reglink'])) {
            $reglink = test_input($_POST['reglink']);
        }

        $orig_file = $_FILES["blogimage"]["tmp_name"];
        $ext = pathinfo($_FILES["blogimage"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$tempdob-$temptime.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertBlogs($btitle,$bauthor, $tag, $dob, $bcontent, $bpreview,$fblink,$instalink,$ytlink,$lilink,$reglink,$destination);
        $TagName = $crud->getTagById($tag);
        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

        

    }
?>
<?php require_once 'includes/footer.php'; ?>