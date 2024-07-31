<?php
include '../Model/User.php';

class AddUserController
{
    public function AddUserDataToDatabase()
    {
        // Check if the request is an Axios request (using XMLHttpRequest)
        $isAjaxRequest = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            echo "Form is submitted.<br>";


            $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
            $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


            $errors = [];

            if (empty($fname)) {
                $errors[] = "First name is required.";
            }

            if (empty($lname)) {
                $errors[] = "Last name is required.";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "A valid email address is required.";
            }

            if (empty($password)) {
                $errors[] = "Password is required.";
            }

            if (empty($errors)) {
                $addUserObj = new User();

                echo "Checking email existence for: " . $email . "<br>";
                if ($addUserObj->CheckEmailExists($email)) {
                    $errors[] = "User already exists.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $addResult = $addUserObj->InsertUserDetails($fname, $lname, $email, $hashedPassword);

                    if (!$addResult) {
                        $errors[] = "Data insertion failed.";
                    } else {
                        $success = "Data added successfully.";
                    }
                }
            }

            $response = !empty($errors) ? ['errors' => $errors] : ['success' => $success];

            if ($isAjaxRequest) {
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }

            if (!empty($errors)) {

                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
            } else {
                header('Location: ../View/login.php');
            }
            exit;
        }
    }
}

$addUserController = new AddUserController();
$addUserController->AddUserDataToDatabase();
?>
