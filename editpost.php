<?php 
    require_once './db/conn.php';
    require './includes/sanitise.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = test_input($_POST['blog_id']);
        $btitle = test_input($_POST['blogtitle']);
        $bauthor = test_input($_POST['blogauthor']);
        $tag = test_input($_POST['BlogTag']);
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
        //Call Crud function
        $result = $crud->editBlog($id,$btitle,$bauthor, $tag,$bcontent, $bpreview,$fblink,$instalink,$ytlink,$lilink,$reglink);
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