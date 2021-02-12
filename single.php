<?php
include_once("path.php");
include_once(ROOT_PATH . "/app/controllers/posts.php");
if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$posts = getPublishedPosts();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title><?php echo $post['title']; ?> | Sabbir</title>
</head>
<body class="singleBody">
  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

  <div class="main-content-wrapper">
    <div class="main-content single">
      <h1 class="post-title"><?php echo $post['title']; ?></h1>
      <div class="post-content">
        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="Loading...">
        <?php echo $post['body']; ?>
      </div>

    </div>

  </div>


  <div class="sidebar single">
    <div class="section popular">
      <h2 class="section-title">Popular</h2>
      <?php foreach ($posts as $p): ?>
        <div class="post clearfix">
          <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="Loading...">
          <a href="single.php?id=<?php echo $p['id']; ?>">
          <h4><?php echo $p['title'] ?></h4>
          </a>
        </div>

      <?php endforeach; ?>



    </div>

  </div>
  <div class="section-topics">
    <h2 class="section-title">Topics</h2>
    <ul>

      <?php foreach ($topics as $key => $topic): ?>
        <li>
          <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a>
        </li>

    <?php endforeach; ?>
    </ul>
  </div>



</body>
</html>
