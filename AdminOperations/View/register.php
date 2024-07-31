<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Game Store</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <!-- Link to Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>

<body>
<header>
    <!-- Navbar Section Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../images/logo4.png" class="logo" style="width:130px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->
</header>

<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="my-4">Register</h1>
    <div class="col-md-8 ml-5">
        <form class="row g-3 ml-5 needs-validation" id="registerForm" method="POST" novalidate>
            <div class="col-md-5 mb-2 ml-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="fname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter first name.
                </div>
            </div>
            <div class="col-md-5 mb-2">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="lname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter last name.
                </div>
            </div>
            <div class="col-md-10 mb-2 ml-4">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustomUsername" name="email" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a valid email.
                </div>
            </div>
            <div class="col-md-5 mb-2 ml-4">
                <label for="validationCustom03" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom03" name="password" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Password must be at least 8 characters long, include at least one uppercase letter, one lowercase
                    letter, one number, and one special character.
                </div>
            </div>

            <div class="col-md-5 mb-2">
                <label for="validationCustom05" class="form-label">Re-Enter Password</label>
                <input type="password" class="form-control" id="validationCustom05" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please re-enter password.
                </div>
            </div>
            <div class="col-12 my-4 ml-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12 ml-4">
                <button class="btn btn-dark" type="submit">Register</button>
            </div>
            <div class="col-12 ml-4 mt-4">
                <p>If You Already Have an account : <a href="login.php">Login</a></p>
            </div>
        </form>

    </div>
</div>

<!-- Footer Section -->
<?php include 'footer.php'; ?>

<!-- Scripts -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function showAlert(message, type) {
        const alertContainer = document.createElement('div');
        alertContainer.classList.add('alert', `alert-${type}`);
        alertContainer.textContent = message;

        // Insert the alert before the form element
        const form = document.getElementById('registerForm');
        form.parentNode.insertBefore(alertContainer, form);

        // Remove the alert after 5 seconds (5000 milliseconds)
        setTimeout(() => {
            alertContainer.remove();
        }, 5000);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('registerForm');

        if (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                form.classList.add('was-validated');

                if (form.checkValidity() && validatePassword() && validateEmail() && validatePasswordsMatch()) {
                    const formData = new FormData(form);

                    axios.post('../Controller/AddUserController.php', formData)
                        .then(response => {
                            if (response.data.success) {

                                showAlert('User Already exists', 'danger');

                            } else {
                                showAlert('User added successfully', 'success');
                                setTimeout(() => {
                                    window.location.href = 'login.php';
                                }, 1000);
                                form.reset();
                                form.classList.remove('was-validated');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showAlert('An error occurred while adding the User', 'danger');
                        });
                } else {
                    event.stopPropagation();
                }
            }, false);
        }

        function validatePassword() {
            const password = document.getElementById('validationCustom03').value;
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
            const passwordField = document.getElementById('validationCustom03');

            if (!passwordPattern.test(password)) {
                passwordField.setCustomValidity('Invalid');
                showAlert('Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character.', 'danger');
                return false;
            } else {
                passwordField.setCustomValidity('');
                return true;
            }
        }

        function validateEmail() {
            const email = document.getElementById('validationCustomUsername').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailField = document.getElementById('validationCustomUsername');

            if (!emailPattern.test(email)) {
                emailField.setCustomValidity('Invalid');
                showAlert('Please enter a valid email.', 'danger');
                return false;
            } else {
                emailField.setCustomValidity('');
                return true;
            }
        }

        function validatePasswordsMatch() {
            const password = document.getElementById('validationCustom03').value;
            const confirmPassword = document.getElementById('validationCustom05').value;
            const confirmPasswordField = document.getElementById('validationCustom05');

            if (password !== confirmPassword) {
                confirmPasswordField.setCustomValidity('Invalid');
                showAlert('Passwords do not match.', 'danger');
                return false;
            } else {
                confirmPasswordField.setCustomValidity('');
                return true;
            }
        }

        function showAlert(message, type) {
            const alertContainer = document.createElement('div');
            alertContainer.classList.add('alert', `alert-${type}`);
            alertContainer.textContent = message;

            // Insert the alert before the form element
            const form = document.getElementById('registerForm');
            form.parentNode.insertBefore(alertContainer, form);

            // Remove the alert after 5 seconds (5000 milliseconds)
            setTimeout(() => {
                alertContainer.remove();
            }, 5000);
        }
    });

</script>
</body>
</html>
