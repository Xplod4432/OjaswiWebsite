<?php
    $title = 'View Record'; 

    require_once 'includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    // Get Blog by id
    if(!isset($_GET['id'])){
        include './includes/errormessage.php';
        
    } else{
        $id = test_input($_GET['id']);
        $result = $crud->getBlogDetails($id);
    
    
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Blog Preview</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Comments</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="text-center container">
<div class="row row-cols-1 row-cols-md-3 g-4">
<div class="col py-2">
    <div class="card h-100 shadow-lg p-3 mb-5 bg-white rounded">
    <img src="<?php echo $result['imagepath'] ; ?>" class="card-img-top" alt="<?php echo $result['blogtitle']; ?>">
      <div class="card-body">
            <h5 class="card-title"><?php echo $result['blogtitle']; ?></h5>
            <p class="card-text"><?php echo $result['name']; ?></p>
            <p class="card-text"><?php echo $result['blogpreview']; ?></p>
            <a href="blogpage.php?id=<?php echo $result['blog_id'] ?>" class="btn btn-primary">Continue reading</a>
        </div>
    </div>
    </div>
</div>
<br/>
                <a href="viewrecords.php" class="btn btn-info">Back to List</a>
                <a href="edit.php?id=<?php echo $result['blog_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $result['blog_id'] ?>" class="btn btn-danger">Delete</a>
    </div></div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div id="iframeHolder"></div>
<?php if(!isset($_GET['id'])){
        include './includes/errormessage.php';
        
    } else{
        $id = test_input($_GET['id']);
        $crud->modComments($id);   
?>


</div>   
<?php } }?>
<?php require_once 'includes/footer.php'; ?>