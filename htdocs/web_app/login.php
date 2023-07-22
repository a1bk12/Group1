<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($db,$_POST['EmailID']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT USERID FROM credential WHERE EMAIL = '$email' and PASSWORD = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_NUM);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $row[0];
		 
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350px;
        }

        .login-box h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .login-box label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-box input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-box a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #555;
            margin-top: 10px;
        }

        .login-box a:hover {
            color: #444;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2 style="color: #00008B;">Login</h2>
            <form action="" method="post">
                <label>EmailID :</label>
                <input type="text" name="EmailID" required /><br /><br />
                <label>Password :</label>
                <input type="password" name="password" required /><br /><br />
                <input type="submit" value="Submit" /><br />
                <a href="signup.php" style="color: #4CAF50;">Create Account</a>
            </form>
        </div>
    </div>
</body>
</html>