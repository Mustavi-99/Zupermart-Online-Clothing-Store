<?php
session_start();
include "connection_open.php";
global $li;
if (isset($_SESSION['userID'])) {
  $li = 1;
} else {
  $li = 0;
}
if(!isset($_GET['page'])){
  $page=1;
  $_GET['page']=1;
  $predis="true";
}else{
  $page=$_GET['page'];
  $predis="false";
}
if(isset($_POST['searchbtn'])){
  $search=$_POST['searchfield'];
  header('Location: ../zupermart/products.php?search='.$_POST['searchfield']);
}
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];    
 
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
  <link rel="stylesheet" href="css/style.css">
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
            <li class="nav-item active">
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

  <!--Page Content-->
  <!--Product page Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark " id="productsNav">
    <div class="container-fluid searchnav">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto m-2 mb-lg-2">
          <li class="nav-item dropend text-white">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filter
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <?php
              $filtersql="SELECT DISTINCT PType FROM allproducts WHERE Exclusivity=0";
              $filterresult=mysqli_query($link, $filtersql);
              while($filterrow=mysqli_fetch_assoc($filterresult)){
                echo '<li><a class="dropdown-item" href="products.php?producttype='.$filterrow['PType'].'">'.$filterrow['PType'].'</a></li>';
              }
              ?>
            </ul>
          </li>
        </ul>
        <form class="d-flex" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchfield">
          <button name="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!--Product page Navbar ends-->


  <!--cards-->
  <div class="container text-center" id="cards">
    <div class="row justify-content-center" id="card-id">

      <?php
      $results_per_page=6;
      $page_first_result = ($page-1) * $results_per_page;
      if(isset($_GET["producttype"])){
        $sql="SELECT * FROM allproducts WHERE Exclusivity=0 AND PType='".$_GET["producttype"]."'";
      }else if(isset($_GET['search'])){
        $sql = "SELECT * FROM allproducts a JOIN productspecification pr  ON pr.PID=a.PID WHERE a.Exclusivity=0 AND (a.PName LIKE '%".$_GET['search']."%' OR a.PType LIKE '%".$_GET['search']."%' OR a.PBrand LIKE '%".$_GET['search']."%' OR a.SDescription LIKE '%".$_GET['search']."%' OR a.Description ='%".$_GET['search']."%' OR  pr.Specifications LIKE '%".$_GET['search']."%') GROUP by a.PID";
      }else{
        $sql = "SELECT * FROM allproducts WHERE Exclusivity=0";
      }
      $resultset = mysqli_query($link, $sql);
      $number_of_result=mysqli_num_rows($resultset);
      $number_of_page = ceil ($number_of_result / $results_per_page); 
      $query = $sql." LIMIT " . $page_first_result . ',' . $results_per_page;
      $results = mysqli_query($link, $query); 
      while ($row = mysqli_fetch_assoc($results)) { ?>
            <div class="col-lg-4 col-md-6 mb-2">
              <div class="card" style="width: 18rem;">
              <img src="<?php echo $row["Pimgurl"] ?>"alt="">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row["Price"] ?></h5>
                  <p class="card-text"><?php echo $row["PName"]?></p>
                  <?php echo '<a href="product-preview.php?productID=' . $row['PID'] . '" class="stretched-link">' ?> </a>
                </div>
              </div>
            </div>
      <?php
          }
          
      ?>
    </div>
    <!--Row div end-->
  </div>
  <!--cards container div end-->
  <!--cards end here-->

  <!--Page Content ends here-->
<!--pagination-->

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center m-5">
      <?php
      if(isset($_GET['search'])){
        $purl=$url."&page=";
      }else{
        $purl="products.php?page=";
      }
      
      $prepage=$page-1;
      $postpage = $page+1;
      if($page>=2){
        echo '
        <li class="page-item">
        <a class="page-link" href="'.$purl.$prepage.'" tabindex="-1" disabled="'.$predis.'">Prev</a>
        </li>';
      }  
      ?>
    <?php
for($page = 1; $page<= $number_of_page; $page++) {  
  if($page==$_GET['page']){
    $active="active";
  }else{
    $active="";
  }
  echo '<li class="page-item '.$active.' "><a class="page-link" href="'.$purl. $page . '">' . $page . '</a></li>';
}
if($postpage<=$number_of_page){
  echo '<li class="page-item">
  <a class="page-link" href="'.$purl.$postpage.'">Next</a>
</li>';
}
    
?>
    
    
  </ul>
</nav>
<!--pagination end-->

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