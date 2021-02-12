<?php include("../../path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet" >
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <title>Admin Section - Create Posts</title>
</head>
<body>
  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <div class="admin-wrapper">
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


    <div class="admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big">Add Post</a>
        <a href="index.php" class="btn btn-big">Manage Posts</a>
      </div>
      <div class="admin">
        <center>
          <h2 class="page-title">Add Post</h2>
        </center>

        <form class="input-adm" action="create.php" method="post" enctype="multipart/form-data">
          <?php include(ROOT_PATH . "../app/helpers/formErrors.php"); ?>
          <div>
            <label>Title</label>
            <input type="text" value="<?php echo $title; ?>" name="title" class="text-input">
          </div>
          <div>
            <label>Body</label>
            <textarea name="body" id="body" class="content-body"><?php echo $body; ?></textarea>
          </div>
          <div>
            <label>Image</label>
            <input type="file" name="image" value="<?php echo $image; ?>" class="text-input">
          </div>
          <div>
            <label>Topic</label>
            <select name="topic_id" class="text-input">
              <?php foreach ($topics as $key => $topic): ?>
                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                  <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php else: ?>
                  <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <?php if (empty($published)): ?>
              <label>
                Publish
                <input type="checkbox" name="published">
              <?php else: ?>
                Publish
                <input type="checkbox" name="published" checked>
              </label>
            <?php endif; ?>

          </div>
          <div>
            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Admin Content -->
  </div>
  <!-- Page Wrapper -->

</body>
</html>
