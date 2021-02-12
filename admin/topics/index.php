<?php include_once("../../path.php"); ?>
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
    <title>Admin Section - Manage Topics</title>
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
          <h2 class="page-title">Manage Topics</h2>
        </center>
        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
          <table>
            <thead>
              <th>SN</th>
              <th>Name</th>
              <th colspan="2">Action</th>
            </thead>
            <tbody>
              <?php foreach ($topics as $key => $topic): ?>
              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $topic['name']; ?></td>
                <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>

        </div>

      </div>
      <!-- Admin Content -->
    </div>
    <!-- Page Wrapper -->
  </body>
</html>
