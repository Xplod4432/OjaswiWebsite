<?php 
    require_once './db/conn.php';
    require './includes/sanitise.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = test_input($_POST['blog_id']);
        $btitle = test_input($_POST['blogtitle']);
        $tag = test_input($_POST['BlogTag']);
        $bcontent = $_POST['content'];
        $bpreview = test_input($_POST['previewtxt']);
        $fblink = test_input($_POST['fblink']);
        $instalink = test_input($_POST['instalink']);
        $reglink='';
        if (isset($_POST['reglink'])) {
            $reglink = test_input($_POST['reglink']);
        }
        //Call Crud function
        $result = $crud->editBlog($id,$btitle, $tag,$bcontent, $bpreview,$fblink,$instalink,$reglink);
        // Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    else{
        include 'includes/errormessage.php';
    }

    

?>