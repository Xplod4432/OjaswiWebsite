<?php
    $title = 'Contact Us';
    require_once './includes/header.php';
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Locate Us</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Contact Us</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><div class="row row-cols-1 row-cols-md-3 g-4">
<div id="iframeHolder"></div>
<iframe src="https://www.google.com/maps/d/embed?mid=1fOWrMPRrasEddZTtDvLXWmse3Fw" width="640" height="480"></iframe>
    </div></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="text-center">
        <h1>Contact Information</h1>
        <table class="table">
            <tr>
                <td>Email</td>
                <td><a href="mailto:ojaswilpu@gmailcom">ojaswilpu@gmail.com</a></td>
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
    </div></div>
    <div class="collapse" id="AskForm">
  <div class="card card-body">
  <form method="post" action="mail_query.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="querymail" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="querymail" name="querymail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="querycontent" class="form-label">Describe your query</label>
    <textarea required class="form-control" id="querycontent" name="querycontent" rows="3"></textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="queryconsent">
    <label class="form-check-label" for="queryconsent" name="queryconsent" required>Consent to reply via email/phone</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</div>
</div>
<?php
    require_once './includes/footer.php';
?>