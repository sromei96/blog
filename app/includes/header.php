<?php include("path.php"); ?>
<?php include_once(ROOT_PATH . "/app/database/db.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <!-- <center>
  <h1>omzZ News Portal</h1>

  <h3>Everything You Need to Know Today!</h3>
</center> -->
<header>
  <div class="logo">
    <h1 class="logo-text"><span>A News</span> Site</h1>
  </div>
  <!-- <i class="fa fa-bars menu-toggle"></i> -->
  <div class="menues">
    <ul class="nav">

      <li class="option"><a class="one" href="<?php echo BASE_URL . '/index.php'; ?>">Home</a></li>
      <li class="option"><a class="one" href="#">International</a></li>
      <li class="option"><a class="one" href="#">Mobile</a></li>
      <li class="option"><a class="one" href="#">Computer</a></li>
      <li class="option"><a class="one" href="#">Invention</a></li>
      <li class="option"><a class="one" href="#">About Us</a></li>

    </ul>


    <?php if (isset($_SESSION['id'])): ?>
      <div class = "user_info">
        <a class = "user-name" href="#">
          <i class="fa fa-user"></i>

            <?php echo $_SESSION['username']; ?>

          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
        <ul>
          <?php if (($_SESSION['admin'])): ?>
            <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
          <!--  -->
            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <!-- </li> -->
    <?php else: ?>

      <div class="user_info_login">
        <ul>
          <li class="option_login"><a class="one" href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
          <li class="option_login"><a class="one" href="<?php echo BASE_URL . '/login.php' ?>">Log in</a></li>
        </ul>
      </div>



    <?php endif; ?>

  </div>




</header>
<script src="https://kit.fontawesome.com/ea512097d8.js" crossorigin="anonymous"></script>
</body>
</html>
