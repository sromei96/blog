<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet" >
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Section - Manage Posts</title>
  </head>
  <body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <div class="admin-wrapper">
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

      <div class="admin-content">
        <div class="button-group">
          <a href="create.php" class="btn btn-big">Add Post</a>
          <a href="index.php" class="btn btn-big">Manage Post</a>
        </div>
        <div class="admin">
          <center>
          <h2 class="page-title">Manage Posts</h2>
        </center>
        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
          <table>
            <thead>
              <th>SN</th>
              <th>Title</th>
              <th>Author</th>
              <th colspan="2">Action</th>
            </thead>
            <tbody>
              <?php foreach ($posts as $key => $post): ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><?php echo $post['title'] ?></td>
                  <th><?php echo $post['user_id'] ?></th>
                  <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                  <td><a href="index.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                  <?php if ($post['published']): ?>
                    <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">unpublish</a></td>
                  <?php else: ?>
                    <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish"> publish</a></td>
                  <?php endif; ?>
                </tr>

              <?php endforeach; ?>

              <!-- <tr>
                <td>2</td>
                <td>Another News</td>
                <th>N J Shukla</th>
                <td><a href="#" class="edit">edit</a></td>
                <td><a href="#" class="delete">delete</a></td>
                <td><a href="#" class="publish">publish</a></td>
              </tr> -->
            </tbody>
          </table>

        </div>

      </div>
      <!-- Admin Content -->
    </div>
    <!-- Page Wrapper -->

  </body>
</html>
