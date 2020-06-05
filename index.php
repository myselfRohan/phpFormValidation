<?php

   require_once('validation_function.php');

   $errors = [];


   if (is_post_request()) {

      $name = $_POST['full_name'];
      $email =$_POST['email'];  
      $phone = $_POST['phone'];
      
      if (is_blank($name)) {
         echo "\n Name Cannot Be Blank,";
      } elseif (!has_length($name, array('min' => 5, 'max' => 255))){
         echo "\n Name Must Be of 5 or greater Than 5 characters,";
      } else {
         echo $name;
      }

      if(is_blank($email)) {
         echo "\nEmail cannot be blank.,";
      } elseif (!has_valid_email_format($email)) {
         echo "\n Email must be a valid format.,";
      } else {
         echo $email;
      }

      if (validate_mobile($phone)) {
         echo $phone;
      } else {
         echo "\n , inavalid phone number";
      }

      if (isset($_POST['submit'])) {
      //checking facilities
      // $visible = $_POST['visible'];
         if(empty($_POST['visible'])) {
            echo "\n You must select at least one of the hobbies.";
         } 
         // if(!empty($_POST['visible'])) {
         //    $no_checked = count($_POST['visible']);
         //    if($no_checked<2){
         //       echo "\n Select at least two options,";
         //    }  
         // }
      }
   }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Registration Form</title>
</head>
<body>
  <div class="container">
      <form class="form" action = "index.php" method="POST">
         <h2>Sign Up</h2> 
         <div class="formA">
            <label for="uname">Name</label>
            <input type="text" name="full_name" placeholder="Enter Your Name">
         </div>
         <div class="formA">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter Your Email">
         </div>
         <div id="formC">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" placeholder="Enter Your Number">
         </div>
         <p>Select Your gender</p>
         <div id="formD">
            <label for="male">Male</label>
            <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender'] == "zero"){ echo "checked"; }  ?> value="zero" required> 
         </div>
         <div id="formE">
            <label for="female">Female</label>
            <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender'] == "one"){ echo "checked"; }  ?> value="one"> 
         </div>
         <div id="formF">
            <label for="others">Others</label>
            <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender'] == "two"){ echo "checked"; }  ?> value="two"> 
         </div>
         <p>Select Your Hobbies</p>
         <div id="formG">
            <label for="reading">Reading</label>
            <input type="checkbox" name="visible[]" value="reading" <?php if(isset($_POST['submit']) && isset($_POST['visible'][0])) echo "checked"; ?> >
         </div>
         <div id="formH">
            <label for="travelling">Travelling</label>
            <input type="checkbox" name="visible[]" value="travelling" <?php if(isset($_POST['submit']) && isset($_POST['visible'][1])) echo "checked"; ?> >
         </div>
         <div id="formI">
            <label for="listening">Listening To Music</label>
            <input type="checkbox" name="visible[]" value="listening" <?php if(isset($_POST['submit']) && isset($_POST['visible'][2])) echo "checked"; ?> >
         </div>
         <div id="formJ">
            <label for="singing">Singing</label>
            <input type="checkbox" name="visible[]" value="singing" <?php if(isset($_POST['submit']) && isset($_POST['visible'][3])) echo "checked"; ?> >
         </div>
         <input type="submit" name="submit" value="Submit"></input>
      </form>
   </div>
</body>
</html>