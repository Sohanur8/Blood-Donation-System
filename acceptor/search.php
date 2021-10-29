<?php

include 'header.php';
include('../inc/db_config.php');
include('../classes/Donors.class.php');

$key = $_POST['keyword'];
//echo $key;
if($key){
    $donor = new Donors();
    $donorList = $donor->getDonorList($key);
//    $select = mysqli_query($connection, "SELECT d_id,name,email,gender,mobile,thana,bg,ldbd FROM `donorinfo` WHERE bg LIKE '%".$key."%' or thana LIKE '%".$key."%'");
    $num_row = mysqli_num_rows($donorList);

  if( $num_row ) {
}

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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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
        .srchagain{
            text-align: center;
            width: 100%;
            height: 120px;
        }
    </style>
</head>
<body>
  
  <div class="container">
 
  <div class="row">
    <div class="col-md-12 srchagain">
     <h2>Search Again</h2>
      <?php include 'searchform.php'; ?>
      </div>
      <div class="col-md-12 right-part">
         <div class="table-responsive">
                            <table style="width:100%;">

                                <tr >
                                    
                                    
                                    
                               <h1 style="text-align: center; background-color: #00ccff; ">Blood Donor List </h1>


                                </tr>
                                 </table>
                                <?php while( $userrow = mysqli_fetch_array($donorList) ) { ?>
                                
                                    
    <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#change_button_label_' . $userrow['id'] ?>"><?php echo $userrow['name']; ?> | <?php echo $userrow['bloodgroup'];?> | <?php echo $userrow['thana']; ?> </a>
        </h4>
      </div>
      <div id="<?php echo 'change_button_label_' . $userrow['id'] ?>" class="panel-collapse collapse">
        <div class="panel-body">
            <?php echo $userrow['email']; ?> |
                                    
                                        <?php echo $userrow['gender']; ?> |
                                    
                                        <?php echo "Last Donation Date : ".$userrow['lastdonationdate']; ?> |
                  
                  <a href="makereq.php?id=<?php echo $userrow['id']; ?>" onclick="return confirm('Are you sure you request for Blood ?');">
                      <span class="fa fa-user-plus" aria-hidden="true" title="Request">Request</span></a>
            
            
        </div>
      </div>
    </div>
    
  </div>
       
                                    
                                
                                <?php } ?>
                           
                            <?php } ?>

                        </div>
          
          
      </div>
  </div>
  
   
   
</div>
</body>
</html>