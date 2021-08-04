<?php
    $title = 'Password Update';
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './db/user.php';
    if (isset($_POST['submitpwd'])) {
        $username = $_SESSION['username'];
        $oldpassword = $_POST['oldpass'];
        $newpassword = $_POST['newpass'];
        $user->changePwd($username,$oldpassword,$newpassword);
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="oldpass" class="form-label">Current Password</label>
    <input type="password" class="form-control" id="oldpass" name="oldpass" required>
  </div>
  <div class="mb-3">
  <label for="newpass" class="form-label">New Password</label>
  <input type="password" id="newpass" name="newpass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  </div>
  <div class="mb-3">
  <label for="newpassconfirm" class="form-label">Confirm New Password</label>
  <input type="password" id="newpassconfirm" name="newpassconfirm" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  </div>
  <div class="mb-3">
  <span id='message'></span>
  </div>
  <button type="submit" name="submitpwd" class="btn btn-primary">Submit</button>
</form>
<script>
  $('#newpass, #newpassconfirm').on('keyup', function () {
    if ($('#newpass').val() == $('#newpassconfirm').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});
</script>
<?php
  include './includes/footer.php';
?>