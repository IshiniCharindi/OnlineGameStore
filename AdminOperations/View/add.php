<!DOCTYPE html>
<html>
<head>
    <title>Admin Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="viewGameDetails.php">Games</a>
                </li>


            </ul>
        </div>

    </nav>
    <!-- Navbar End -->
</header>
<div class="container mt-4">
<h1>Add Game</h1>

<form class="row g-3 needs-validation" novalidate id="gameForm" method="POST"  enctype="multipart/form-data">
    <div class="form-group col-md-4">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please enter a Title.</div>
    </div>
    <div class="form-group col-md-4">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please enter a Genre.</div>
    </div>
    <div class="form-group col-md-4">
        <label for="price" class="form-label">Price</label>
        <div class="input-group has-validation">
            <span class="input-group-text">Rs</span>
            <input type="text" class="form-control" id="price" name="price" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter a price.</div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="platform" class="form-label">Platform(S)</label>
        <input type="text" class="form-control" id="platform" name="platform" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please enter a Platform.</div>
    </div>

    <div class="col-md-6">
        <label for="image" class="form-label">Cover Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please upload a cover image.</div>
    </div>


    <div class="col-12">
        <button class="btn btn-dark" type="submit">Add Game</button>
    </div>
</form>
</div>
<?php
include 'footer.php';
?>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
