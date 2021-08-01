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
  <p class="lead">For taking out your time to fill the feedback and we hope to bring many more succesful events with your help.</p>
  <hr>
  <p>
    Follow us on the social media<br/>
    <a href="https://www.instagram.com/ojaswilpu/?hl=en" target="_blank"><i class="bi-facebook" style="font-size:2em;"></i></a>
                    <a href="https://www.facebook.com/ojaswilpuSOC/" target="_blank"><i class="bi-instagram" style="font-size:2em;"></i></a>
                    <a href="https://www.linkedin.com/in/ojaswi-lpu-aa90b91b6/" target="_blank"><i class="bi-linkedin" style="font-size:2em;"></i></a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="./index.php" role="button">Continue to homepage</a>
  </p>
</div>
           <?php include 'includes/successmessage.php';
        }
        else
        {
            include 'includes/errormessage.php';
        }

        

    }
    include './includes/footer.php';
?>