<?php
   // Assuming the "config.php" file is properly included and the database connection is established in that file.
   include("config.php");
   session_start();
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db, $_POST['userid']);
      $mypassword = mysqli_real_escape_string($db, $_POST['password']); // Updated to match the input field name
      
      // Using prepared statements to prevent SQL injection
      $sql = "SELECT * FROM credential WHERE USERID = ? AND PASSWORD = ?";
      $stmt = mysqli_prepare($db, $sql);
      mysqli_stmt_bind_param($stmt, "ss", $myusername, $mypassword);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if ($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: welcome1.php");
         setcookie('sql_uid', $myusername, time() + 3600, '/');
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html lang="en">
<head>
	<title>Login V8</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="">
					<span class="login100-form-title">
						Sign In
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter userid">
						<input class="input100" type="text" name="userid" placeholder="UserID">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
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
							Sign in
						</button>
					</div>
					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>
						<a href="signup.php">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>
