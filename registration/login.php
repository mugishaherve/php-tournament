<?php
include_once '../backend/config/config.php';

$errorMessage = '';

if (isset($_POST['submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

  if (!$result) {
    echo "Error: " . $mysqli->error;
    exit();
  }

  if ($result->num_rows > 0) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    header("Location: ../../../index/index.php");
    exit();
  } else {
    $errorMessage = "Invalid username or password!";
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="body">
    <div class="heading1">
      <h1>LOGIN</h1>
    </div>

    <div class="form-lay">
      <form onsubmit="return validateform()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-controll">
          <label class="label-lay" for="username">Username</label>
          <input type="text" name="username" id="username" placeholder="Username" required class="input-lay" />
          <span id='idusername' style="color:red;"></span>
        </div>
        <div class="form-controll">
          <label class="label-lay" for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Password" required class="input-lay" />
          <span id='idpassword' style="color:red;"></span>
        </div>
        <div>
          <a class="link-lay" href="signup.php">Create New Account</a>
        </div>

        <div class="btn-lay">
          <input class="btn-log" type="submit" value="Login" name="submit" onclick="validateForm()" />
          <input class="btn-cancel" type="reset" name="cancel" value="Cancel" />
        </div>
      </form>
    </div>
    <?php if (!empty($errorMessage)) : ?>
      <script>
        alert('<?php echo $errorMessage; ?>');
      </script>
    <?php endif; ?>
  </div>
  <script>
    function validateform() {
      /* #######start 1######### */
      var alphanumericExp = /^[a-zA-Z0-9]+$/; //Variable to validate only alphanumerics

      $("span").html("");
      var i = 0;
      /* ########end 1######## */

      if (!document.getElementById("username").value.match(alphanumericExp)) {
        document.getElementById("idusername").innerHTML = "Entered username is not valid....";
        i = 1;
      }
      if (document.getElementById("username").value == "") {
        document.getElementById("idusername").innerHTML = "Username should not be empty....";
        i = 1;
      }
      if (document.getElementById("password").value.length < 3) {
        document.getElementById("idpassword").innerHTML = "Password should contain more than 3 character..";
        i = 1;
      }
      if (document.getElementById("password").value == "") {
        document.getElementById("idpassword").innerHTML = "Password should not be empty....";
        i = 1;
      }
      /* #######start 2######### */
      if (i == 0) {
        return true;
      } else {
        return false;
      }
      /* #######end 2######### */
    }
  </script>
</body>

</html>