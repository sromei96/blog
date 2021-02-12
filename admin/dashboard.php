<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet" >
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Admin Section - Dashboard</title>
  </head>
  <body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <div class="admin-wrapper">
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

      <div class="admin-content">
        <div class="button-group">
          <!-- <a href="create.php" class="btn btn-big">Add Post</a>
          <a href="index.php" class="btn btn-big">Manage Post</a> -->
        </div>
        <div class="admin">
          <center>
          <h2 class="page-title">Dashboard</h2>
        </center>
        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>



        </div>

      </div>
      <!-- Admin Content -->
    </div>
    <!-- Page Wrapper -->

  </body>
</html>
