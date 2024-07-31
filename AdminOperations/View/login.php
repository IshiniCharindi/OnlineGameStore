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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<header>
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
</header>

<body>
<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="my-4">Login</h1>
    <div class="col-md-6 ml-5">
        <form class="row g-3 ml-5 needs-validation" id="LoginForm" method="POST" novalidate>
            <div class="col-md-12 mb-2">
                <label for="validationCustom01" class="form-label">Type</label>
                <select name="type" class="form-control" id="validationCustom02" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a type.</div>
            </div>
            <div class="col-md-12 mb-2">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom01" name="email" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-12 mb-2">
                <label for="validationCustom02" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom02" name="password" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter your password.</div>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-dark" type="submit">Login</button>
            </div>
            <div class="col-12 mt-4">
                <p>If you do not have an account: <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function showAlert(message, type) {
        const alertContainer = document.createElement('div');
        alertContainer.classList.add('alert', `alert-${type}`);
        alertContainer.textContent = message;
        const form = document.getElementById('LoginForm');
        form.parentNode.insertBefore(alertContainer, form);
        setTimeout(() => {
            alertContainer.remove();
        }, 2000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('LoginForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            form.classList.add('was-validated');
            if (form.checkValidity()) {
                const formData = new FormData(form);
                axios.post('../Controller/LoginController.php', formData)
                    .then(response => {
                        if (response.data.status === 'error') {
                            showAlert('Login unsuccessful: ' + response.data.message, 'danger');
                        } else {
                            showAlert('Login successful', 'success');
                            form.reset();
                            form.classList.remove('was-validated');
                            setTimeout(() => {
                                if (response.data.type === 'admin') {
                                    window.location.href = 'adminPanel.php';
                                } else if (response.data.type === 'user'){
                                    window.location.href = 'viewGameDetails.php';
                                }
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred during login');
                    });
            } else {
                console.log("Form not complete");
                event.stopPropagation();
            }
        }, false);
    });
</script>
</body>
</html>
