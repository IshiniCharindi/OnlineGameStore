<?php
include '../Model/AddGame.php';

$gameModel = new AddGame();
$games = $gameModel->getAllGames();
?>
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

                <li class="nav-item">
                    <a class="nav-link" href="add.php">Add Game</a>
                </li>
            </ul>
        </div>
        <button class="btn btn-outline-primary text-light" id="btnCart">
            <i class="bi bi-cart-fill"></i>
            Cart
            <span class="badge bg-dark rounded-pill cart-count">0</span>
        </button>
    </nav>
    <!-- Navbar End -->
</header>
<!--display games section-->
<div class="container">
    <h1 class="section-title text-center mt-4"> Available <span class="text-primary">Video  </span> Games </h1>
    <div class="row text-center mt-4">
        <?php foreach ($games as $game): ?>
            <div class="col-md-4 mb-4">
                <div class="service-box">
                    <img src="<?php echo '../images/' . $game['image_path']; ?>" alt="Game Collection" class="service-icon">
                    <h4><?php echo $game['title']; ?></h4>
                    <h5>LKR <?php echo $game['price']; ?></h5>
                    <p><b>Genre:</b><?php echo $game['genre']; ?> <b>Platform(S):</b><?php echo $game['platform']; ?></p>
                    <button type="button" class="btn btn-dark btnProduct" data-id="<?php echo $game['id']; ?>">Add to Cart</button>
                   <!-- <button type="button" class="btn btn-dark" onclick="window.location.href='update.php?id=<?php echo $game['id']; ?>'">Update</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='delete.php?id=<?php echo $game['id']; ?>'">Delete</button>-->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br><br>
</div>
<!--end display games section-->

<?php include 'footer.php'; ?>

<!-- Cart Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary text-uppercase">Cart Items</h5>
                <button class="btn-close" data-bs-dismiss="modal">
                    <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/delete-sign.png" alt="delete-sign"/>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                    <tfoot>
                    <tr>
                        <th class="text-end total" colspan="5">Total Rs : 0.00</th>
                        <th>
                            <button class="btn btn-primary" onclick="BuyNow(<?php echo $game['id']?>)" id="proceedToPayment">Proceed to Payment</button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>


<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<script>

    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Show the payhere.js popup, when "Proceed to Payment" is clicked
    document.getElementById('proceedToPayment').onclick = function (e) {
        e.preventDefault(); // Prevent the default form action if any

        // Fetch the necessary payment details here
        // These details should be dynamically set based on cart items and user info
        var payment = {
            "sandbox": true,
            "merchant_id": "1227044",    // Replace your Merchant ID
            "return_url": "http://sample.com/return",
            "cancel_url": "http://sample.com/cancel",
            "notify_url": "http://sample.com/notify",
            "order_id": "ItemNo12345",
            "items": "Your Cart Items", // Update this to reflect cart items
            "amount": "1000.00", // Update this to reflect the total amount
            "currency": "LKR",
            "hash": "45D3CBA93E9F2189BD630ADFE19AA6DC", // *Replace with generated hash retrieved from backend
            "first_name": "Saman", // Update this to reflect the user's first name
            "last_name": "Perera", // Update this to reflect the user's last name
            "email": "samanp@gmail.com", // Update this to reflect the user's email
            "phone": "0771234567", // Update this to reflect the user's phone number
            "address": "No.1, Galle Road", // Update this to reflect the user's address
            "city": "Colombo", // Update this to reflect the user's city
            "country": "Sri Lanka", // Update this to reflect the user's country
            "delivery_address": "No. 46, Galle road, Kalutara South", // Update this to reflect the delivery address
            "delivery_city": "Kalutara", // Update this to reflect the delivery city
            "delivery_country": "Sri Lanka", // Update this to reflect the delivery country
            "custom_1": "",
            "custom_2": ""
        };

        payhere.startPayment(payment);
    };
</script>

</script>
</body>
</html>
