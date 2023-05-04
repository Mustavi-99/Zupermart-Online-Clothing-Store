<?php
session_start();
include "connection_open.php";
global $li;
if (isset($_SESSION['userID'])) {
  $li = 1;
  $sql = "SELECT * FROM customers WHERE CID=" . $_SESSION['userID'];
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['UserName'];
    $email = $row['Email'];
    $phone = $row['Phone'];
  }
} else {
  $li = 0;
  $name = "";
  $email = "";
  $phone = "";
}
if (isset($_POST['sndmsg'])) {
  $fname = $_POST['fullname'];
  $email = $_POST['emailA'];
  $phone = $_POST['phoneN'];
  $message = $_POST['Ymessage'];
  $tmzone = +6;
  $sdate = gmdate('Y-m-d H:i:s', time() + 3600 * ($tmzone));
  $insertsql = "INSERT INTO messages(`FullName`,`Email`,`Phone`,`Message`,`SubmitDate`) VALUES ('" . $fname . "','" . $email . "','" . $phone . "','" . $message . "','" . $sdate . "')";
  mysqli_query($link, $insertsql) or die(mysqli_error($link));
  header("location:../zupermart/contact.php?success=inputSuccessful");
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
  <link rel="stylesheet" href="css/style.css?version=1">
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
            <li class="nav-item active">
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
  <div class="page-heading contact-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>contact us</h4>
            <h2>let’s get in touch</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid justify-content-center" id="contactusinfo">
    <div class="row">
      <?php
      $sql = "SELECT * FROM aboutus";
      $resimgurl = mysqli_query($link, $sql) or die(mysqli_errno($link));
      while ($rowimgurl = mysqli_fetch_assoc($resimgurl)) { ?>
        <div class="col-xl-6">
          <img src="<?php echo $rowimgurl['StorePURL'] ?>" alt="" class="storePic">
        </div>
      <?php } ?>
      <div class="col-xl-6" id="contactinfo">
        <div class="text">
          <h4><object class="icon" data="images/svgs/geo-alt.svg" type="image/svg+xml"></object>Adress</h4>
          <?php
          $resaddress = mysqli_query($link, $sql) or die(mysqli_errno($link));
          while ($rowaddress = mysqli_fetch_assoc($resaddress)) { ?>
            <p><?php echo $rowaddress['Address'] ?></p>
          <?php }
          ?>
        </div>
        <div class="text">
          <h4><object class="icon" data="images/svgs/envelope.svg" type="image/svg+xml"></object>Email</h4>
          <?php
          $resemail = mysqli_query($link, $sql) or die(mysqli_errno($link));
          while ($rowemail = mysqli_fetch_assoc($resemail)) { ?><p><?php echo $rowemail['Email'] ?></p>
          <?php }
          ?>
        </div>
        <div class="text">
          <h4><object class="icon" data="images/svgs/telephone.svg" type="image/svg+xml"></object>Phone</h4>
          <?php
          $resphone = mysqli_query($link, $sql) or die(mysqli_errno($link));
          while ($rowphone = mysqli_fetch_assoc($resphone)) { ?>
            <p><?php echo $rowphone['Phone'] ?></p>
          <?php } ?>
        </div>
        <div class="text">
          <h4><object class="icon" data="images/svgs/whatsapp.svg" type="image/svg+xml"></object>WhatsApp Us</h4>
          <?php
          $reswa = mysqli_query($link, $sql) or die(mysqli_errno($link));
          while ($rowwa = mysqli_fetch_assoc($reswa)) { ?>
            <p><?php echo $rowwa['WhatsApp'] ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="find-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our Location on Maps</h2>
          </div>
        </div>
        <div class="col-md-12">
          <!-- How to change your own map point
1. Go to Google Maps
2. Click on your location point
3. Click "Share" and choose "Embed map" tab
4. Copy only URL and paste it within the src="" field below
-->
          <div id="map">
            <?php
            $resll = mysqli_query($link, $sql) or die(mysqli_errno($link));
            while ($rowll = mysqli_fetch_assoc($resll)) { ?>
              <iframe src="<?php echo $rowll['LocationLink'] ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Send us a Message</h2>
          </div>
        </div>
        <div class="col-md-8">
          <div class="contact-form">
            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="fullname" type="text" class="form-control" id="name" value="<?php echo $name ?>" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="emailA" type="email" class="form-control" id="email" value="<?php echo $email ?>" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="phoneN" type="number" class="form-control" id="subject" value="<?php echo $phone ?>" placeholder="Phone Number" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="Ymessage" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" name="sndmsg" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_GET['success'])) {
    if ($_GET['success'] == "inputSuccessful") {
      echo "<div class='alert isalert alert-success alert-dismissible fade show'>Message Sent Succesfully<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
  }
  ?>
  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our Happy Customers</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel">
            <?php
            $sql = "SELECT * FROM happycustomers";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="client-item">
                <img src="<?php echo $row['hcPimgurl']?>" alt="">
              </div>
            <?php }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- </div> -->
  <!-- </div>
</div> -->


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