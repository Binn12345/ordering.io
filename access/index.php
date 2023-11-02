<?php 
  
  session_start();
  include '../class/user_checker.php';
  include '../checker/session.php';

//   // Create an instance of access_poke
//     $isCheck = new access_poke();

//     // Call the __deploy method (assuming it's a static method)
//     $result = access_poke::__deploy();
// // //Array
// (
//     [user_authenticated] => 1
//     [userdata] => Array
//         (
//             [id] => 1
//             [idkey] => 1
//             [username] => root
//             [password] => superadmin
//             [userkey] => 1
//         )

// )
  // echo '<pre>', print_r($_SESSION, true) ?: 'undefined index', '</pre>';die;
  $transkey = password_hash('accessgranted', PASSWORD_BCRYPT);
  $userKey = $_SESSION['guest'];

$h = $_SESSION['last_activity'] ?? "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FoodHub IO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- <link href="assets/css/ads.css" rel="stylesheet"> -->

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <?php 
      echo'
          <a href="?token='.$transkey.'" class="logo d-flex align-items-center">
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <span class="d-none d-lg-block">FH</span>
        </a>';
      ?>
      
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['userdata']['username']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['userdata']['username']; ?></h6>
              <span><?php echo access_poke::__type($_SESSION['userdata']['userkey']); ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php 
            
              if($_SESSION['guest'] != '1' || $_SESSION['userdata']['userkey'] == '1')
              {
                echo '
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                  </a>
                </li>
                <li>
              <hr class="dropdown-divider">
            </li>';
              }

            ?>
            
            
            <?php 
            
              if($_SESSION['guest'] != '1' || $_SESSION['userdata']['userkey'] == '1')
              {
                echo '
                <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
            <hr class="dropdown-divider">
          </li>';
              }

            ?>
            
            <?php 
            
              if($_SESSION['guest'] != '1' || $_SESSION['userdata']['userkey'] == '1')
              {
                echo '
                <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>';
              }

            ?>
           

            

            <li>
              <!-- <a class="dropdown-item d-flex align-items-center" href='../functions/logoutconnection.php' id="user_destory"> -->
              <a class="dropdown-item d-flex align-items-center" id="user_destory">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <?php 

    if($_SESSION['userdata']['userkey'] == '4')
    {
        
        if($_SESSION['userdata']['isTerm'] == '0'){
          include 'construct/mainprofile.php';
        }else{
          include 'construct/sidebar.php';
          include 'construct/main.php';
          include 'construct/footer.php';
        }
        
    }
    else{
       include 'superadmintools/globals.php';
    }

    
  ?>
  <!-- Ad Modal -->
<div id="adModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAd">&times;</span>
            <h3>Special Offer!</h3>
            <p>Get 20% off on our premium services. Limited time offer.</p>
        </div>
    </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/main.js"></script>
    <script src="assets/js/local.js"></script>
  
  <script>
        var userKey = <?php echo json_encode($userKey); ?>;
            // Check the condition
            if (userKey) {
                // Show a SweetAlert
                Swal.fire({
                    text: 'Fill up all required fields',
                    icon: 'info',
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    timer: 3000,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to another page
                        // window.location.href = 'index.php';
                    }
                });
            }
        

            // function playLoginSound() {
            //     var audio = new Audio('../../../path/sound/granted.mp3'); // Replace 'path/to/success-sound.mp3' with the actual path to your sound file
            //     audio.play();
            // }
            // window.onload = playLoginSound;

            var h = <?php echo json_encode($h); ?>;
            // var $h = true; // boolean
            var audio = new Audio('../../../path/sound/granted.mp3'); // Replace with the actual path to your sound file
            audio.muted = true;

            function playLoginSound() {
              audio.muted = false; // Unmute before playing
              audio.play().catch(function (error) {
                // Handle the error
                // console.error("Failed to play audio: " + error.message);
              });
            }

            // Wait for the document to be fully loaded and then play the sound
            document.addEventListener('DOMContentLoaded', function () {
              if (h) {
                window.onload = playLoginSound;
                // playLoginSound();
              }
            });
              

            
          
    </script>
</body>

</html>