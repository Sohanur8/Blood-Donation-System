<?php
session_start();

require_once('../inc/config.php');
require_once('../inc/functions.php');

if (checkAdmin($_SESSION['email'])){
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="#">Menu</a>
    <a href="#">Pages</a>
    <a href="#">Content</a>
</div>

<div id="main">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item active" style="margin-right:40em">
                    <span style="font-size:28px; cursor:pointer" onclick="openNav()">&#9776; </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="donors.php">Donors</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link"  href="acceptors.php">Acceptors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="donation.php">Donation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"   href="report.php">Report</a>
                </li>
            </ul>
            <form action="" method="post" class="form-inline my-2 my-lg-0">
                <a  class="btn btn-outline-danger my-2 my-sm-0" href="../logout.php">Logout</a>
            </form>
        </div>
    </nav>

    <!--    inside index file-->
    <div class="jumbotron">
        <h1 class="display-4">Hello, Admin!</h1>
        <p class="lead">This is simple admin page.</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>

</body>
</html>
<?php
}else{
    redirect('../admin.php');
    die();
}
?>