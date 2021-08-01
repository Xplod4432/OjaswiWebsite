<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
    require_once './db/conn.php';

    if(isset($_POST['submit']))
    {
        //extract values from the $_POST array
        $experience = $_POST['star'];
        $fren = $_POST['star2'];
        $ts = date('Y-m-d H:i:s');
        $appr = $_POST['rating'];
        $feedText = $_POST['feedText'];

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertFeedbacks($experience,$fren,$ts,$appr,$feedText);
        if($isSuccess)
        { ?>
            <div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>
  </p>
</div>
           <?php include 'includes/successmessage.php';
        }
        else
        {
            include 'includes/errormessage.php';
        }

        

    }
?>