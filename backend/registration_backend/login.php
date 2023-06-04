<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../../registration/login.css">
</head>

<body>
    <div class="body">
        <div class="heading1">
            <h1>LOGIN</h1>
        </div>

        <div class="form-lay">
            <form onsubmit="return validateform()" method="post" name="form2">
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
                    <!-- <input class="btn-log" type="submit" value="Login" name="submit" onclick="validateForm()" /> -->
                    <button type="submit" class="btn-log" name="submit" value="Submit" onclick="validateForm()">Login</button>
                    <input class="btn-cancel" type="reset" name="cancel" value="Cancel" />
                </div>
            </form>
        </div>
        <?php
        include '../config/config.php';

        if (isset($_POST['submit'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

            if (!$result) {
                echo "Error: " . $conn->error;
                exit();
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $email = $row['email'];

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                header("Location: ../../../index/index.php");
                exit();
            } else {
                echo '<p>Invalid username or password</p>';
            }
        }
        ?>


</body>

</html>