  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup page</title>
    <link rel="stylesheet" href="../../registration/signup.css">
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
            <a class="link-lay" href="login.html">Login using your account</a>
          </div>

          <div class="btn-lay">
            <button type="submit" class="btn btn-log btn-block btn-custom" name="submit" value="Submit">Register</button>
          </div>
        </form>
      </div>
    </div>





    <?php
    include_once '../config/config.php';


    $name = $email = $password = $username = $contact = '';
    $name_err = $email_err = $password_err = $username_err = $contact_err = '';

    if (isset($_POST['submit'])) {
      if (empty($_POST['name'])) {
        $name_err = 'Name is required';
      } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }

      if (empty($_POST['email'])) {
        $email_err = 'Email is required';
      } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      }

      if (empty($_POST['username'])) {
        $username_err = 'Username is required';
      } else {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }

      if (empty($_POST['contact'])) {
        $contact_err = 'Contact is required';
      } else {
        $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }

      if (empty($_POST['password'])) {
        $password_err = 'Password is required';
      } else {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
      if (empty($name_err) && empty($email_err) && empty($password_err && empty($username_err) && empty($contact_err))) {
        $sql = "INSERT INTO users (name, contact, email, username, password) VALUES ('$name', '$contact', '$email', '$username', '$password')";
        if (mysqli_query($conn, $sql)) {
          session_start();
          $_SESSION["username"] = $username;
          $_SESSION["email"] = $email;
          header('Location: ../../../index/index.php');
          exit();
        } else {
          echo 'Error: ' . mysqli_error($conn);
        }
      }
    }
    ?>

  </body>

  </html>