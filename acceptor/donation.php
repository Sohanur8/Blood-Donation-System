<?php
session_start();
include('../inc/db_config.php');
include_once '../classes/Donation.class.php';
include_once '../classes/Request.class.php';

if (isset($_GET['req_id'])) {

       if(isset($_POST['donationBtn'])) {
           $report_id = $_GET['req_id'];
           $pdate = $_POST['pdate'];
        $donation = new Donation();
        $request = new Request();
       if($request->updateDonationByReqId($_GET['req_id']) &&  $donation->create_donation($report_id, $pdate)){
        header("Refresh:2; url=reqlist.php");
       }
    }
?>
    <!DOCTYPE>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Welcome to Blood Donation System</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/custom_demo.css">

        <script>
            function ValidateReqForm() {
                var ddate = bloodreq.pdate;

                if (ddate.value == "") {
                    window.alert("Please Select Date !");
                    ddate.focus();
                    return false;
                }
                return true;
            }
        </script>

    </head>

    <body>
        <div class="container">
            <div class="maincontent">
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="background-color: dodgerblue;  text-align: center;">Thank you</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 left-part">
                        <form action="" method="post" name="bloodreq" onsubmit="return ValidateReqForm();">
                            <div class="titletext">
                                <h2 style="background-color:#00ccff; text-align: center;">Donation</h2>
                            </div>
                            <label for="pdate">Date</label>
                            <input type="date" name="pdate" class="inp"> <br>
                            <input type="submit" value="Donneted" name="donationBtn" class="btn btn-custom">

                        </form>
                    </div>
                    <?php } ?>
                    <div class="col-md-9 right-part">
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>