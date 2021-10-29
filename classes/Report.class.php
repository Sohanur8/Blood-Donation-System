<?php
class Report

{
    protected $db;

    public function __construct(){

        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    function create_report($req_id, $date, $title, $details, $ReportByRole){
        $query = "INSERT INTO report SET req_id ='$req_id', date='$date', 	title='$title',	details='$details', ReportByRole = '$ReportByRole'";
        return mysqli_query($this->db,$query) or die(mysqli_connect_errno()."Data cannot inserted");
    }

}