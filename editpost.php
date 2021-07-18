<?php 
    require_once './db/conn.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['blog_id'];
        $btitle = $_POST['blogtitle'];
        $tag = $_POST['BlogTag'];
        $bcontent = $_POST['content'];
        $bpreview = $_POST['previewtxt'];
        $fblink = $_POST['fblink'];
        $instalink = $_POST['instalink'];
        $reglink='';
        if (isset($_POST['reglink'])) {
            $reglink = $_POST['reglink'];
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