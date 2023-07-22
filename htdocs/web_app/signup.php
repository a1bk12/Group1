<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $sex = mysqli_real_escape_string($db, $_POST['sex']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Insert user data into the database
    $sql = "INSERT INTO credential (NAME, EMAIL, PHONE, SEX, PASSWORD) VALUES ('$name', '$email', '$phone', '$sex', '$password')";
    $result = mysqli_query($db, $sql);

    $sql_uid_q = "SELECT MAX(USERID) AS max_user_id FROM credential";
    $sql_uid_result = mysqli_query($db, $sql_uid_q);
    if ($sql_uid_result && mysqli_num_rows($sql_uid_result) > 0) {
        $row = mysqli_fetch_assoc($sql_uid_result);
        $max_user_id = $row['max_user_id'];
        setcookie('sql_uid', $max_user_id, time() + 3600, '/');
    }

    if (isset($_COOKIE['sql_uid'])) {
        $sql_uid_from_cookie = $_COOKIE['sql_uid'];
        echo "Value retrieved from cookie: " . $sql_uid_from_cookie;
    }

    if ($result) {
        header("location: welcome.php");
        exit();
    } else {
        $error = "Error during registration. Please try again later.";
    }
}
?>

<html lang="en">

<head>
    <title>Signup Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
                    <span class="login100-form-title">
                        Sign Up
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your name">
                        <input class="input100" type="text" name="name" placeholder="Name" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your email">
                        <input class="input100" type="email" name="email" placeholder="Email" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your phone number">
                        <input class="input100" type="text" name="phone" placeholder="Phone No" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16">
                        <label for="sex">Sex:</label>
                        <input type="radio" name="sex" value="Male" required> Male
                        <input type="radio" name="sex" value="Female" required> Female
                        <input type="radio" name="sex" value="Others" required> Others
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Please enter a password">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                    </div>
										<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
						</span>
						<a href="#" class="txt2">
						</a>
					</div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Sign Up
                        </button>
                    </div>
                    <div class="flex-col-c p-t-170 p-b-40">
                        <span class="txt1 p-b-9">
                            Already have an account?
                        </span>
                        <a href="login.php">
                            Sign in now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

