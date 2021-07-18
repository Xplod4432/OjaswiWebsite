<?php 
  include_once 'includes/session.php';
  require_once './db/conn.php';
  $results = $crud->getTags();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="./css/local.css" rel="stylesheet">
  <link href="<?php echo $extracss; ?>" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	<title><?php echo $title ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top bg-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php"><i class="bi-house-fill"></i>&nbspHome</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AboutOjaswi.php">About Ojaswi</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>
              Explore by Tags
            </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?><li><a class="dropdown-item" href="./blognew.php"><?php echo $r['name']; ?></a></li>
            <li><hr class="dropdown-divider"></li><?php }?>
          </ul>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Search</a>
      </li>
      </ul>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form class="d-flex" action="./search.php" method="get">
        <input class="form-control me-2" id="Search" name="Search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
      <ul class="nav navbar-nav ml-auto">
      <?php 
			if (!isset($_SESSION['userid'])) {
	  ?>
    <li class="nav-item">
        <a class="nav-link" href="./login.php">Login</a>
      </li>
      <?php } else{?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>
              Hello <?php echo $_SESSION['username'] ?>
            </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./blognew.php">Create Blog</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./viewrecords.php">View Blogs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
        <?php }?>
    </div>
  </div>
</nav>
<div class="container">