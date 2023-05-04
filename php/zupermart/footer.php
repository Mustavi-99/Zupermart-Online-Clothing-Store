<footer>
    <div class="container-fluid bg-dark py-5">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-content m-sm-5">
            <ul class="social-icons m-sm-3">
              <?php 
              $urlsql="SELECT * FROM aboutus";
              $resulturl= mysqli_query($link, $urlsql) or die(mysqli_error($link));
              $urls= mysqli_fetch_assoc($resulturl);
              ?>
              <li><a href="<?php echo $urls ['FBURL']?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?php echo $urls ['WAURL']?>" target="_blank">
                  <i class="fa fa-whatsapp"></i></a></li>
              <li><a href="<?php echo $urls ['YTURL']?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <li><a href="<?php echo $urls ['INSTAURL']?>" target="_blank"><i class="fa fa-instagram"></i></a></li>

              <a href="team.php">
                <button type="button" class="btn btn-light" style="float:right">Credits</button>
              </a>
            </ul>


            <div class="copyright-text text-white text-center">
              &copy; Copyright 2021. All Rights Reserved
            </div>
          </div>
        </div>
      </div>

    </div>
  </footer>