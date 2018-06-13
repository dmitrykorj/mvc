<?php

class AdminModel extends Model
{
    public function getOrdersCount()
    {
        $sql = "SELECT COUNT(*) FROM orders";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getProductsCount()
    {
        $sql = "SELECT COUNT(*) FROM products";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getUsersCount()
    {
        $sql = "SELECT COUNT(*) FROM users";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getUserName($name)
    {
        $sql = "SELECT fullName FROM users WHERE email = '$name'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
}