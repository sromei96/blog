<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet" >
  <link rel="stylesheet" href="../../assets/css/style.css">

  <title>Registration Form</title>

</head>
<body>
  <div class="auth-content">

    <form action="register.php" method="post" class="content" >
      <h2 class = "form-title">Register</h2>

      <?php include(ROOT_PATH . "/app/helpers/formErrors.php")?>

      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="input-group">
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="input-group">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="input-group">
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="input-group">
      </div>
      <div>
        <button type="submit" name="register-btn" class="btn btn-big" >Register Now</button>
      </div>
      <p>
        Already a member? <a style="color:blue;" href="login.php">Sign In</a>
      </p>
    </form>
  </div>
</body>
</html>
<?php include(ROOT_PATH . "/app/includes/footer.php") ?>
