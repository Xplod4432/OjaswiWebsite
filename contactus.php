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
<div class="row py-4">
        <h1 class="text-center bold">Contact Us</h1>
</div>
<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 px-5">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="queryname" class="form-label">Name *</label>
    <input required type="text" class="form-control" id="queryname" name="queryname" placeholder="Your Name">
  </div>
  <div class="mb-3">
    <label for="querymail" class="form-label">Email Address *</label>
    <input required type="email" class="form-control" id="querymail" name="querymail" aria-describedby="emailHelp" placeholder="Your Email Address">
    <div id="emailHelp" class="form-text">We'll use this address to answer your query.</div>
  </div>
  <div class="mb-3">
    <label for="queryphone" class="form-label">Contact Number</label>
    <input type="tel" class="form-control" id="queryphone" name="queryphone" aria-describedby="PhoneHelp" placeholder="Your Contact Number">
    <div id="PhoneHelp" class="form-text">Optional, will be used to answer query.</div>
  </div>
  <div class="mb-3">
    <label for="querycontent" class="form-label">Describe your query *</label>
    <textarea required class="form-control" id="querycontent" name="querycontent" rows="3" maxlength="300" placeholder="Your Query..."></textarea>
  </div>
  <div class="d-grid gap-2 py-5">
  <button type="submit" name="submitq" class="btn btn-orange-moon rounded-3">Submit</button>
  </div>
</form>
  </div>
  <div class="col-md-6 d-none d-md-block ps-5">
    <img src="./images/Contact_us-amico.png" class="img-fluid" alt="Contact art">
  </div>
  </div>
<?php
    require_once './includes/footer.php';
?>