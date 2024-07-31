<?php
include '../DBConnection.php';

class AddGame
{
    private $conn;

    public function __construct()
    {
        $DBObj = new DBConnection();
        $this->conn = $DBObj->DatabaseConnection();
    }

    public function InsertGameDetails($title, $genre, $platform, $price, $newFileName1)
    {


        $sql = "INSERT INTO games (title, genre, platform, price,image_path)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        $stmt->bind_param("sssss", $title, $genre, $platform, $price,  $newFileName1);
        $result = $stmt->execute();

        if ($result === false) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->close();
        return $result;
    }

    public function getAllGames(){

        $sql="SELECT * FROM games";
        $result = $this->conn->query($sql);

        if ($result === false) {
            die('Query failed: ' . $this->conn->error);
        }

        $games = [];
        while ($row = $result->fetch_assoc()) {
            $games[] = $row;
        }

        return $games;
    }
    public function updateGame($id, $title, $genre, $platform, $price) {
        $stmt = $this->conn->prepare("UPDATE games SET title = ?, genre = ?, platform = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sssss", $title, $genre, $platform, $price, $id);
        $stmt->execute();
    }
    public function getGameById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM games WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function deleteGame($id){
        $stmt = $this->conn->prepare("DELETE FROM games WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

    }
}
?>