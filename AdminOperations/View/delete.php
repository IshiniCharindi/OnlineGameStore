<?php
include '../Model/AddGame.php';

if (isset($_GET['id'])) {
    $gameModel = new AddGame();
    $game = $gameModel->getGameById($_GET['id']);
} else {
    echo "No game ID provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Game</title>
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
<!-- Update game form -->
<div class="container mt-4">
    <h2>Update Game</h2>
    <form action="../Controller/DeleteGameController.php" method="post">
        <div class="form-group">
            <label for="title">Id:</label>
            <input type="text" class="form-control" name="id" value="<?php echo $game['id']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $game['title']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $game['genre']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="platform">Platform:</label>
            <input type="text" class="form-control" id="platform" name="platform" value="<?php echo $game['platform']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $game['price']; ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Delete</button>
    </form>
</div>
<?php
include 'footer.php';
?>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
