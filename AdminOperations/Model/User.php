<?php
include '../DBConnection.php';
class User
{
    private $conn;

    public function __construct()
    {
        $DBObj = new DBConnection();
        $this->conn = $DBObj->DatabaseConnection();
    }

    public function InsertUserDetails($fname, $lname, $email,  $password)
    {


        $sql = "INSERT INTO user (firstName, lastName, email, password)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        $stmt->bind_param("ssss", $fname, $lname, $email,  $password);
        $result = $stmt->execute();

        if ($result === false) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->close();
        return $result;
    }

    public function CheckEmailExists($email)
    {
        $sql = "SELECT email FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        $exists = $stmt->num_rows > 0;

        $stmt->close();
        return $exists;
    }

    public function FindUser($email,$password){

        $sql="SELECT * FROM user WHERE email=?";
        $stmt=$this->conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();

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