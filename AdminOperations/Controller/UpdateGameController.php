<?php
include '../Model/AddGame.php';

class UpdateGameController
{
    public function UpdateGame(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $platform = $_POST['platform'];
            $price = $_POST['price'];

            $gameModel = new AddGame();
            $gameModel->updateGame($id, $title, $genre, $platform, $price);

            header('Location: ../View/viewGameDetails.php');
            exit;
        }
    }
}

$updateGameController = new UpdateGameController();
$updateGameController->UpdateGame();