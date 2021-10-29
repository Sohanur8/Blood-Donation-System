<?php
session_start();

require_once('inc/config.php');
require_once('inc/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];
    // echo "email"+ $email + $password

    // compare with data store
    if (authenticate_user($email, $password)) {
        $_SESSION['email'] = $email;
        redirect('admin/');
        die();
    } else {
        $status = "The provided crendentials didn't not work";
    }


    if ($email == false) {
        $status = 'Please enter a valid email address';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to MealManagement System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            background: url(img/adminbg.jpg);
            background-size: cover;
        }

        .main {
            width: 300px;
            min-height: 150px;
            overflow: hidden;
            margin: 9% auto;
            padding: 15px;
            background: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px #fff;
            text-align: center;
        }

        .main .personLogo img {
            padding: 5px;
            width: 100px;
            height: 100px;
            border-radius: 100%;
            background: green;
        }

        .main form {
            text-align: center;
        }

        .main form .inp {
            width: 250px;
            margin-top: 15px;
            padding: 7px;
            border: 1px solid #FE6347;
        }

        .main form .inp:focus {
            box-shadow: 0 0 5px #449D44;
            border: 1px solid #449D44;
        }

        .main form .btn-custom {
            width: 250px;
            margin-top: 15px;
            border-radius: 0;
            font-size: 13pt;
            background: #FE6347;
            color: #fff;
        }

        .main form .btn-custom:hover {
            background: #449D44;
        }
    </style>

</head>

<body>
    <div class="main">

        <div class="personLogo">
            <img src="img/women.jpg" alt="personLogo">
        </div>

        <form action="" method="post">
            <input type="text" name="username" id="user" class="inp" placeholder="Username"><br>
            <input type="password" name="password" id="pass" class="inp" placeholder="Password"><br>
            <p style="color: red"><?php
                                    if (isset($status)) {
                                        echo $status;
                                    }
                                    ?></p>
            <button type="submit" value="btn" class="btn btn-custom" name="lgBtn">Login</button>

        </form>

    </div>
</body>

</html>