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
        <table>
            <tr>
                <td>Email</td>
                <td><a href="mailto:ojaswilpu@gmailcom">ojaswilpu@gmail.com</a></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><a href="tel:07349948149">07349948149</a></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>Lovely Professional University Jalandhar - Delhi, Grand Trunk Rd, Phagwara, Punjab 144001</td>
            </tr>
        </table>
    </div></div>
</div>
</div>
<?php
    require_once './includes/footer.php';
?>