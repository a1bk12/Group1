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

<html>
   
   <head>
      <title>Signup Page</title>
      
      <style type="text/css">
         body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
         }
         label {
            font-weight: bold;
            width: 100px;
            font-size: 14px;
         }
         .box {
            border: #666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor="#FFFFFF">
	
      <div align="center">
         <div style="width: 300px; border: solid 1px #333333; " align="left">
            <div style="background-color: #333333; color: #FFFFFF; padding: 3px;"><b>Sign Up</b></div>
				
            <div style="margin: 30px">
               
               <form action="" method="post">
                  <label>Name:</label><input type="text" name="name" class="box" required /><br /><br />
                  <label>Email:</label><input type="email" name="email" class="box" required /><br /><br />
                  <label>Phone No:</label><input type="text" maxlength="10" name="phone" class="box" required /><br /><br />
                  <label>Sex:</label>
                  <input type="radio" name="sex" value="Male" required> Male
                  <input type="radio" name="sex" value="Female" required> Female
				  <input type="radio" name="sex" value="Others" required> Others<br /><br />
                  <label>Password:</label><input type="password" name="password" class="box" required /><br/><br />
                  <input type="submit" value=" Sign Up "><br />
               </form>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
