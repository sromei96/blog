<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "../app/controllers/users.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet" >
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Section - Edit User</title>

  </head>
  <body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <div class="admin-wrapper">
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

      <div class="admin-content">
        <div class="button-group">
          <a href="create.php" class="btn btn-big">Add User</a>
          <a href="index.php" class="btn btn-big">Manage Users</a>
        </div>

          <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <center><h2 class = "page-title">Admin - Edit User</h2></center>
            <?php include(ROOT_PATH . "../app/helpers/formErrors.php"); ?>
            <div>
              <label>Username</label>
              <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
              <label>Email</label>
              <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
              <label>Password Confirmation</label>
              <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <div>
              <label>User Role : (Check box for Admin user || Uncheck for Regular user)</label>
              <?php if (isset($admin) && $admin == 1): ?>
                <label>
                  Admin
                  <input type="checkbox" name="admin">
                </label>
              <?php else: ?>
                <label>
                  Admin
                  <input type="checkbox" name="admin" checked>
                </label>
              <?php endif; ?>
            </div>
            <div>
              <button type="submit" name="update-user" class="btn btn-big" >Update User</button>
            </div>
          </form>

      </div>
      <!-- Admin Content -->
    </div>
    <!-- Page Wrapper -->

  </body>
</html>
