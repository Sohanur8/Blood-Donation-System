<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html {
            scroll-behavior: smooth;
        }
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        #navbar {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 60px 10px;
            transition: 0.4s;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 99;
        }

        #navbar a {
            float: left;
            color: black;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        #navbar #logo {
            font-size: 35px;
            font-weight: bold;
            transition: 0.4s;
        }

        #navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        #navbar a.active {
            background-color: dodgerblue;
            color: white;
        }

        #navbar-right {
            float: right;
        }

        @media screen and (max-width: 580px) {
            #navbar {
                padding: 20px 10px !important;
            }
            #navbar a {
                float: none;
                display: block;
                text-align: left;
            }
            #navbar-right {
                float: none;
            }
        }

    </style>
</head>
<body>

<div id="navbar">
    <a href="#home" id="logo" style="text-shadow: 0 0 2px #FF0000;">BDS</a>
    <div id="navbar-right">
        <a class="active" href="#home">Home</a>
        <a href="#donationProcess">Donation Process</a>
        <a href="#whoCanGiveBlood">Who Can Give Blood</a>
        <a href="#whyGiveBlood">Why Give Blood</a>
        <a href="#newsNCampaigns">News & Campaign</a>
        <a href="#contact">Contact Us</a>
    </div>
</div>

<?php
include ('content.php');
?>
<hr>
<?php
include ('footer.php');

?>

<script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("navbar").style.padding = "30px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "60px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }
</script>

</body>
</html>
