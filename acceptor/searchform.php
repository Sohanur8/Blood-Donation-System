<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blood Donation System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 17px;
            
            
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }
        
        input[type=text]:focus {
            width: 100%;
            border-radius: 8px;
        }
        
        .searchform {
            background: rgba(232, 208, 232, 1);
            background: -moz-linear-gradient(left, rgba(232, 208, 232, 1) 0%, rgba(209, 209, 209, 1) 0%, rgba(237, 240, 242, 1) 0%, rgba(116, 216, 227, 1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(232, 208, 232, 1)), color-stop(0%, rgba(209, 209, 209, 1)), color-stop(0%, rgba(237, 240, 242, 1)), color-stop(100%, rgba(116, 216, 227, 1)));
            background: -webkit-linear-gradient(left, rgba(232, 208, 232, 1) 0%, rgba(209, 209, 209, 1) 0%, rgba(237, 240, 242, 1) 0%, rgba(116, 216, 227, 1) 100%);
            background: -o-linear-gradient(left, rgba(232, 208, 232, 1) 0%, rgba(209, 209, 209, 1) 0%, rgba(237, 240, 242, 1) 0%, rgba(116, 216, 227, 1) 100%);
            background: -ms-linear-gradient(left, rgba(232, 208, 232, 1) 0%, rgba(209, 209, 209, 1) 0%, rgba(237, 240, 242, 1) 0%, rgba(116, 216, 227, 1) 100%);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="searchBox" class="searchform">
                    <form action="search.php" method="post">

                        <input type="text" name="keyword" placeholder="Search ..! by Blood Group or Location">


                    </form>
                </div>
            </div>
           
            
        </div>
    </div>
</body>

</html>