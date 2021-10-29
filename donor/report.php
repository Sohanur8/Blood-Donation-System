<?php
session_start();
include('../inc/db_config.php');
include_once '../classes/Report.class.php';

if (isset($_GET['report_id'])) {

       if(isset($_POST['createReportBtn'])) {
           $report_id = $_GET['report_id'];
           $pdate = $_POST['pdate'];
           $title = $_POST['title'];
           $details = $_POST['details'];
           $role = $_SESSION['role'];

        $report = new Report();
       if( $report->create_report($report_id, $pdate, $title, $details, $role)){
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

                var title = bloodreq.title;
                var details = bloodreq.details;
                var ddate = bloodreq.pdate;

                if (ddate.value == "") {
                    window.alert("Please Select Date !");
                    ddate.focus();
                    return false;
                }

                if (title.value == "") {
                    window.alert("Please enter Title ! ");
                    title.focus();
                    return false;
                }


                if (details.value == "") {
                    window.alert("Please write details!");
                    details.focus();
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
                        <h3 style="background-color: dodgerblue;  text-align: center;">Report</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 left-part">
                        <form action="" method="post" name="bloodreq" onsubmit="return ValidateReqForm();">
                            <div class="titletext">
                                <h2 style="background-color:#00ccff; text-align: center;">Report Form</h2>
                            </div>
                            <label for="pdate">Date</label>
                            <input type="date" name="pdate" class="inp"> <br>
                            <label for="title">Title</label>
                            <input type="text" name="title" class="inp" placeholder="Title"> <br>
                            <label for="exampleFormControlTextarea1">Details</label>
                            <textarea class="form-control" name= "details" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                            <input type="submit" value="Report" name="createReportBtn" class="btn btn-custom">

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