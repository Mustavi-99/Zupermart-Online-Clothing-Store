<?php
session_start();
include "connection_open.php";
global $li;
if (isset($_SESSION['userID'])) {
  $li = 1;
} else {
  $li = 0;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="css/templatemo-sixteen.css">
  <link rel="stylesheet" href="css/style.css?version=2">
  <link rel="stylesheet" href="css/fontawesome.css">

  <title>Zupermart</title>
</head>



<body onload="lgdd(<?php echo $li ?>)">
  <!-- Header -->
  <header class="sticky-md-top">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/brand.png">
          <h2>Zuper <em>Mart</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <!--here we will have our unordered list-->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Our Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img style="max-height:25px;" src="images/account.png">
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div id="LoggedIn">
                  <li><a class="dropdown-item" href="excl-Products.php">Exclusive Products</a></li>
                  <li><a class="dropdown-item" href="user-profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </div>
                <div id="LoggedOut">
                  <li><a class="dropdown-item " href="login.php">Log In/Register</a></li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--header ends-->
  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/banner.jpg" class="d-block w-100" alt="ZuperMart">
        <div class="carousel-caption d-none d-md-block d-sm-block">
          <!--carousel text is a hassle so leaving it blank-->
        </div>
      </div>
      <!--1st carousel end-->
      <div class="carousel-item">
        <img src="images/banner2.jpg" class="d-block w-100" alt="ZuperMart">
      </div>
      <div class="carousel-item">
        <img src="images/banner3.jpg" class="d-block w-100" alt="ZuperMart">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Banner Ends Here -->
  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.php">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php
        $sql = "SELECT * FROM allproducts WHERE Showcase=1 AND Exclusivity=0";
        $resultset = mysqli_query($link, $sql);
        if ($resultset) {
          if (mysqli_num_rows($resultset) > 0) {
            while ($row = mysqli_fetch_assoc($resultset)) {
        ?>
              <div class="col-md-4">
                <div class="product-item">
                  <?php echo '<a href="product-preview.php?productID=' . $row['PID'] . '">' ?>
                  <img src="<?php echo $row["Pimgurl"] ?>" class="showImg" alt="">
                  <div class="down-content">
                    <h4><?php echo $row["PName"] ?></h4>
                    </a>
                    <h6><?php echo $row["Price"] ?></h6>
                    <p><?php echo $row["SDescription"] ?></p>
                    <ul class="stars">
                      <?php
                      for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $row["PRating"]) {
                          echo "<i class='fa fa-star text-warning'></i>";
                        } else {
                          echo "<i class='fa fa-star text-secondary'></i>";
                        }
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
        <?php
            }
          }
        }
        ?>
        </div>
    </div>
  </div>

  <!--footer-->
  <?php
    include "footer.php";
  ?>
  <!--footer-->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/index.js?version=1"></script>
</body>

</html>