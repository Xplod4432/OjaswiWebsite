<?php 
    $title = "View Feedbacks";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    if(!isset($_GET['id'])){
        include './includes/errormessage.php';
        
    } else{
        $evid = test_input($_GET['id']);
        $crud->getFeedbacks($evid);   }


  require './includes/footer.php';
?>