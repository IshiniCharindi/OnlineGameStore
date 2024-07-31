<?php
include '../DBConnection.php';
class Admin
{
    private $conn;

    public function __construct()
    {
        $DBObj = new DBConnection();
        $this->conn = $DBObj->DatabaseConnection();
    }

    public function findAdmin($username,$password){

        $sql="SELECT * FROM admin WHERE username=?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        $stmt->bind_param("s", $username);
        $result = $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {

            return false;
        } else {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {

                return true;
            } else {

                return false;
            }
        }
    }
}
