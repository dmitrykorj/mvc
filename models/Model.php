<?php

class Model
{

 protected $db = null;

 public function __construct()
 {
     $this->db = DB::dbConnect();
 }

 public function checkUserRoleId($email) {
     $sql = "SELECT role_id FROM users WHERE email = '$email'";

     $stmt = $this->db->prepare($sql);
     $stmt->execute();

     $res = $stmt->fetchColumn();
     if ($res === '1')
     {
         return true;
     }
     return false;
 }
}