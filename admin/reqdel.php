<?php
    if(isset($_GET['donor_id']) != "") {
        echo $_GET['donor_id'];
        // $delete = mysqli_query($connection, "DELETE FROM request WHERE req_id= '$delete'");
        // if($delete) {
        //     header("Refresh:1; url=donors.php");
        //         exit(); 
        // } else {
        //     echo mysqli_error($connection);
        // }
    }
    if(isset($_GET['seeker_id']) != "") {
        echo $_GET['seeker_id'];
        // $delete = mysqli_query($connection, "DELETE FROM request WHERE req_id= '$delete'");
        // if($delete) {
        //     header("Refresh:1; url=donors.php");
        //         exit(); 
        // } else {
        //     echo mysqli_error($connection);
        // }
    }
    
?>