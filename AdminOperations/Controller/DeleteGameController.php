<?php
include '../Model/AddGame.php';
class DeleteGameController
{
    public function deleteGame(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $gameModel = new AddGame();
            $gameModel->deleteGame($id);

            header('Location: ../View/viewGameDetails.php');
            exit;
        }
}

}
$deleteGameController = new DeleteGameController();
$deleteGameController->deleteGame();