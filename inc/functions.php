<?php

  function authenticate_user($email, $password) {
      return $email == USER_NAME && $password == PASSWORD;
  }

  function redirect($url) {

    header("Location: $url");
  }

  function checkAdmin($admin){
      return $admin == USER_NAME ;
  }

  function insertRequest($reqID){

  }
