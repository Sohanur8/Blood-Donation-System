<?php
class Request

{
    protected $db;

    public function __construct(){

        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    function create_request($donor_id, $acceptor_id, $date, $disease, $location, $bloodbag){
        $query = "INSERT INTO request SET donor_id ='$donor_id', acceptor_id='$acceptor_id', 	date='$date',	disease='$disease',	location='$location',	bloodbag='$bloodbag'";

        return mysqli_query($this->db,$query) or die(mysqli_connect_errno()."Data cannot inserted");
    }


    public function requestListById($req_id)
    {
        $sql = "select request.req_id,donors.name as dname,donors.mobile as dmobile,request.date as ddate ,request.disease as disease,request.location as location,request.bloodbag as bloodbag, acceptors.name as aname, acceptors.email as aemail,acceptors.gender as agender, acceptors.mobile as amobile, acceptors.address as aaddress from donors,request,acceptors where request.donor_id = donors.id
        and acceptors.id = request.acceptor_id AND request.status = '0'
        and request.req_id = '".$req_id."' ";
        return mysqli_query($this->db, $sql);
    }

    public function requestListByAccepterId($act_id)
    {
        $sql = "select request.req_id,donors.name as dname,donors.mobile as dmobile,request.date as ddate ,request.disease as disease,request.location as location,request.bloodbag as bloodbag from donors,request,acceptors where request.donor_id = donors.id
        AND request.status = '0' and acceptors.id =  '".$act_id."' ";
        return mysqli_query($this->db, $sql);
    }

    public function requestListByDonorId($d_id)
    {
        $sql = "select request.req_id,donors.name as dname,donors.mobile as dmobile,request.date as ddate ,request.disease as disease,request.location as location,request.bloodbag as bloodbag from donors,request,acceptors where 
        request.acceptor_id = acceptors.id
        AND request.status = '1' and donors.id =  '".$d_id."' ";
        return mysqli_query($this->db, $sql);
    }

    public function delByReqId($id)
    {
        $sql = "DELETE FROM request where req_id = '".$id."' ";
        return mysqli_query($this->db, $sql);
    }

    public function updatePendingByReqId($id)
    {
        $sql = "UPDATE request set status = '1' where req_id = '".$id."' ";
        return mysqli_query($this->db, $sql);
    }

    public function donationListByDonorId($d_id)
    {
        $sql = "select request.req_id as req_id,donors.name as dname,donors.mobile as dmobile,request.date as ddate ,request.disease as disease,request.location as location,request.bloodbag as bloodbag from donors,request,acceptors where 
        request.acceptor_id = acceptors.id
        AND request.status = '2' and donors.id =  '".$d_id."'  AND req_id IN (SELECT req_id FROM donations )";
        return mysqli_query($this->db, $sql);
    }

    public function updateDonationByReqId($id)
    {
        $sql = "UPDATE request set status = '2' where req_id = '".$id."' ";
        return mysqli_query($this->db, $sql);
    }

}