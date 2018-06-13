<?php

class RegisterModel extends Model
{
    public $name;

    public function register() {

        $this->name = $_REQUEST['name'];
        $login = $_REQUEST['login'];
        $password = md5($_REQUEST['password']);
        $email = $_REQUEST['email'];

        $data = [
            'login' => $login,
            'name' => $this->name,
            'password' => $password,
            'email' => $email,
        ];

        $sql = "INSERT INTO users (login, fullName, email, password, role_id) VALUES (:login, :name, :email, :password, 3)";
        try {
            $this->db->prepare($sql)->execute($data);
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br />\n";
        }
    }
}