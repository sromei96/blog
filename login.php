<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/includes/header.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="../../assets/css/style.css">
  <title>Login Form</title>
</head>
<body>
  <div class="auth-content">

  <form action="login.php" method="post" class="content" >
    <h2 class = "form-title">Log in</h2>
    <?php include(ROOT_PATH . "/app/helpers/formErrors.php")?>

    <div>
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>"  class="text-input">
    </div>
    <div>
      <label>Password</label>
      <input type="password" name="password" value="<?php echo $password; ?>"  class="text-input">
    </div>
    <div>
      <button type="submit" name="login-btn" class="btn btn-big" >Log In</button>
    </div>
    <p>
      Haven't created an account? <a style="color:blue;" href="register.php">Register</a>
    </p>
  </form>
  </div>
</body>
</html>
<?php include(ROOT_PATH . "/app/includes/footer.php") ?>
