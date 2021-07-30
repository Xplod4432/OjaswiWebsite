<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
    require_once './db/conn.php';

    if(isset($_POST['regsubmit'])){
        //extract values from the $_POST array
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $uniname = $_POST['uniname'];
        $contact = $_POST['contact'];
        $wacontact = $_POST['wacontact'];
        $dept = $_POST['dept'];
        $regno = $_POST['regno'];
        $acayear = $_POST['acayear'];
        $regmail = $_POST['regmail'];
        $regcourse = $_POST['regcourse'];

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertParticipant($fname, $lname, $dob, $uniname, $contact,$wacontact,$dept,$regno,$acayear,$regmail,$regcourse);
        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

        

    }
?>
