<?php 
    require_once './db/conn.php';
    //Get values from post operation
    if(isset($_POST['submiteve'])){
        //extract values from the $_POST array
        $event_name = $_POST['event_name'];
        $event_type = $_POST['event_type'];
        //Call Crud function
        $result = $crud->insertEvent($event_name, $event_type);
        // Redirect to index.php
        if($result){
            header("Location: eventview.php");
        }
        else{
            include 'includes/errormessage.php';
        }
        
        }
        else{
            include 'includes/errormessage.php';
        }
?>