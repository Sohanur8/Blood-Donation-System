<?php
//session_start();
//code here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Blood Donation System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../custom.css">

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Welcome to Blood Donation System</a>
                </div>
            </div>
            <div class="col-md-1"></div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="reqlist.php">Request list</a></li>

                <li>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  </li>
                <li style="background:red; color:white; font-weight: bold;"><a href="logout.php" onclick="">Logout</a></li>

                <script>
                    function lout(){

                    }

                </script>

                <div class="col-md-1">


                </div>
            </ul>

            <div class="col-md-2"></div>
        </div>
    </div>
</nav>


</body>
</html>