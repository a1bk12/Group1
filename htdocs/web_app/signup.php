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

    // Check if email already exists
    $mailquery = "SELECT * FROM credential WHERE email='$email' LIMIT 1";
    $mailchk = mysqli_query($db, $mailquery);
    if (mysqli_num_rows($mailchk) > 0) {
        echo "<script>alert('E-mail already exists. Please use a different email.');</script>";
    } else {
        // Insert user data into the database
        $sql = "INSERT INTO credential (NAME, EMAIL, PHONE, SEX, PASSWORD) VALUES ('$name', '$email', '$phone', '$sex', '$password')";
        $result = mysqli_query($db, $sql);

        if ($result) {
            // Retrieve the max user ID and set a session and cookie
            $sql_uid_q = "SELECT MAX(USERID) AS max_user_id FROM credential";
            $sql_uid_result = mysqli_query($db, $sql_uid_q);
            if ($sql_uid_result && mysqli_num_rows($sql_uid_result) > 0) {
                $row = mysqli_fetch_assoc($sql_uid_result);
                $max_user_id = $row['max_user_id'];
                $_SESSION['login_user'] = $max_user_id;
                setcookie('sql_uid', $max_user_id, time() + 3600, '/');
            }

            // Redirect to the welcome page
            header("location: welcome.php");
            exit();
        } else {
            $msg = "<span class='err'>Registration failed!</span>";
        }
    }
}
?>

<head>
    <title>Signup Page</title>

    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            border: solid 1px #4CAF50; /* Green border color */
            background-color: #fff;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .header {
            background-color: #00008B; /* Green header background */
            color: #FFFFFF;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-container {
            margin: 30px;
        }

        label {
            font-weight: bold;
            font-size: 14px;
            color: #555;
        }

        .box {
            border: #666666 solid 1px;
            padding: 8px;
            width: 100%;
            border-radius: 5px;
            outline: none;
        }

        .radio-container {
            margin-bottom: 20px;
        }

        .radio-label {
            margin-right: 20px;
            color: #555;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #45a049;
        }

        .go-back {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #4CAF50; /* Green link color */
            margin-top: 20px;
        }

        .go-back:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body background="Email_Signature.jpg">

    <div class="container">
        <div class="header"><b>Create Account</b></div>

        <div class="form-container">
            <form action="" method="post">
                <label>Name:</label><br>
                <input type="text" name="name" class="box" required /><br /><br />

                <label>Email:</label><br>
                <input type="email" name="email" class="box" required /><br /><br />

                <label>Phone No:</label><br>
                <input type="text" maxlength="10" name="phone" class="box" required /><br /><br />

                <div class="radio-container">
                    <label class="radio-label">Sex:</label>
                    <input type="radio" name="sex" value="Male" required> Male
                    <input type="radio" name="sex" value="Female" required> Female
                    <input type="radio" name="sex" value="Others" required> Others
                </div>

                <label>Password:</label><br>
                <input type="password" name="password" class="box" required /><br /><br />

                <input type="submit" value="Sign Up" class="submit-button" /><br />
            </form>
        </div>
        <a href="login.php" class="go-back">Go Back</a>
    </div>

</body>

</html>
