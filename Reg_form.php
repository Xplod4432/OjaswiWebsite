<?php
   $extracss = "./css/cssfile3.css";
   $title = 'Contact Us';
   require_once './includes/header.php';
?>
   <h1 style="color:white"><center> Student Registration Form </center></h1>
   <form class="reg-form" method="post" action="registration.php" enctype="multipart/form-data">
   
   <div class="field-row">
      <label class="form-label" for="firstName">First name</label>
      <input type="text" id="firstName" name="fname" class="field text-field first-name-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label cf" for="lastName">Last name</label>
      <input type="text" id="lastName" name="lname" class="field text-field last-name-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label" for="initials">University/<br>Institution</label>
      <input type="text" id="initials" name="uniname" class="field text-field initials-field">
   </div>
   <div class="field-row">
      <label class="form-label" for="dateOfBirth">Date of birth</label>
      <input type="date" id="dateOfBirth" name="dob" class="field date-field dob-field" min="1900-01-01" max="<?php date('Y-m-d') ?>"  required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label" for="tel">Phone Number</label>
      <input type="tel" id="tel" name="contact" class="field text-field tel-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label" for="tel">Whatsapp Number</label>
      <input type="tel" id="tel" name="wacontact" class="field text-field tel-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label" for="hs">Department/<br>School Name</label>
      <input type="text" id="hs" name="dept" class="field text-field hs-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label" for="tel">Registration Number</label>
      <input type="tel" id="tel" name="regno" class="field text-field address-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label">Acamedic Year</label>
      <select name="acayear" class="form-dropdown field">
         <option value="1st Year"> 1st Year </option>
         <option value="2nd Year"> 2nd Year </option>
         <option value="3rd Year"> 3rd Year </option>
         <option value="4th Year"> 4th Year </option>
         <option value="5th Year"> 5th Year </option>
      </select>
   </div>
   <div class="field-row">
      <label class="form-label" for="email">Email</label>
      <input type="email" id="email" name="regmail" class="field text-field email-field" required>
      <span class="message"></span>
   </div>
   <div class="field-row">
      <label class="form-label"> Course</label>
      <select name="regcourse" class="field form-dropdown">
          <option value="PhD in Physics"> None </option>
         <option value="BS in Pre-Med Physics"> BS in Pre-Med Physics </option>
         <option value="BS in Physics minor in Economics"> BS in Physics minor in Economics </option>
         <option value="BS in Physics minor in Finance"> BS in Physics minor in Finance </option>
         <option value="BS in Physics with specialization in Material Science"> BS in Physics with specialization in Material Science </option>
         <option value="BS in Physics with specialization in Medical Instrumentation"> BS in Physics with specialization in Medical Instrumentation </option>
         <option value="MS in Physics"> MS in Physics </option>
         <option value="PhD in Physics"> PhD in Physics </option>
          <option value="PhD in Physics"> Computer Science and Engineering</option>
      </select>
   </div>
   <p class="helper-text" style="color:red">* denotes a required field</p>
   <div class="field-row">
      <label class="form-label"></label>
      <input type="submit" name="regsubmit" class="form-button" value="Register">
   </div>
</form>                                    

</body>
</html>