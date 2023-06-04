<?php

if (isset($_POST['submit'])) {

  include('../db-connect/index.php');

  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];


  // Assuming you have already established a database connection using mysqli

  // Prepare the INSERT statement
  $stmt = $mysqli->prepare("INSERT INTO users (name, contact, email, username, password) VALUES (?, ?, ?, ?, ?)");

  // Bind parameters to the prepared statement
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt->bind_param("sssss", $name, $contact, $email, $username, $password);

  // Hash the password using bcrypt


  // Execute the prepared statement
  if ($stmt->execute()) {
    echo "<script>alert('Customer Registration done successfully.');</script>";
    echo "<script>window.location='../backend/registration_backend/login.php';</script>";
  } else {
    // Registration failed
    echo "<script>alert('Failed to Register.');</script>";
    echo $stmt->error;
  }

  // Close the statement and database connection
  $stmt->close();
  $mysqli->close();
} else {

?>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup page</title>
    <link rel="stylesheet" href="signup.css">
  </head>

  <body>
    <div class="body">
      <div class="heading1">
        <h1>Create an Account</h1>
      </div>

      <div class="form-lay">
        <form method="post" name="form2" onsubmit="return validatecustomer()">
          <div class="form-controll">
            <label class="label-lay" for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" required class="input-lay" />
            <span class="errormsg" style="color:red;" id="errcustomer_name"></span>
          </div>
          <div class="form-controll">
            <label class="label-lay label" for="contact">Contact <span class="span-lay">DISCORD</span></label>
            <input type="text" name="contact" id="contact" placeholder="contact" required class="input-lay" />
            <span class="errormsg" style="color:red;" id="errcustomer_discord"></span>
          </div>
          <div class="form-controll">
            <label class="label-lay" for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required class="input-lay" />
            <span class="errormsg" style="color:red;" id="erremail_id"></span>
          </div>
          <div class="form-controll">
            <label class="label-lay" for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required class="input-lay" />
            <span class="errormsg" style="color:red;" id="errcustomer_username"></span>
          </div>
          <div class="form-controll">
            <label class="label-lay" for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required class="input-lay" />
            <span class="errormsg" style="color:red;" id="errpassword"></span>
          </div>
          <div class="form-controll">
            <label class="label-lay" for="password">Password</label>
            <input type="password" name="password" id="cpassword" placeholder="Confirm Password" required class="input-lay" />
            <span class="errormsg" style="color:red;" id="errcpassword"></span>
          </div>
          <div>
            <a class="link-lay" href="login.php">Login using your account</a>
          </div>

          <div class="btn-lay">
            <button type="submit" class="btn btn-log btn-block btn-custom" name="submit" value="Submit">Register</button>
          </div>
        </form>
      </div>
    </div>
    <script>
      function validatecustomer() {
        console.log('validate!!');
        var numericExp = /^[0-9]+$/;
        var alphaExp = /^[a-zA-Z]+$/;
        var alphaSpaceExp = /^[a-zA-Z\s]+$/;
        var alphaNumericExp = /^[0-9a-zA-Z]+$/;
        var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var regexpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
        $('.errormsg').html('');
        var errchk = "False";

        if (document.getElementById("name").value.length > 25) {
          document.getElementById("errcustomer_name").innerHTML = "Customer name not contain less than 15 characters...";
          errchk = "True";
        }
        if (!document.getElementById("name").value.match(alphaSpaceExp)) {
          document.getElementById("errcustomer_name").innerHTML = "Kindly enter valid Customer name..";
          errchk = "True";
        }
        if (document.getElementById("contact").value == "") {
          document.getElementById("errcustomer_discord").innerHTML = "Discord name should not be empty...";
          errchk = "True";
        }
        if (document.getElementById("username").value == "") {
          document.getElementById("errcustomer_username").innerHTML = "User name should not be empty...";
          errchk = "True";
        }
        if (!document.getElementById("username").value.match(alphaSpaceExp)) {
          document.getElementById("errcustomer_username").innerHTML = "Kindly enter valid user name..";
          errchk = "True";
        }
        if (document.getElementById("name").value == "") {
          document.getElementById("errcustomer_name").innerHTML = "Customer name should not be empty...";
          errchk = "True";
        }
        if (!document.getElementById("email").value.match(emailExp)) {
          document.getElementById("erremail_id").innerHTML = "Entered Email ID is not valid....";
          errchk = "True";
        }
        if (document.getElementById("email").value == "") {
          document.getElementById("erremail_id").innerHTML = "Kindly enter Email ID.";
          errchk = "True";
        }

        if (document.getElementById("password").value.length < 8) {
          document.getElementById("errpassword").innerHTML = "Password should contain more than 8 characters...";
          errchk = "True";
        }
        if (document.getElementById("password").value.length > 16) {
          document.getElementById("errpassword").innerHTML = "Password should contain less than 16 characters...";
          errchk = "True";
        }
        /*
        if(!document.getElementById("password").value.match(regexpass))
        {
          document.getElementById("errpassword").innerHTML ="New password should contain at least one digit, one lower case, one upper case and 8 characters....";
          errchk = "True";
        }
        */
        if (document.getElementById("password").value == "") {
          document.getElementById("errpassword").innerHTML = "New password should not be empty....";
          errchk = "True";
        }
        if (document.getElementById("cpassword").value != document.getElementById("password").value) {
          document.getElementById("errcpassword").innerHTML = "Confirm password Must match with new password..";
          errchk = "True";
        }
        if (document.getElementById("cpassword").value == "") {
          document.getElementById("errcpassword").innerHTML = "Confirm Password should not be empty....";
          i = 1;
        }
        /*
        if(document.getElementById("mobile_no").value.length != 13)
        {
          document.getElementById("errmobile_no").innerHTML="Mobile Number should contain 10 digits..";
          errchk = "True";
        }
        */

        if (errchk == "True") {
          return false;
        } else {
          return true;
        }
      }
      /*
      $("#mobile_no").keydown(function(e) {
        var oldvalue=$(this).val();
          var field=this;
          setTimeout(function () {
            if(field.value.indexOf('+91') !== 0) {
              $(field).val(oldvalue);
            } 
          }, 1);
      });
      */
      function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
        }
        return true;
      }
    </script>
  <?php
}
  ?>
  </body>

  </html>