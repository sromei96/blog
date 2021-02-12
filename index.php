<?php
include_once("path.php");
include_once(ROOT_PATH . "/app/controllers/topics.php");
$postsTitle = 'Main News Posts';
$posts = array();
if (isset($_GET['t_id'])) {
  $postsTitle = "Posts for : '" . $_GET['name'] . "'";
  $posts = getPostsByTopicId($_GET['t_id']);
} else if (isset($_POST['search-term'])) {
  $postsTitle = "You searched for: '" . $_POST['search-term'] . "'";
  $posts = searchPosts($_POST['search-term']);
} else {
  $posts = getPublishedPosts();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
  <h3 class="breaking-news">সর্বশেষ</h3>


  <div class="page-wrapper">

    <div class="post-slider">
      <h1 class="slider-title">জনপ্রিয়</h1>
      <!-- <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i> -->

      <div class="post-wrapper">
        <?php foreach ($posts as $post): ?>
          <div class="post">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="Loading..." class="slider-image">
            <div class="post-info">
              <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
              <!-- //Post creator and Time was here// -->
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="content-clearfix">
      <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postsTitle; ?></h1>
    <?php foreach ($posts as $post): ?>
      <div class="post-clearfix">
        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="Loading..." class="post-image">
        <div class="post-preview">
          <h2 class="post-head"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
          <i class="post-creator"><?php echo $post['username']; ?></i>
          &nbsp;
          <i class="post-time"><?php echo date('F j Y', strtotime($post['created_at'])); ?></i>

          <p class="preview-text">
            <?php $idString = "id" ?>
            <?php echo substr($post['body'], 0, 320) . "<a class='read_more' href='single.php?id= $post[$idString];' >আরো পড়ুন..</a>";?>

          </p>
          <!-- <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a> -->
        </div>
      </div>
    <?php endforeach; ?>
      </div>
      <!-- main-content ENDS -->

    </div>
    <!-- content-clearfix ENDS -->
    <div class="sidebar">
      <div class="section-search">
        <h2 class="section-title">অনুসন্ধান করুন</h2>
        <form class="search" action="index.php" method="post">
          <input type="text" name="search-term" class="text-input" placeholder="Search...">
        </form>
      </div>
      <!-- section-search ENDS -->
      <div class="section-topics">
        <h2 class="section-title">বিষয়শ্রেণী</h2>
        <ul>
          <?php foreach ($topics as $key => $topic): ?>
            <li>
              <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
      </div>
      <!-- section-topics ENDS -->
    </div>
    <!-- sidebar ENDS -->
  </div>
  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
  <!-- page-wrapper ENDS -->
<script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>
