<?php
session_start();
include('header.php');
include_once('../inc/db_config.php');
include_once('../classes/Request.class.php');
include_once '../classes/Donors.class.php';

$username = $_SESSION['username'];
$donor = new Donors();
$donor_id = $donor->getDonorIdByUserName($username);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Blood Donation System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/custom_demo.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            min-width: 843px;
            margin-top: 3px;
            margin-bottom: 5px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="maincontent">
            <div class="row">
                <div class="col-md-12">
                    <h3 style="background-color: dodgerblue;  text-align: center;">Donation Pending List</h3>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12 right-part">

                    <?php
                    $reqObject = new Request();
                    $select = $reqObject->requestListByDonorId($donor_id);
                    ?>
                    <div class="table-responsive">
                        <table style="width:100%;">

                            <tr bgcolor="#00ccff">
                                <th>Donor Name</th>
                                <th>Contact No.</th>
                                <th>Donation Date</th>
                                <th>Disease</th>
                                <th>Location</th>
                                <th>Blood Bag</th>
                                <th>Report</th>
                                
                            </tr>
                            <?php
                            $num_row = mysqli_num_rows($select);
                            if ($num_row) {
                                while ($userrow = mysqli_fetch_array($select)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $userrow['dname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $userrow['dmobile']; ?>
                                        </td>
                                        <td>
                                            <?php echo $userrow['ddate']; ?>
                                        </td>
                                        <td>
                                            <?php echo $userrow['disease']; ?>
                                        </td>
                                        <td>
                                            <?php echo $userrow['location']; ?>
                                        </td>

                                        <td>
                                            <?php echo $userrow['bloodbag']; ?>
                                        </td>
                                        <td>
<a href="report.php?report_id=<?php echo $userrow['req_id']; ?>" onclick="return confirm('Are you sure you are going to report against this request?');">
    <span class="fa fa-exclamation-triangle" aria-hidden="true" title="Delete"></span></a>

</td>
                                    </tr>
                                <?php } ?>
                        </table>
                    <?php } ?>

                    </div>


                </div>
            </div>
        </div>

    </div>
</body>

</html>