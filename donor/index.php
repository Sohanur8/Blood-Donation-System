<?php
session_start();
include_once('../inc/db_config.php');
require_once('../inc/functions.php');
include_once '../classes/Donors.class.php';
include_once '../classes/Acceptors.class.php';
include('header.php');
if ($_SESSION['role'] == "donor"){
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
                <h3 style="background-color: dodgerblue;  text-align: center;">Requested Seeker Information</h3>

            </div>

        </div>



        <div class="row">

            <div class="col-md-12 right-part">

                <?php
                $username = $_SESSION['username'];
                $donor = new Donors();
                $acceptor = new Acceptors();
                $d_id = $donor->getDonorIdByUserName($username);
                $num_row = $acceptor->getAcceptorById($d_id);
?>

                <div class="table-responsive" >
                    <table style="width:100%;">

                        <tr bgcolor="#00ccff">
                            <th>Accept</th>
                            <th>Name</th>
                            <th>Seeker Address</th>
                            <th>Contact No.</th>
                            <th>Donation Date</th>
                            <th>Disease</th>
                            <th>Location</th>
                            <th>Blood Bag</th>
                            <th style="color:red;">Delete</th>

                        </tr>
                        <?php if( $num_row ) {
                            ?>
                        <?php while( $userrow = mysqli_fetch_array($num_row) ) { ?>
                            <tr>

                                <td>

                                    <a href="pending.php?req_id=<?php echo $userrow['req_id']; ?>" onclick="return confirm('Are you sure you wish to Give Blood ?');">
                                        <span class="fa fa-check-circle-o" aria-hidden="true" title="Accept"></span></a>
                                </td>
                                <td>
                                    <?php echo $userrow['name']; ?>
                                </td>
                                <td>
                                    <?php echo $userrow['address']; ?>
                                </td><td>
                                    <?php echo $userrow['mobile']; ?>
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

                                    <a href="reqdel.php?req_id=<?php echo $userrow['req_id']; ?>" onclick="return confirm('Are you sure you want to delete Request ?');">
                                        <span class="fa fa-trash-o" aria-hidden="true" title="Delete"></span></a>

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

<?php
}else{
    redirect('../');
    die();
}
?>