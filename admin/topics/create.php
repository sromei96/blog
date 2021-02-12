<?php include("../../path.php");?>
<?php include(ROOT_PATH . "/app/controllers/topics.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet" >
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
        <title>Admin Section - Create Topics</title>
  </head>
  <body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <div class="admin-wrapper">
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


      <div class="admin-content">
        <div class="button-group">
          <a href="create.php" class="btn btn-big">Add Topic</a>
          <a href="index.php" class="btn btn-big">Manage Topics</a>
        </div>
        <div class="admin">
          <center>
          <h2 class="page-title">Add Topic</h2>
          </center>
          <form class="input-adm" action="create.php" method="post">
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php")?>
            <div>
              <label>Name</label>
              <input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
            </div>
            <div>
              <label>Description</label>
              <textarea name="description" id="body"><?php echo $description; ?></textarea>
            </div>
            <div>
              <button type="submit" name="add-topic" class="btn btn-big">Add Topic</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Admin Content -->
    </div>
    <!-- Page Wrapper -->

  </body>
</html>
