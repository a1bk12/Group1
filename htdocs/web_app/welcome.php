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
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_SESSION['login_user'])) {
        $sql_uid = $_SESSION['login_user'];
		//$sql_uid1=$sql_uid[0];
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
						<th>Sex</th>
                    </tr>
                    <tr>
						<td>$sql_uid</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$phone</td>
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
</body>

</html>
