<?php
include('header.php');
include_once '../classes/Donors.class.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">List of Donors</h1>
                <p class="lead">This page will show list of donors</p>
            </div>
        </div>
        <!--    table start-->
        <table id="table_id" class="table table-striped table-bordered shadow-sm p-3 mb-5 bg-white rounded" style="width:100%">
            <thead>
                <tr bgcolor="#00ccff">
                    <th class="th-sm">Name

                    </th>
                    <th class="th-sm">Username

                    </th>
                    <th class="th-sm">Email

                    </th>
                    <th class="th-sm">Gender

                    </th>
                    <th class="th-sm">Blood Group

                    </th>
                    <th class="th-sm">Address

                    </th>
                    <th class="th-sm">Last Donation Date

                    </th>
                    <th class="th-sm">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $donor = new Donors();
                $num_row = $donor->getAllDonorInfo();

                if ($num_row) {
                ?>
                    <?php while ($userrow = mysqli_fetch_array($num_row)) { ?>
                        <tr>
                            <td> <?php echo $userrow['name']; ?> </td>
                            <td> <?php echo $userrow['username']; ?> </td>
                            <td><?php echo $userrow['email']; ?></td>
                            <td><?php echo $userrow['gender']; ?></td>
                            <td><?php echo $userrow['bloodgroup']; ?></td>
                            <td><?php echo $userrow['address']; ?></td>
                            <td><?php echo $userrow['lastdonationdate']; ?></td>
                            <td>

                                <a href="reqdel.php?donor_id=<?php echo $userrow['id']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                                    <span class="fa fa-trash-o" aria-hidden="true" title="Delete"></span></a>

                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>

        <!--    table end-->


    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

</body>

</html>