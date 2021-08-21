<?php
    $title = 'View Blog'; 

    require_once 'includes/header.php';
    require './db/conn.php';
    require './includes/sanitise.php';

    // Get Blog by id
    if(!isset($_GET['id'])){
        include './includes/errormessage.php';
        
    } else{
        $id = test_input($_GET['id']);
        if (isset($_POST['LikeSub'])) {
            $crud->updateLikes($id);
        }
        $result = $crud->getBlogDetails($id);
        $crud->updateVisitors($id);
?>
<div class="row py-5">
        <h1 class="text-center bold">Blog</h1>
</div>
<div class="row pb-5 row-cols-1 row-cols-lg-2 g-4">
    <div class="col-12 col-md-8">
            <img class="img-fluid" style="width: 100vw;" src="<?php echo $result['imagepath']; ?>" alt="<?php echo $result['blogtitle']; ?>">
    </div>

<div class="col-12 col-md-8 sr-links">
        <h1 class="bold mt-3 ms-3 mb-3"><?php echo $result['blogtitle']; ?></h1>
        <span class="text-black-50 mt-3 ms-3">By <?php echo $result['blogauthor']; ?> - <?php echo date("F d, Y", strtotime($result['dateofblog'])); ?></span>
        <div class="ps-2 pt-3 pb-5">
        <span class="p-2"><i class="bi bi-eye-fill" style="font-size:1.5rem;"></i><span class="text-black-50 px-2"><?php echo $result['visits']; ?></span></span>
        <span class="p-2"><i class="bi bi-chat-left-fill" style="font-size:1.3rem;"></i><span class="text-black-50 px-2">
            <?php 
                $counter = $crud->countComments($id);
                echo $counter;
            ?></span></span>
    </div>
    <div class="row ps-3 pt-5 pb-3">
        <div class="col"><a href="#comments"><i class="bi bi-chat-left-fill" style="font-size:1.5rem;"></i><span class="footerico bold px-3">Comment</a></div></span>
    </div>
    <div class="row ps-3">
        <div class="col pb-1"><span class="text-black bold">Share on</span></div>
    </div>
    <div class="sr-links">
    <span class="ps-3"><a href="<?php echo $result['facebooklink']; ?>"><i class="bi bi-facebook" style="font-size:1.5rem;"></i></a></span>
    <span class="ps-3"><a href="<?php echo $result['instalink']; ?>"><i class="bi bi-instagram" style="font-size:1.5rem;"></i></a></span>
    <?php if (!empty($result['linkedinlink'])) { ?><div class="col-2"><span class="ps-3"><a href="https://www.linkedin.com/in/ojaswi-lpu-aa90b91b6/?originalSubdomain=in"><i class="bi bi-linkedin" style="font-size:1.5rem;"></i></a></span></div><?php } ?>
        <?php if (!empty($result['youtubelink'])) { ?><div class="col-2"><span class="ps-3"><a href="https://www.youtube.com/channel/UCuJIUiaFhTmMPT7NKTYSlrg"><i class="bi bi-youtube" style="font-size:1.5rem;"></i></a></span></div><?php } ?>
    </div>
    <div class="row pb-5">
    <?php if (!empty($result['registrationlink'])) { ?>
                <div class="col"><p><a href="<?php echo $result['registrationlink']; ?>" class="btn btn-orange-moon rounded-pill">Register Here</a></p></div>
        <?php } ?>
    </div>
    </div>
    </div>
    <hr/>
<div class="row pb-5">
        <div class="col"><p><?php echo $result['blogcontent']; ?></p></div>
</div>
<hr/>
<section>
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
                <h2 class="bold" style="color: rgba(227,48,2,1);">Comments</h2>
                <div class="comment mt-4 text-justify float-left pe-3">
                    <?php
                       $crud->getComments($id);
                    ?>
                </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 px-5 pt-5" id="comments">
                <form method="post" action="insertcom.php" enctype="multipart/form-data">
                        <input type="hidden" name="blog_id" value="<?php echo $result['blog_id'] ?>" />
                        <div class="mb-3">
                        <label for="comment_name" class="form-label rounded-3">Name *</label>
                        <input required type="text" class="form-control" id="comment_name" name="comment_name" placeholder="Your Name"/>
                        </div>
                        <div class="mb-3">
                        <label for="comment_mail" class="form-label rounded-3">Email Address *</label>
                        <input required type="email" class="form-control" id="comment_mail" name="comment_mail" placeholder="Your Email Address"></input>
                        </div>
                        <div class="mb-3">
                        <label for="comment_content" class="form-label rounded-3">Comment *</label>
                        <textarea required class="form-control" id="comment_content" name="comment_content" rows="3" placeholder="Your Comment..."></textarea>
                        </div>
                        <div class="d-grid gap-2 py-4">
                        <button type="submit" name="submit" class="btn btn-orange-moon rounded-3">Submit</button>
                        </div>
                </form>
        </div>
        </div>
</section>
<?php }?>
<?php require_once 'includes/footer.php'; ?>