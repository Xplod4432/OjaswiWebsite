<?php
    $title = 'Contact Us';
    require_once './includes/header.php';
    require './db/conn.php';
    require './includes/sanitise.php';
    if (isset($_POST['submitq'])) {
      $qmail = test_input($_POST['querymail']);
      if ($_POST['queryphone'] == '') {
        $qphone = NULL;
      }
      else{
      $qphone = test_input($_POST['queryphone']);
      }
      $qcontent = test_input($_POST['querycontent']);
      $crud->insertQuery($qmail,$qphone,$qcontent);
    }
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Contact Us</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Locate Us</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="text-center container">
        <h1>Contact Information</h1>
        <table class="table">
            <tr>
                <td>Email</td>
                <td><a href="mailto:ojaswilpu@gmailcom">ojaswilpu@gmail.com</a></td>
            </tr>
            <tr>
                <td>Socials</td>
                <td><a href="https://www.instagram.com/ojaswilpu/?hl=en" target="_blank"><i class="bi-facebook" style="font-size:2em;"></i></a>
                    <a href="https://www.facebook.com/ojaswilpuSOC/" target="_blank"><i class="bi-instagram" style="font-size:2em;"></i></a>
                    <a href="https://www.linkedin.com/in/ojaswi-lpu-aa90b91b6/" target="_blank"><i class="bi-linkedin" style="font-size:2em;"></i></a>
                </td>
            </tr>
            <tr>
                <td>Get in touch/Ask a query</td>
                <td><button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#AskForm" aria-expanded="false" aria-controls="collapseExample">Ask Us</button></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>Lovely Professional University <br>Jalandhar - Delhi, Grand Trunk Rd,<br> Phagwara, Punjab 144001</td>
            </tr>
        </table>
    </div>
    </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div id="iframeHolder"></div>
<iframe src="https://www.google.com/maps/d/embed?mid=1fOWrMPRrasEddZTtDvLXWmse3Fw" width="640" height="480"></iframe></div>
    <div class="collapse" id="AskForm">
  <div class="card card-body">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="querymail" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="querymail" name="querymail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll use this address to answer your query.</div>
  </div>
  <div class="mb-3">
    <label for="queryphone" class="form-label">Contact Number</label>
    <input type="tel" class="form-control" id="queryphone" name="queryphone" aria-describedby="PhoneHelp">
    <div id="PhoneHelp" class="form-text">Optional, will be used to answer query.</div>
  </div>
  <div class="mb-3">
    <label for="querycontent" class="form-label">Describe your query</label>
    <textarea required class="form-control" id="querycontent" name="querycontent" rows="3" maxlength="300"></textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="queryconsent">
    <label class="form-check-label" for="queryconsent" name="queryconsent" required>Consent to reply via email/phone</label>
  </div>
  <button type="submit" name="submitq" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</div>
</div>
<?php
    require_once './includes/footer.php';
?>