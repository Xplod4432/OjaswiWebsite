<?php 
    require_once './db/conn.php';
    require './includes/sanitise.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $cname = test_input($_POST['comment_name']);
        $cmail = test_input($_POST['comment_mail']);
        $doc = date('Y-m-d H:i:s');
        $ccontent = $_POST['comment_content'];
        $cbid = $_POST['blog_id'];
        if ($crud->checkRepCom($cbid,$cmail)) {
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
            echo "<h3>You have already coomented on this blog</h3>";
        }
    }
    else{
        include 'includes/errormessage.php';
    }

    

?>