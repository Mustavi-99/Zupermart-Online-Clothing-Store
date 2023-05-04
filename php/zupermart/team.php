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
    <link href="css/bootstrap.min.css" rel="stylesheet" >

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/templatemo-sixteen.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome.css">

    <title>Zupermart</title>
  </head>
  <body onload="lgdd(<?php echo $li ?>)">
    

  <!-- Header -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/brand.png"><h2>Zuper <em>Mart</em></h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <!--here we will have our unordered list-->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
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
                <img style="max-height:25px" src="images/account.png">
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
<div class="page-heading about-heading header-text">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="text-content">
          <h4>Meet</h4>
          <h2>The team behind the website</h2>
        </div>
      </div>
    
    </div>
  </div>
</div> <!--page heading ends-->
<?php
$sql= "SELECT * FROM team";
$result= mysqli_query($link,$sql) or die(mysqli_error($link));
if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_array($result)){
      ?>
      <div class="team-members">
  <div class="team-member">
    <div class="card mb-5" style="max-width: 1024px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $row["MemIMGURL"]?>" class="img-fluid rounded-circle" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title"><?php echo $row["MemName"]?></h5>
            <p class="card-text"><h5 class="text-danger"><?php echo $row["MemStudentID"]?></h5></p><br>
            <p class="card-text"><?php echo $row["MemDescription"]?></p>           
          </div>
          <div class="teams-socials">
            <ul class="social-icons m-sm-3">
              <li><a href="<?php echo $row["MemFBlink"]?>"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?php echo $row["MemWAlink"]?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
              <li><a href="<?php echo $row["MemLIlink"]?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="<?php echo $row["MemGHlink"]?>" target="_blank"><i class="fa fa-github"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

      <?php
  }
}
?>

<!--page content ends-->
  

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