<?php
session_start();
include ('inc/db_config.php');
require_once('inc/functions.php');
include_once 'classes/Donors.class.php';
include_once 'classes/Acceptors.class.php';


if (isset($_REQUEST['donorLgBtn'])){
    extract($_REQUEST);
    $donor = new Donors();
    $login = $donor->check_login($username,$password);
    if ($login) {
        // Registration Success

        $_SESSION["username"] = $username;
        echo 'Login successful';
        redirect('donor/');
        die();
    } else {
        // login Failed
        $status = "The provided crendentials didn't not work";

    }
}

if (isset($_REQUEST['acceptorLgBtn'])){
    extract($_REQUEST);
    $acceptor = new Acceptors();
    $login = $acceptor->check_login($username,$password);
    if ($login) {
        //Login Success

        $_SESSION["username"] = $username;
        echo 'Login successful';
        redirect('acceptor/');
        die();
    } else {
        // login Failed
        $status = "The provided crendentials didn't not work";

    }
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
            width: 5%;
        }

        #myBtn:hover {
            background-color: #555;
        }
        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            color: black;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .lgBtnx {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            float: left;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .containerx {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 40%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .lgBtnx {
                width: 100%;
            }
        }

        .boxtext{
            color: #0099cc;
            font-weight: bold;
            font-size: 30px;

        }

        .insidebox{
            padding: 27px;
            height: 200px;
            border: 1px solid #4dc3ff;
            border-radius: 10px;
            margin-top: 35px;
            position: relative;

        }
        .numtext{

            background-color: rgba(204,0,0,0.5);
            height: 150px;
            width: 30px;
            float:right;
            position: absolute;
            text-align: center;
        }


    </style>


</head>
<body>
<div class="container-fluid">

    <div class="col-md-1"> </div>
    <div class="col-md-10">

<!--    Home Section Started -->
        <div id="home" style=" margin-top:170px;">
            <!--        Start slide Show-->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="img/1.jpg" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Blood Donation event</h3>
                            <p>Campaign Blood Donation Event to increase people Awareness !</p>

                        </div>
                    </div>

                    <div class="item">
                        <img src="img/7.jpg" alt="Chicago" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Blood Donation event</h3>
                            <p>Campaign Blood Donation Event to increase people Awareness !</p>

                        </div>
                    </div>

                    <div class="item">
                        <img src="img/9.jpg" alt="New York" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Blood Donation event</h3>
                            <p>Campaign Blood Donation Event to increase people Awareness !</p>

                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!--       End slide show -->
            <div class="row">

                <div class="col-md-3">
                    <div class="insidebox">

                        <div style="text-align: center"> <span class="boxtext"> Searching Blood </span></div>

                        <div style="text-align: center"><span> <img src="img/blue-question.png" alt="Search for Blood"></span></div>
                       <div>&nbsp;</div>
                        <!--  Start -->
                        <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Find Donor</button>

                        <div id="id01" class="modal">

                            <form class="modal-content animate"  method="post" action="">

                                <button type="button" class="lgBtnx">
                                    <a href="acceptor/register.php" style="text-decoration:none; color: white;">Register </a></button>

                                <div class="imgcontainer">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <img src="img/women.jpg" alt="Avatar" class="avatar">
                                </div>

                                <div class="containerx">
                                    <label><b>Username</b></label>
                                    <input type="text" placeholder="Enter Username" name="username" required>

                                    <label><b>Password</b></label>
                                    <input type="password" placeholder="Enter Password" name="password" required>

                                    <p style="color: red"><?php
                                        if (isset($status)) {
                                            echo $status;
                                        }
                                        ?></p>
                                    <button type="submit" name="acceptorLgBtn">Log in</button>




                                </div>


                            </form>
                        </div>

                        <script>
                            // Get the modal
                            var modal = document.getElementById('id01');

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>

<!--                        End of Modal -->

                    </div>

                </div>


                <div class="col-md-3">
                    <div class="insidebox">
                        <div style="text-align: center"> <span class="boxtext"> Become a Donor </span></div>
                        <div style="text-align: center" ><span> <img src="img/green-tick.png" alt=" Become a donor"></span></div>
                        <div>&nbsp;</div>
                        <form action="log_reg.php">
                            <a class="btn btn-success"  href="donor/register.php" style="width: 100%">Register Now</a>
                        </form>
                    </div>

                </div>

    <!--start with modal-->

                <div class="col-md-3">
                    <div class="insidebox">
                        <div style="text-align: center"> <span class="boxtext"> Already a Donor </span></div>

                        <div style="text-align: center"><span> <img src="img/blue-question.png" alt=""></span></div>
                        <div>&nbsp;</div>
                        <!--  Start -->
                        <button class="btn btn-primary" onclick="document.getElementById('id02').style.display='block'">login</button>
                        <div id="id02" class="modal">
                            <form class="modal-content animate"  method="post" action="">
                                <div class="imgcontainer">
                                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <img src="img/women.jpg" alt="Avatar" class="avatar">
                                </div>
                                <div class="containerx">
                                    <label><b>Username</b></label>
                                    <input type="text" placeholder="Enter Username" name="username" required>

                                    <label><b>Password</b></label>
                                    <input type="password" placeholder="Enter Password" name="password" required>
                                    <p style="color: red"><?php
                                        if (isset($status)) {
                                            echo $status;
                                        }
                                        ?></p>
                                    <button type="submit" name="donorLgBtn">Log in</button>
                                </div>
                            </form>
                        </div>

                        <script>
                            // Get the modal
                            var modal = document.getElementById('id02');

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>

                        <!--  End -->
                    </div>

                </div>
        <!--end of modal-->

                <div class="col-md-3">
                    <div class="insidebox">
                        <div style="text-align: center"> <span class="boxtext"> Who Give Blood </span></div>
                        <div style="text-align: center"><span> <img src="img/green-tick.png" alt="Who give blood"></span></div>
                        <div>&nbsp;</div>

                        <form action="log_reg.php">
                            <a class="btn btn-success"  href="#whyGiveBlood" style="width: 100%">Check</a>
                        </form>
                    </div>

                </div>

            </div>

            </div>
        <div>&nbsp;</div>
<!--        <div>&nbsp;</div>-->

<!--Home Section End -->

<!--        Donation Process Section Started -->
        <div id="donationProcess">
            <!--  Donation Process Start -->
            <div class="row">
                <div class="col-md-12">
                    <span><h2 style="text-align: center;">Donation Process <i style="color:#ff9999" class="fa fa-cog fa-spin fa-fw"></i></h2> </span>
                    <div style="text-align: center;">The donation process from the time you register until the time you donate</div>
                </div>
            </div>
            <div style="text-align: center" class="row">
                <div class="col-md-3">

                    <div class="insidebox">

                        <img src="img/Online%20registration%20photo.jpg" alt="" width="200px" height="150px" style="border: 1px solid #ffb3b3;">


                        <span class="numtext"><h3>1</h3></span>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="insidebox">

                        <img src="img/loc.png" alt="" width="200px" height="150px" style="border: 1px solid #ffb3b3;">
                        <span class="numtext"><h3>2</h3></span>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="insidebox">

                        <img src="img/meetwithperson.jpg" alt="" width="200px" height="150px" style="border: 1px solid #ffb3b3;">
                        <span class="numtext"><h3>3</h3></span>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="insidebox">

                        <img src="img/cartoon_donation.png" alt="" width="200px" height="150px" style="border: 1px solid #ffb3b3;">
                        <span class="numtext"><h3>4</h3></span>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <h3 style="text-align: center; font-weight: bold; ">Registration</h3>
                    <p>You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process.</p>
                </div>
                <div class="col-md-3">
                    <h3 style="text-align: center; font-weight: bold; ">Find Donor</h3>
                    <p>Find Donor by our website find donor option. You can find doner on your nearest location with search by location filter result with blood .</p>
                </div>
                <div class="col-md-3">
                    <h3 style="text-align: center; font-weight: bold; ">Contact with Donor</h3>
                    <p>You need to ask donor for blood donation. You need to manage him with your hospital location and time.</p>
                </div>
                <div class="col-md-3">
                    <h3 style="text-align: center; font-weight: bold; ">Donation</h3>
                    <p>After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes.</p>
                </div>
            </div>
            <!--  Donation Process End -->

        </div>

<!--        Donation Process Section End -->

<!--        Who Can Give Blood Section start-->
        <div id="whoCanGiveBlood">
            <div class="row">
                <div class="col-md-12">
                    <span><h2 style="text-align: center;">Who Can Give Blood <i style="color:#ff9999" class="fa fa-question fa-spin fa-fw"></i></h2> </span>
                    <div style="text-align: center;">Check you are able to give blood</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>Most people can give blood. You can give blood if you:</h3>
                    <div>
                        <ul>
                            <li>are fit and healthy</li>
                            <li>weigh between 7 stone 12 lbs and 25 stone, or 50kg and 160kg</li>
                            <li>weigh between 7 stone 12 lbs and 25 stone, or 50kg and 160kg</li>
                            <li>are over 70 and have given blood in the last two years</li>

                        </ul>
                    </div>
                    <div>
                        <h3>How often can I give blood?</h3>
                    </div>
                    <div>Men can give blood every 12 weeks and women can give blood every 16 weeks. </div>
                    <div>
                        <h3>Check you are able to give blood</h3>
                        <h4>The common reasons donors should check if they can give blood are:
                        </h4>
                    </div>
                    <div>
                        <ul>
                            <li>if you are receiving medical or hospital treatment</li>
                            <li>if you are taking medication</li>
                            <li>after travelling outside of the UK</li>
                            <li>after having a tattoo or piercing</li>
                            <li>during and after pregnancy</li>
                            <li>if you feel ill</li>
                            <li>if you have cancer</li>
                            <li>after receiving blood, blood products or organs.</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Male and female donors</h3>
                        <h5>Men often make ideal donors because:</h5>
                    </div>
                    <div>
                        <ul>
                            <li>men’s additional body weight means they have suitable iron levels</li>
                            <li>they are less likely than women to carry certain immune cells meaning their plasma is more widely usable for transfusions</li>
                            <li>their platelet count is typically higher meaning they are more likely to be accepted as platelet donors.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="img/donation.jpg" alt="" width="400px" height="480px">
                </div>

            </div>

        </div>
        <!--        Who Can Give Blood Section End-->
        <div>&nbsp;</div>
<!--    Why Give Blood Section Started -->
        <div id="whyGiveBlood">

            <div class="row">
                <div class="col-md-12">
                    <span><h2 style="text-align: center;">Why Give Blood <i style="color:#ff9999" class="fa fa-cog fa-spin fa-fw"></i></h2> </span>
                    <div style="text-align: center;">Giving blood saves lives. The blood you give is a lifeline in an emergency and for people who need long-term treatments.</div>
                    <div style="text-align: center;">Many people would not be alive today if donors had not generously given their blood.</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div> <h3>Why we need you to give blood</h3></div>
                    <ul>
                        <li>Your Blood can save one's life</li>
                        <li>We need over 6,000 blood donations every day to treat patients in need across Bangladesh. Which is why there’s always a need for people to give blood.</li>
                        <li>Most people between the ages of 17-65 are able to give blood.</li>
                    </ul>

                </div>
                <div class="col-md-4"></div>

            </div>

        </div>
        <hr>
<!--Why Give Blood Section End -->

<!--News & Campaigns Section Started -->
        <div id="newsNCampaigns">

            <div class="row">
                <div class="col-md-12">
                    <span><h2 style="text-align: center;">News & Campaigns<i style="color:#53ff1a" class="fa fa-cog fa-spin fa-fw"></i></h2> </span>
                    <div style="text-align: center;">Several events held to aware people about Blood Donation.</div>

                </div>
            </div>

            <div class="container">
                <div class="mySlides">
                    <div class="numbertext">1 / 6</div>
                    <img src="img/1.jpg" style="width:100%; height: 400px">
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                    <img src="img/2.jpg" style="width:100%; height: 400px">
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                    <img src="img/3.jpg" style="width:100%; height: 400px">
                </div>

                <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                    <img src="img/4.jpg" style="width:100%; height: 400px">
                </div>

                <div class="mySlides">
                    <div class="numbertext">5 / 6</div>
                    <img src="img/5.jpg" style="width:100%; height: 400px">
                </div>

                <div class="mySlides">
                    <div class="numbertext">6 / 6</div>
                    <img src="img/6.jpg" style="width:100%; height: 400px">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                <div class="caption-container">
                    <p id="caption"></p>
                </div>

                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="img/1.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/6.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
                    </div>
                </div>
            </div>

            <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("demo");
                    var captionText = document.getElementById("caption");
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                    captionText.innerHTML = dots[slideIndex-1].alt;
                }
            </script>


            </div>
        <hr>

        &nbsp;
        &nbsp;

<!--News and Campain Section End -->


<!--Contact US Section Started -->

        <div id="contact">
            <div class="row">
                <div class="col-md-12">


                    <div style="text-align: center;">&nbsp;</div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <img src="img/women.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <div> <h2><i style="color:blueviolet" class="fa fa-address-card fa-fw"></i>Message</h2></div>
                    <form>

                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" id="usr" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> I accept Terms & Condition</label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>


        </div>



    </div>


<!--    contact US section End -->


    <div class="col-md-1"></div>






</div>




</body>
</html>