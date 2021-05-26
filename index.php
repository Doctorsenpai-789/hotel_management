<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        include('header.php');
        include('admin/db_connect.php');

        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
        foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['setting_'.$key] = $value;
        }
    ?>

    <body id="page-top">

        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
             <div class="toast-body text-white">
             </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_hotel_name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home" style="font-size: 16px;">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=list" style="font-size: 16px;">Rooms</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about" style="font-size: 16px;">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./admin/index.php?page=admin" style="font-size: 16px;">Admin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <?php 
    $page = isset($_GET['page']) ?$_GET['page'] : "home";
    include $page.'.php';
    ?>
       
    <!-- confirmation modal -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
    
      <!-- modal form -->
    <div class="modal fade" id="uni_modal" role='dialog'>
      <div class="modal-dialog modal-md text-dark" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        </div>
      </div>
    </div>

<br/>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-white" style="">
      <!-- Section: Social media -->
      <section
        class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
      >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block" data-aos="fade-up">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="" data-aos="fade-up">
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-left" data-aos="fade-up-right">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i> Senpai Motel
              </h6>
              <p>
                Experience the fresh and comfort living by staying our motel.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-left" data-aos="fade-up-right">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Rooms
              </h6>
              <p>
                <a href="#!" class="text-reset">Twin Room</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Family Room</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Single Room</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Couple Room</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-left" data-aos="fade-up-left">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>
              <p>
                <a href="" class="text-reset">Featured Rooms</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Book Now</a>
              </p>
              <p>
                <a href="#!" class="text-reset">About Us</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Help</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-left" data-aos="fade-up-left">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Contact
              </h6>
              <p><i class="fas fa-home me-3"></i>Medellin, Cebu</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                princesenpaihotel@gmail.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">princesenpaiHotel.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  <?php include('footer.php') ?>
  </body>

  <?php $conn->close() ?>

</html>
