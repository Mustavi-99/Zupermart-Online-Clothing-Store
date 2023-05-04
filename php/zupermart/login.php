<?php
session_start();
include "connection_open.php";
global $p;
global $li;
if (isset($_SESSION['userID'])) {
  ?>
                    <script type="text/javascript">
                        alert("User Already Logged In");
                        window.location.href = "index.php"
                    </script>
<?php
} else {
  $li = 0;
}
function uidExists($conn, $name, $email)
{
    $searchsql = "SELECT * FROM customers WHERE UserName='" . $name . "' OR Email='" . $email . "'";
    $resultSearch = mysqli_query($conn, $searchsql) or die(mysqli_error($conn));
    if ($row = mysqli_fetch_assoc($resultSearch)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function createUser($conn, $name, $email, $phone, $pass, $date)
{
    $insertsql = "INSERT INTO customers(`UserName`,`Email`,`Password`,`Phone`,`CreatedDate`) VALUES ('" . $name . "','" . $email . "','" . $pass . "','" . $phone . "','" . $date . "')";
    mysqli_query($conn, $insertsql) or die(mysqli_error($conn));
    header("location:../zupermart/login.php?success=registered");
}
if (isset($_POST['registerbtn'])) {
    $rname = $_POST['RegisterName'];
    $remail = $_POST['RegisterEmail'];
    $rphnum = $_POST['RegisterPhone'];
    $rpass = $_POST['RegisterPassword'];
    $tmzone = +6;
    $rdate = gmdate('Y-m-d H:i:s', time() + 3600 * ($tmzone));

    if (uidExists($link, $rname, $remail) !== false) {
        header("location:../zupermart/login.php?error=uidtaken");
    } else {
        createUser($link, $rname, $remail, $rphnum, $rpass, $rdate);
    }
}
if (isset($_POST['loginbtn'])) {
    $lemail = $_POST['loginEmail'];
    $lpass = $_POST['loginPass'];
    $searchsql = "SELECT * FROM customers WHERE Email='" . $lemail . "'";

    $result = mysqli_query($link, $searchsql) or die(mysqli_error($link));
    $noOfRow = mysqli_num_rows($result);
    if ($noOfRow) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Password'] == $lpass) {
                if ($row['Status'] == 0) {
                    header("location:../zupermart/login.php?error=notapproved");
                } else {
                    $_SESSION['userID'] = $row['CID'];
?>
                    <script type="text/javascript">
                        alert("Logged In");
                        window.location.href = "index.php"
                    </script>
<?php
                }
            } else {
                header("location:../zupermart/login.php?error=passwordnotmatch");
            }
        }

        // header("location:../loginTrial/login.php");
    } else {
        header("location:../zupermart/login.php?error=notregistered");
    }
}
else {
    //header("location:../zupermart/login.php");
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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home
                            </a>
                        </li>
                        <li class="nav-item ">
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
    <div class="container-fluid justify-content-center" id="login">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <h1 class="card-header">Log in</h1>
                    <div class="card-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="mb-3">
                                <!-- <label for="useremailInput" class="form-label">Email address</label>-->
                                <input type="email" name="loginEmail" class="form-control" id="useremailInput" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="userpasswordInput" class="form-label">Password</label>-->
                                <input type="password" name="loginPass" class="form-control" id="userpasswordInput" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="loginbtn" value="Login" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="overflow: hidden;">
            <div class="col-xl-6 col-sm-12" id="register">
                <h2>
                    Did Not Register Yet?
                </h2>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" id="registerButton" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register Now
                </button>

                <!-- Modal -->
                <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="registerModalTitle">Register</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" onclick="document.getElementById('UserEmail').value='';document.getElementById('UserName').value='';document.getElementById('UserPassword').value='';document.getElementById('UserPhNum').value='';document.getElementById('UserCPassword').value='';indicoff()" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="UserName" class="col-form-laberl">User Name<span>*</span></label>
                                        <input type="text" class="form-control" id="UserName" name="RegisterName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="UserEmail" class="col-form-label">User Email<span>*</span></label>
                                        <input type="email" class="form-control" id="UserEmail" name="RegisterEmail" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="UserPhNum" class="col-form-label">User Number<span>*</span></label>
                                        <input type="number" class="form-control" id="UserPhNum" name="RegisterPhone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="UserPassword" class="col-form-label">User Password<span>*<div class="form-text">Password length must be 6 and must have digits,letters,characters</div></span></label>
                                        <input onkeyup="trigger()" type="password" class="form-control" id="UserPassword" name="RegisterPassword" required>
                                    </div>
                                    <div class="indicator" id="indicator">
                                        <span class="weak"></span>
                                        <span class="medium"></span>
                                        <span class="strong"></span>
                                    </div>
                                    <div class="text"></div>
                                    <div class="mb-3">
                                        <label for="UserCPassword" class="col-form-label">Confirm Password<span>*</span></label>
                                        <input onkeyup="checkPass()" type="password" class="form-control" id="UserCPassword" name="RegisterCPassword" required>
                                    </div>
                                    <div class="textc"></div>
                                    <div class="mb-3">
                                        <input type="submit" name="registerbtn" value="Register" class="btn btn-primary" id="reg" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="emptyField">
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "uidtaken") {
            echo "<div class='alert loginalert alert-primary alert-dismissible fade show'>User already exists!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }else if ($_GET["error"] == "notapproved") {
            echo "<div class='alert loginalert alert-secondary alert-dismissible fade show'>User not approved!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else if ($_GET["error"] == "notregistered") {
            echo "<div class='alert loginalert alert-info alert-dismissible fade show'>User not registered!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else if ($_GET["error"] == "passwordnotmatch") {
            echo "<div class='alert loginalert alert-warning alert-dismissible fade show'>Password does not match!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } 
    }else if(isset($_GET['success'])){
        if($_GET['success']=="registered") {
            echo "<div class='alert loginalert alert-success alert-dismissible fade show'>User registered!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
    ?>
    <!--footer-->
  <?php
    include "footer.php";
  ?>
    <!--footer-->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js?version=2"></script>

</body>

</html>