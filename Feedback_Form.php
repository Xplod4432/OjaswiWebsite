<?php
  $title = 'Feedback Form';
  $extracss = './css/css_feedback_form.css';
  require './includes/header.php';
  require './includes/sanitise.php';
  if (isset($_GET['evid'])) {
  $evid = test_input($_GET['evid']);
?>
<div class="feedback">

<div class="boxed">
  Greetings From Ojaswi,<br>
Thank you for getting your interest and participation at our events. We would like to know how we performed. Please spare some moments to give us your valuable feedback as it will help us in improving our ways to bring more phenomenonal events to you.
</div>
 
<h4>Please rate your experience for the following parameters</h4>
 
<form method="post" action="feedback.php" enctype="multipart/form-data">
<input type="hidden" name="event_id" value="<?php echo $evid ?>" />
<div class="mb-3">
    <label for="feedback_name" class="form-label">Particiapnt's Name <span style="color:red;font-weight:bold">*</span></label>
    <input type="text" class="form-control" id="feedback_name" name="feedback_name" required>
  </div>
<div class="mb-3">
    <label for="feedback_mail" class="form-label">Participant's Email <span style="color:red;font-weight:bold">*</span></label>
    <input type="email" class="form-control" id="feedback_mail" name="feedback_mail" aria-describedby="emailHelp" required>
  </div>
<label>1. Your overall experience with us ?</label><br>
  <div class="row">
      <div class="col-md-12">
          <div class="stars">
            <input class="star star-5" id="star-51" type="radio" name="star" value="5"/> <label class="star star-5" for="star-51"></label> <input class="star star-4" id="star-41" type="radio" name="star" value="4"/> <label class="star star-4" for="star-41"></label> <input class="star star-3" id="star-31" type="radio" name="star" value="3"/> <label class="star star-3" for="star-31"></label> <input class="star star-2" id="star-21" type="radio" name="star" value="2"/> <label class="star star-2" for="star-21"></label> <input class="star star-1" id="star-11" type="radio" name="star" value="1"/> <label class="star star-1" for="star-11"></label>
          </div>
      </div>
  </div>
  <div class="clear"></div> 
  <hr class="survey-hr">
<label>2. Friendliness and courtesy shown to you while providing you our services.</label><br>
<div class="row">
  <div class="col-md-12">
      <div class="stars">
         <input class="star star-5" id="star-5" type="radio" name="star2" value="5"/> <label class="star star-5" for="star-5"></label> <input class="star star-4" id="star-4" type="radio" name="star2" value="4"/> <label class="star star-4" for="star-4"></label> <input class="star star-3" id="star-3" type="radio" name="star2" value="3"/> <label class="star star-3" for="star-3"></label> <input class="star star-2" id="star-2" type="radio" name="star2" value="2"/> <label class="star star-2" for="star-2"></label> <input class="star star-1" id="star-1" type="radio" name="star2" value="1"/> <label class="star star-1" for="star-1"></label>
      </div>
  </div>
</div>
 
 
  <div class="clear"></div> 
  <hr class="survey-hr">
<label>3. How much was event appropriate to you?</label><br><br/>
  <div style="color:grey">
    <span style="float:left">
     POOR
    </span>
    <span style="float:right">
      BEST
    </span>
    
  </div>
<span class="scale-rating">
  <label value="1">
  <input type="radio" name="rating" value="1">
  <label style="width:100%;"></label>
  </label>
  <label value="2">
  <input type="radio" name="rating" value="2">
  <label style="width:100%;"></label>
  </label>
  <label value="3">
  <input type="radio" name="rating" value="3">
  <label style="width:100%;"></label>
  </label>
  <label value="4">
  <input type="radio" name="rating" value="4">
  <label style="width:100%;"></label>
  </label>
  <label value="5">
  <input type="radio" name="rating" value="5">
  <label style="width:100%;"></label>
  </label>
  <label value="6">
  <input type="radio" name="rating" value="6">
  <label style="width:100%;"></label>
  </label>
  <label value="7">
  <input type="radio" name="rating" value="7">
  <label style="width:100%;"></label>
  </label>
  <label value="8">
  <input type="radio" name="rating" value="8">
  <label style="width:100%;"></label>
  </label>
  <label value="9">
  <input type="radio" name="rating" value="9">
  <label style="width:100%;"></label>
  </label>
  <label value="10">
  <input type="radio" name="rating" value="10">
  <label style="width:100%;"></label>
  </label>
</span>
 
  <div class="clear"></div> 
  <hr class="survey-hr"> 
<label for="m_3189847521540640526commentText">4. Any Other Suggestions:</label><br/><br/>
<textarea cols="75" name="feedText" rows="5" maxlength="300" placeholder="Write your suggestions in 300 characters."></textarea><br>
<br>
  <div class="clear"></div> 
<input style="background:#643301;color:#fff;padding:12px;border:0" type="submit" name="submit" value="Submit your review"> 
</form>
</div>
<?php
  }
  include './includes/footer.php';
?>