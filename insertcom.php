<?php 
    require_once './db/conn.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $cname = $_POST['comment_name'];
        $cmail = $_POST['comment_mail'];
        $doc = date('Y-m-d H:i:s');
        $ccontent = $_POST['comment_content'];
        $cbid = $_POST['blog_id'];
        //Call Crud function
        $result = $crud->insertComments($cname, $cmail, $ccontent, $cbid, $doc);
        // Redirect to index.php
        if($result){
            header("Location: blogpage.php?id=$cbid");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    else{
        include 'includes/errormessage.php';
    }

    

?>