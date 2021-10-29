<?php
include_once('../inc/db_config.php');
include_once '../classes/Request.class.php';
    if(isset($_GET['req_id']) != "") {
        $requestObj = new Request();
        if($requestObj->delByReqId($_GET['req_id'])){
            echo "Blood Donation Request Deleted";
            header("Refresh:3; url=reqlist.php");
            exit(); 
        } else{
            echo "Getting Internal Error, cannot delete Request !";
            header("Refresh:5; url=reqlist.php");
            exit();
        }
    }
    
?>