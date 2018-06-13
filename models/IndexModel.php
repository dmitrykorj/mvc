<?php

class IndexModel extends Model
{
    public function checkUser() {
        $email = $_POST['login'];
        $password = md5($_POST['password']);
        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($res)) {
            $_SESSION['user'] = $email;
            header("Location: /cabinet");
        }
        else {
            return false;
        }
    }
}