<?php
session_start();

class LoginController
{
    public function LoginConfirmation() {
        $isAjaxRequest = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);

            if ($type === "admin") {
                $adminObj = new Admin();
                $results = $adminObj->findAdmin($email, $password);
                if ($results) {
                    $_SESSION['admin_username'] = $email;
                    if ($isAjaxRequest) {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'success', 'type' => 'admin', 'message' => 'Login Successful']);
                        exit;
                    } else {
                        header('Location: ../View/adminPanel.php');
                        exit;
                    }
                } else {
                    if ($isAjaxRequest) {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'error', 'message' => 'Invalid admin credentials']);
                        exit;
                    } else {
                        echo 'Invalid admin credentials';
                    }
                }
            } elseif ($type === "user") {
                $addUserObj = new User();
                $results = $addUserObj->FindUser($email, $password);
                if ($results) {
                    $_SESSION['user_username'] = $email;
                    if ($isAjaxRequest) {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'success', 'type' => 'user', 'message' => 'Login Successful']);
                        exit;
                    } else {
                        header('Location: ../View/viewGameDetails.php');
                        exit;
                    }
                } else {
                    if ($isAjaxRequest) {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'error', 'message' => 'Invalid user credentials']);
                        exit;
                    } else {
                        echo 'Invalid user credentials';
                    }
                }
            }
        } else {
            echo "Form not submitted.";
        }

        if (!$isAjaxRequest) {
            header('Location: ../View/viewGameDetails.php');
            exit;
        }
    }
}

$loginController = new LoginController();
$loginController->LoginConfirmation();
