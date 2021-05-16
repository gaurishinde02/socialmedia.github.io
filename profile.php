<!DOCTYPE html>
<?php
session_start();
include 'scribble.php';

?>

<html>

<head>
  <title></title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/6fefde99a0.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/styles.css">

  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="navbarstyle.css">
</head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<body>
  <div class="navbar">
    <ul>
      <a href="../PratikWork/BLOG_PROJECT/PostPages/index.php" class="logo">Geekster</a>

      <li class="texti"><a href="../PratikWork/BLOG_PROJECT/SearchPage/search.php">Search</a></li>
      <li class="texti"><a href="../PratikWork/BLOG_PROJECT/PostPages/normal_blogs.php">Posts</a></li>
      <li class="texti"><a href="../PratikWork/BLOG_PROJECT/PostPages/index.php">Image Blogs</a></li>
      <li class="texti"><a href="../PratikWork/BLOG_PROJECT/PostPages/query_blogs.php">Questions</a></li>
      <li class="texti"><a href="../PratikWork/BLOG_PROJECT/PostPages/announcements_blogs.php">Announcements</a></li>
      <li>
        <div class="sizedbox"></div>
      </li>

      <li>
        <form method="POST">
          <button name="logout" class="btn btn-sm btn-primary" style="padding:10px;">LOGOUT</button>
        </form>



      </li>

    </ul>
  </div>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" target="_blank">User profile</a>
        <form method="POSt">
          <button name="logout" class="btn btn-sm btn-primary" style="padding:10px;">LOGOUT</button>


          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
          </li>
          </ul>
      </div>
    </nav>
    <!-- Header -->

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://www.pinclipart.com/picdir/big/51-514779_social-media-vector-graphics-clipart.png); background-size: cover; background-position: center ;">

      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-5">
            <h1 class="display-2 text-white">GEEKSTER</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow" style="width:1000px; margin-left:220px;">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <img src=<?php if ($user_image != NULL) { ?> <?php echo $user_image;
                                                              } else { ?><?php echo "\FORTH_ITTERATION\PratikWork\BLOG_PROJECT\images\default.png";
                                                                        } ?> style="height: 180px;width:200px; border-radius:100%;" />
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <?php if (isset($_REQUEST['searchid'])) { ?>
                <?php if ($_SESSION['id'] == $_REQUEST['searchid']) { ?>
                  <div class="d-flex justify-content-between">
                    <a href="change_profile_picture.php" name='update' class='btn btn-sm btn-primary' style="padding:10px;">Update Profile Picture</a>
                    <a href="settings.php" name='settings' class='btn btn-sm btn-primary' style="padding:10px;">Settings</a>
                  </div>
                <?php } ?>
              <?php } else { ?>
                <div class="d-flex justify-content-between">
                  <a href="change_profile_picture.php" name='update' class='btn btn-sm btn-primary' style="padding:10px;">Update Profile Picture</a>
                  <a href="settings.php" name='settings' class='btn btn-sm btn-primary' style="padding:10px;">Settings</a>





                </div>
              <?php } ?>
            </div>

            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">



                  </div>
                </div>
              </div>
              <div class="text-center">

                <h1> <span class="font-weight-bold"><?php echo $user_name ?> </span> </h3>


                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i><?php echo $email ?>
                  </div>
                  <div class="h4 mt-4">
                    <i class="ni education_hat mr-2"></i>DY Patil International University
                  </div>
                  <br>
                  <p>==============================</p>
                  <h3 class="my-4">
                    <?php echo $bio ?></h3>
                  <h3 class="my-4">
                    <?php echo $skills ?></h3>

              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My Posts</h3>
                </div>
                <div class="col-4 text-right">
                 
                </div>
              </div>
            </div> -->


      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">

      </div>
    </div>
  </footer>
</body>

</html>