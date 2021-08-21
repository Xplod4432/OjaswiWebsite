<?php
    $title = 'User Login'; 

    require_once './includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = test_input(strtolower(trim($_POST['username'])));
        $password = test_input($_POST['password']);
        $new_password = md5($password.$username);

        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: index.php");
        }

    }
?>

<div class="row py-4">
        <h1 class="text-center bold">Welcome Webmaster!</h1>
</div>
<div class="row">
<div class="col-md-6 d-none d-md-block ps-5">
    <img src="./images/My_password-amico.png" class="img-fluid" alt="Login art">
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 p-5 d-flex align-items-center justify-content-center">
      <div class="rounded-3 bg-light p-5 d-flex align-items-center justify-content-center">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"  autocomplete=off>
        <div class="mb-3">
            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="d-grid gap-2 py-4">
        <input type="submit" value="Login" class="btn btn-orange-moon rounded-3">
        </div>
    </form>
</div>
</div>
</div>
<?php include_once './includes/footer.php'?>