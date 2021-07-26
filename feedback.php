<?php
    $title = 'Success'; 
    require_once 'includes/header.php'; 

    if(isset($_POST['submit']))
    {
        //extract values from the $_POST array
        $experience = $_POST['star'];
        $fren = $_POST['star2'];
        $ts = date('Y-m-d H:i:s');
        $appr = $_POST['rating'];
        $feedText = $_POST['feedText'];
        echo $experience.$fren.$ts.$appr.$feedText;

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertFeedbacks($experience,$fren,$ts,$appr,$feedText);
        if($isSuccess)
        {
            include 'includes/successmessage.php';
        }
        else
        {
            include 'includes/errormessage.php';
        }

        

    }
?>