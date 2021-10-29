<?php
session_start();
include('../inc/db_config.php');
include_once '../classes/Acceptors.class.php';
include_once '../classes/Donors.class.php';
include_once '../classes/Request.class.php';


if (isset($_GET['id'])) {
    $donor_id = $_GET['id'];


       if(isset($_POST['createReqBtn'])) {

           $ddate = $_POST['ddate'];
           $disease = $_POST['disease'];
           $location = $_POST['location'];
           $bbag = $_POST['bbag'];
           $username = $_SESSION['username'];
           $acceptor = new Acceptors();
           $acceptor_id = $acceptor->getAcceptorIdByUserName($username);

        $donationReq = new Request();
       if( $donationReq->create_request($donor_id, $acceptor_id, $ddate, $disease, $location, $bbag )){
        header("Refresh:2; url=index.php");
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

                var disease = bloodreq.disease;
                var bbag = bloodreq.bbag;
                var location = bloodreq.location;
                var ddate = bloodreq.ddate;

                if (ddate.value == "") {
                    window.alert("Please Select Date !");
                    ddate.focus();
                    return false;
                }

                if (disease.value == "") {
                    window.alert("Please enter Disease ! ");
                    disease.focus();
                    return false;
                }


                if (bbag.value == "") {
                    window.alert("Please enter Blood Bag !");
                    bbag.focus();
                    return false;
                }
                if (location.value == "") {
                    window.alert("Please enter location");
                    location.focus();
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
                        <h3 style="background-color: dodgerblue;  text-align: center;">Blood Donation Request</h3>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 left-part">
                        <form action="" method="post" name="bloodreq" onsubmit="return ValidateReqForm();">
                            <div class="titletext">
                                <h2 style="background-color:#00ccff; text-align: center;">Request Form</h2>

                            </div>

                            <label for="ddate">Select date</label>
                            <input type="date" id="ddate" name="ddate" class="inp"> <br>

                            <label for="disease">Disease</label>
                            <input type="text" name="disease" class="inp" placeholder="Disease"> <br>
                            <label for="bbag">Bag</label>
                            <input type="number" name="bbag" class="inp" placeholder="how much bag !"> <br>
                            <label for="location">Location</label>
                            <input type="text" name="location" class="inp" placeholder="Enter Location"> <br>

                            <hr style="height:1px;border:none;color:#333;background-color:#333;" />

                            <?php
                            if (!is_null($donor_id)) {
                                $donorObj = new Donors();
                                $num_row = $donorObj->getDonorInfoByDonorId($donor_id);
                                if (mysqli_num_rows($num_row)) {
                                    while ($donorRow = mysqli_fetch_array($num_row)) {
                            ?>
                                        <label for="dname">Donor Name</label>
                                        <input type="text" name="dname" value="<?php echo $donorRow['name']; ?>" class="inp" disabled> <br>

                                        <label for="">Blood Group</label>
                                        <input type="text" name="bloodgroup" value="<?php echo $donorRow['bloodgroup']; ?>" class="inp" disabled> <br>

                                        <label for="thana">Donor Address</label>
                                        <input type="text" name="daddress" value="<?php echo $donorRow['address']; ?>" class="inp" disabled> <br>
                            <?php
                                    }
                                }
                            } ?>
                            <input type="submit" value="Request" name="createReqBtn" class="btn btn-custom">



                        </form>
                    </div>
                    <div class="col-md-9 right-part">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </body>

    </html>