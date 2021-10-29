<!-- For Acceptor Registration-->
<?php
include ('../inc/db_config.php');
require_once('../inc/functions.php');
include_once '../classes/Acceptors.class.php';
// Checking for user logged in or not

if (isset($_REQUEST['acceptorRegBtn'])){
    extract($_REQUEST);
    $status = 0;
    $acceptor = new Acceptors();
    $register = $acceptor->acceptor_reg($name, $username, $email, $password, $gender, $bloodGroup, $dob, $mobile, $address, $thana, $district, $zip, $status);
    if ($register) {
        // Registration Success

        echo 'Registration successful';

        redirect('../');
        die();
    } else {
        // Registration Failed
        echo 'Registration failed. Email or Username already exits please try again';
        redirect('../');
        die();
    }
}
?>

<!-- For Acceptor Registration-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <style>

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

        body {




            min-height: 500px;
        }

        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=password],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=email],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=date],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            padding: 15px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 19px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .loginform {
            margin: 10% auto;
            width: 400px;
            min-height: 100px;
            overflow: hidden;
            box-shadow: 0 0 10px #999;
            padding: 20px;
            text-align: center;
        }

        .loginform form input {
            width: 250px;
            margin-top: 15px;
            padding: 7px;
            border: 1px solid #00ccff;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        #p1 {
            color: red;
            font-weight: bold;
        }
        .leftpart{
            margin-top: 5px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 5px;

            background: rgba(255,175,75,1);
            background: -moz-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,175,75,1)), color-stop(100%, rgba(255,146,10,1)));
            background: -webkit-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
            background: -o-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
            background: -ms-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
            background: linear-gradient(to right, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffaf4b', endColorstr='#ff920a', GradientType=1 );

        }
        .topfont{
            margin-top: -50px;
            background: rgba(255,234,94,1);
            background: -moz-linear-gradient(left, rgba(255,234,94,1) 0%, rgba(237,139,3,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,234,94,1)), color-stop(100%, rgba(237,139,3,1)));
            background: -webkit-linear-gradient(left, rgba(255,234,94,1) 0%, rgba(237,139,3,1) 100%);
            background: -o-linear-gradient(left, rgba(255,234,94,1) 0%, rgba(237,139,3,1) 100%);
            background: -ms-linear-gradient(left, rgba(255,234,94,1) 0%, rgba(237,139,3,1) 100%);
            background: linear-gradient(to right, rgba(255,234,94,1) 0%, rgba(237,139,3,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffea5e', endColorstr='#ed8b03', GradientType=1 );
        }
    </style>
    <script>
        function ValidatePersonForm() {

            var name = PersonForm.name;
            var email = PersonForm.email;
            var gender = PersonForm.gender;
            var dob = PersonForm.dob;
            var username = PersonForm.username;
            var pass = PersonForm.password;
            var cpass = PersonForm.cpassword;
            var mobile = PersonForm.mobile;
            var house = PersonForm.address;
            var thana = PersonForm.thana;
            var dist = PersonForm.district;
            var zip = PersonForm.zip;
            var bdgrp = PersonForm.bloodGroup;
            var cbox = PersonForm.tnc;

            if (name.value == "") {
                window.alert("Please enter Person name ");
                name.focus();
                return false;
            }
            if (email.value == "") {
                window.alert("Please enter Email ");
                email.focus();
                return false;
            }


            if (gender.value == "") {
                window.alert("Please Select Gender");
                gender.focus();
                return false;
            }
            if (dob.value == "") {
                window.alert("Please Select Date of Birth");
                dob.focus();
                return false;
            }
            if (username.value == "") {
                window.alert("Please enter person username.");
                username.focus();
                return false;
            }
            if (pass.value == "") {
                window.alert("Please enter password");
                pass.focus();
                return false;
            }
            if (cpass.value == "") {
                window.alert("Please confirm Password");
                cpass.focus();
                return false;
            }

            if (pass.value != cpass.value) {
                window.alert("Password not matched.");
                cpass.focus();
                return false;

            }
            if (mobile.value == "") {
                window.alert("Please enter Contact Number ");
                mobile.focus();
                return false;
            }
            if (thana.value == "") {
                window.alert("Please Select Thana ");
                name.focus();
                return false;
            }
            if (zip.value == "") {
                window.alert("Please enter zip ");
                zip.focus();
                return false;
            }
            var x = zip.value;
            if (isNaN(x)) {
                window.alert("Please enter valid zip ");
                zip.focus();
                return false;

            }
            if (bdgrp.value == "") {
                window.alert("Please enter Blood Group ");
                bdgrp.focus();
                return false;
            }
            if(cbox.checked != true) {
                window.alert("Please Select Agreement");
                cbox.focus();
                return false;
            }

            return true;
        }




    </script>


</head>

<body>


<div class="container" style="padding-top: 100px">
    <div class="row">
        <div class="col-md-12 topfont" style="text-align: center; ">
            <h2> Please Fill Registration Form to find Donor</h2>
        </div>
    </div>
    <div class="row">
        <br>
        <div class="col-md-5 leftpart" style="border: 1px solid #dddddd; ">


            <h3 style="text-align: center;">Registration Form</h3>

            <div>
                <form action="" method="post" name="PersonForm" onsubmit="return ValidatePersonForm();">


                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name"> <br>
                    <label>Email </label>
                    <input type="email" name="email" placeholder="Enter Email"> <br>
                    <label for="gender">Gender</label> <br>
                    <input type="radio" name="gender" value="male"> Male<br>
                    <input type="radio" name="gender" value="female"> Female<br>
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob">
                    <label for="username">username</label>
                    <input type="text" id="username" name="username" placeholder="username"> <br>


                    <label>Password </label>
                    <input type="password" name="password" placeholder=" Enter Password"> <br>
                    <label>Confirm Password </label>
                    <input type="password" name="cpassword" placeholder=" Confirm Password"> <br>

                    <label for="mobile">Mobile</label>
                    <input type="text" id="mobile" name="mobile" placeholder="Your Mobile"> <br>

                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address"> <br>

                    <label>Thana</label>
                    <input type="text" name="thana" placeholder="Thana"> <br>

                    <label>District </label>
                    <input list="district" name="district" type="text">
                    <datalist id="district">
                        <option value="DHAKA">
                        <option value="FARIDPUR">
                        <option value="GOPALGANJ">
                        <option value="GAZIPUR">
                        <option value="JAMALPUR">
                        <option value="KISHOREGONJ">
                        <option value="MADARIPUR">
                        <option value="MANIKGANJ">
                        <option value="MUNSHIGANJ">
                        <option value="MYMENSINGH">
                        <option value="NARAYANGANJ">
                        <option value="NARSINGDI">
                        <option value="NETRAKONA">
                        <option value="RAJBARI">
                        <option value="SHARIATPUR">
                        <option value="SHERPUR">
                        <option value="TANGAIL">
                        <option value="BARGUNA">
                        <option value="BARISAL">
                        <option value="BHOLA">
                        <option value="JHALOKATI">
                        <option value="PATUAKHALI">
                        <option value="PIROJPUR">
                        <option value="BANDARBAN">
                        <option value="BRAHMANBARIA">
                        <option value="CHANDPUR">
                        <option value="CHITTAGONG">
                        <option value="COMILLA">
                        <option value="COX'S BAZAR">
                        <option value="FENI">
                        <option value="KHAGRACHHARI">
                        <option value="LAKSHMIPUR">
                        <option value="NOAKHALI">
                        <option value="RANGAMATI">
                        <option value="BAGERHAT">
                        <option value="CHUADANGA">
                        <option value="JESSORE">
                        <option value="JHENAIDAH">
                        <option value="KHULNA">
                        <option value="KUSHTIA">
                        <option value="MAGURA">
                        <option value="MEHERPUR">
                        <option value="NARAIL">
                        <option value="SATKHIRA">
                        <option value="BOGRA">
                        <option value="CHAPAINABABGANJ">
                        <option value="JOYPURHAT">
                        <option value="PABNA">
                        <option value="NAOGAON">
                        <option value="NATORE">
                        <option value="RAJSHAHI">
                        <option value="SIRAJGANJ">
                        <option value="HABIGANJ">
                        <option value="MAULVIBAZAR">
                        <option value="SUNAMGANJ">
                        <option value="SYLHET">
                        <option value="DINAJPUR">
                        <option value="GAIBANDHA">
                        <option value="KURIGRAM">
                        <option value="LALMONIRHAT">
                        <option value="NILPHAMARI">
                        <option value="PANCHAGARH">
                        <option value="RANGPUR">
                        <option value="THAKURGAON">

                    </datalist> <br>

                    <label>Zip</label>
                    <input type="text" name="zip" placeholder="zip"> <br>



                    <label>Blood Group </label>
                    <input list="bloodgroup" name="bloodGroup" type="text">
                    <datalist id="bloodgroup">
                        <option value="O+">
                        <option value="O-">
                        <option value="A+">
                        <option value="A-">
                        <option value="B+">
                        <option value="B-">
                        <option value="AB+">
                        <option value="AB-">
                    </datalist> <br>


                    <input type="checkbox" name="tnc" value="1">
                    I have accept <u>Terms & Condition </u> <br>


                    <input type="submit" value="Submit" name="acceptorRegBtn">
                </form>
            </div>


        </div>
        <div class="col-md-1"></div>

        <div class="col-md-6" style="border: 1px solid #dddddd">
            <img src="../img/poster.jpg" alt="">

            <!------- promotional or Quote   --->


        </div>
    </div>

</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>




<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>


<?php
include '../common/footer.php';
?>
</body>

</html>