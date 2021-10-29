<?php

class Acceptors
{
    protected $db;

    private $id;
    private $name;
    private $username;
    private $email;
    private $password;
    private $gender;
    private $bloodGroup;
    private $dob;
    private $mobile;
    private $address;
    private $thana;
    private $district;
    private $zip;
    private $status;


    public function __construct(){

        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }


    public function acceptor_reg($name, $username, $email, $password, $gender, $bloodGroup, $dob, $mobile, $address,$thana, $district, $zip, $status)
    {
        // check username and email duplication
        $checkUser = "SELECT * FROM acceptors WHERE username ='$username' OR email = '$email'";
        $check =  $this->db->query($checkUser) ;
        $count_row = $check->num_rows;

        if ($count_row == 0){

            $query = "INSERT INTO acceptors SET name ='$name', username='$username', 	email='$email',	password='$password',	gender='$gender',	bloodgroup='$bloodGroup',	dob='$dob',	mobile='$mobile',	address='$address',	thana='$thana',	district='$district',	zip='$zip',	status='$status'";

            $result = mysqli_query($this->db,$query) or die(mysqli_connect_errno()."Data cannot inserted");

            return true;
        }else{
            return false;
        }

    }

    /*** for login process ***/
    public function check_login($username, $password){


        $sql2="SELECT id from acceptors WHERE username='$username' or email ='$username' and password='$password'";

        //checking if the username is available in the table
        $result = mysqli_query($this->db,$sql2);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['role'] = "acceptor";

            return true;
        }
        else{
            return false;
        }
    }

    public function getAllAcceptorsInfo()
    {
        $sql = " select * from acceptors ";
       return mysqli_query($this->db, $sql);
    }


    public function getAcceptorIdByUserName($username)
    {
        $sql = " select * from acceptors where username ='".$username."' ";
        $result = $this->db->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
       return $row["id"];
    }

    public function getAcceptorById($d_id)
    {
        return mysqli_query($this->db, "select req_id,acceptors.name as name,acceptors.address as address,acceptors.mobile as mobile,request.date as ddate,disease,location,request.bloodbag as bloodbag from acceptors,request where request.acceptor_id = acceptors.id
        AND  request.donor_id = '".$d_id."';");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBloodGroup()
    {
        return $this->bloodGroup;
    }

    /**
     * @param mixed $bloodGroup
     */
    public function setBloodGroup($bloodGroup)
    {
        $this->bloodGroup = $bloodGroup;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


    /**
     * @return mixed
     */
    public function getThana()
    {
        return $this->thana;
    }

    /**
     * @param mixed $thana
     */
    public function setThana($thana)
    {
        $this->thana = $thana;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}