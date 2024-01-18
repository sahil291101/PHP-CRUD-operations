<?php session_start(); ?>
<html>

<head>
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        #register-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div id="register-card">
        <a href="index.php">Home</a> <br />
        <?php
        include("connection.php");

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user = $_POST['username'];
            $pass = $_POST['password'];

            if ($user == "" || $pass == "" || $name == "" || $email == "") {
                echo "All fields should be filled. Either one or many fields are empty.";
                echo "<br/>";
                echo "<a href='register.php'>Go back</a>";
            } else {
                mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
                    or die("Could not execute the insert query.");

                echo "Registration successfully";
                echo "<br/>";
                echo "<a href='login.php'>Login</a>";
            }
        } else {
        ?>
            <p><font size="+2">Register</font></p>
            <form name="form1" method="post" action="">
                <table width="75%" border="0">
                    <tr>
                        <td width="10%">Full Name</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>
