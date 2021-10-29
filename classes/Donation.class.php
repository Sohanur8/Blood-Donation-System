<?php
class Donation {
    protected $db;

    public function __construct(){

        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    public function getAllDonationsInfo()
    {
        $sql = "
        SELECT 
               request.req_id as req_id, donors.name as donorName, donors.bloodgroup as donorBloodGroup,
                acceptors.name as acceptorName, request.disease as disease,request.date as plannedDate, request.location as location
        FROM request,donors,acceptors 
        WHERE  
            donors.id = request.donor_id 
            AND acceptors.id = request.acceptor_id
            AND req_id IN (SELECT req_id from donations )
        ";
       return mysqli_query($this->db, $sql);
    }

    function create_donation($req_id, $date){
        $query = "INSERT INTO donations SET req_id ='$req_id', ddate='$date'";
        return mysqli_query($this->db,$query) or die(mysqli_connect_errno()."Data cannot inserted");
    }
}
