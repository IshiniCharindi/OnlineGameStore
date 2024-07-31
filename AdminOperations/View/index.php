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
            <li class="nav-item active">
                <a class="nav-link" href="viewGameDetails.php">Add <span class="sr-only">(current)</span></a>
            </li>

          <li class="nav-item">
            <a class="nav-link" href="register.php">Login/Register</a>
          </li>
        </ul>
      </div>
  
    </nav>
    <!-- Navbar End -->
  </header>
  
<!---Slider Section Start-->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../images/slider1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/slider2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/slider3.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!---Slider Section End-->


<!---Our Services Section Start-->
<section class="services">

    <div class="container">
  
      <div class="row">
        <div class="col-md-12">
          <h2 class="section-title text-center"> Our <span class="text-primary">Online</span> Video Game Store </h2>
          <div class="underline mr-auto ml-auto mb-2"></div>
          <p class="section-subtitle text-center">Exclusive Games <span class="text-success">Now Available</span>
          </p>
        </div>
        <div class="col-md-12">
          <p class="text-center">Discover the latest and greatest video games with our extensive collection. From action-packed adventures to relaxing puzzles, we have something for every gamer. Shop now and enjoy exclusive discounts!</p>
        </div>
      </div>
  
      <div class="row text-center mt-4">
        <div class="col-md-4">
          <div class="service-box">
            <img src="../images/g3.jpg" alt="Game Collection" class="service-icon">
            <h4>Massive Game Collection</h4>
            <p>Explore a wide variety of games across different genres and platforms.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <img src="../images/g2.jpg" alt="Exclusive Deals" class="service-icon">
            <h4>Exclusive Deals</h4>
            <p>Take advantage of our special offers and discounts on top games.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <img src="../images/g1.jpg" alt="Fast Delivery" class="service-icon">
            <h4>Fast Digital Delivery</h4>
            <p>Get your game keys instantly and start playing without any delay.</p>
          </div>
        </div>

        
      </div>
    </div>
  </section>
  <!---Our Services Section End-->


<!---About Us Section Start-->
<section class="about-us">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="../images/g6.jpg" alt="About Us" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
          <h2>About Us</h2>
          <p>At our online video game store, we are passionate about bringing the best gaming experiences to our customers. With a diverse selection of games and unbeatable prices, we are your go-to source for all things gaming.</p>
          <p>Our team is dedicated to providing exceptional customer service and ensuring that every purchase is a seamless and enjoyable experience. Join us and become a part of our growing community of gamers!</p>
        </div>
      </div>
    </div>
  </section>
  <!---About Us Section End-->
  



<!-- Footer Section -->
<?php
include 'footer.php';
?>


<body>

  <script src="js/jquery-3.4.1.slim.min..js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>