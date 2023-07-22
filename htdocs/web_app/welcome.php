<?php
	include("config.php");
	session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>User Information</title>

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        h3 {
            margin-bottom: 20px;
            color: #555;
        }

        a {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome!</h1>
        <h3>User Information:</h3>
        <?php

        if (isset($_SESSION['login_user'])) {
            $sql_uid = $_SESSION['login_user'];
            // Assuming you have already established the database connection ($db)
            // Fetch user data from the 'credential' table
            $query = "SELECT * FROM credential WHERE USERID = '$sql_uid'";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['NAME'];
                $email = $row['EMAIL'];
                $phone = $row['PHONE'];
                $sex = $row['SEX'];
                // Display user information in a table
                echo "<table>
                        <tr>
                            <th>UID</th>
                            <td>$sql_uid</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>$name</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <th>Phone No</th>
                            <td>$phone</td>
                        </tr>
                        <tr>
                            <th>Sex</th>
                            <td>$sex</td>
                        </tr>
                    </table>";
            } else {
                echo "User not found in the database.";
            }
        } else {
            echo "SQLUID cookie not set.";
        }

        ?>
        <a href="login.php">Logout</a>
    </div>
</body>

</html>
