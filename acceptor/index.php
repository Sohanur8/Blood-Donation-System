
<?php
include_once 'header.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Donation System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .search{
            text-align: center;
            width: 100%;
            height: 300px;
            border-radius: 15px;
            background: rgba(183,222,237,1);
            background: -moz-linear-gradient(left, rgba(183,222,237,1) 0%, rgba(89,213,222,1) 20%, rgba(33,180,226,1) 65%, rgba(113,206,239,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(183,222,237,1)), color-stop(20%, rgba(89,213,222,1)), color-stop(65%, rgba(33,180,226,1)), color-stop(100%, rgba(113,206,239,1)));
            background: -webkit-linear-gradient(left, rgba(183,222,237,1) 0%, rgba(89,213,222,1) 20%, rgba(33,180,226,1) 65%, rgba(113,206,239,1) 100%);
            background: -o-linear-gradient(left, rgba(183,222,237,1) 0%, rgba(89,213,222,1) 20%, rgba(33,180,226,1) 65%, rgba(113,206,239,1) 100%);
            background: -ms-linear-gradient(left, rgba(183,222,237,1) 0%, rgba(89,213,222,1) 20%, rgba(33,180,226,1) 65%, rgba(113,206,239,1) 100%);
            background: linear-gradient(to right, rgba(183,222,237,1) 0%, rgba(89,213,222,1) 20%, rgba(33,180,226,1) 65%, rgba(113,206,239,1) 100%);
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 search">
            <h1>Search Your Blood</h1>
            <?php
            include 'searchform.php';
            ?>

        </div>
    </div>
</div>
</body>
</html>