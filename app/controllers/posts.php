<?php
include(ROOT_PATH . "../app/database/db.php");
include(ROOT_PATH . "../app/helpers/validatePost.php");
global $conn;
$table = 'posts';
$errors = array();
$id = '';
$title = '';
$body = '';
$image = '';
$topic_id = '';
$published = '';
$topics = selectAll('topics');
$posts = selectAll($table);

if (isset($_GET['id'])) {
  $post = selectOne($table, ['id' => $_GET['id']]);

  $id = $post['id'];
  $title = $post['title'];
  $body = $post['body'];
  // $image = $post['image'];
  $topic_id = $post['topic_id'];
  $published = $post['published'];
}

if (isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  $post = delete($table, $id);
  $_SESSION['message'] = 'Post Deleted Succesfully';
  $_SESSION['type'] = 'success';
  header('location: ' . BASE_URL . '/admin/posts/index.php');
  exit();
}

if (isset($_GET['published']) && isset($_GET['p_id']))
{
  $published =$_GET['published'];
  $p_id = $_GET['p_id'];
  //Post publishing State//
  $count = update($table, $p_id, ['published' => $published]);
  $_SESSION['message'] = 'Post Publishing Stated Successfully Changed!';
  $_SESSION['type'] = 'success';
  header('location: ' . BASE_URL . '/admin/posts/index.php');
  exit();
}

if(isset($_POST['add-post']))
{
  $errors = validatePost($_POST);

  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . '_' . $_FILES['image']['name'];
    $destination = ROOT_PATH . "/assets/images/" . $image_name;
    $result = move_uploaded_file($_FILES['image']['tmp_name'] ,$destination);
    if ($result) {
      $_POST['image'] = $image_name;
    } else {
      array_push($errors, 'Failed to upload image!');
    }
  }
  else {
    array_push($errors, 'Post image is required!!');
  }
  if(count($errors) === 0) {
    unset($_POST['add-post']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['body']); //Avoiding HTML tags into database//
    $post_id = create($table, $_POST);
    $_SESSION['message'] = 'Post Created Succesfully';
    $_SESSION['type'] = 'success';
    header("location: " . BASE_URL . "/admin/posts/index.php");
    exit();
  }
  else {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $image = $_POST['image'];
    $topic_id = $_POST['topic_id'];
    $published = isset($_POST['published']) ? 1 : 0; //check boxes work differently//
  }
}

if(isset($_POST['update-post']))
{
  $errors = validatePostUpdate($_POST);
  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . '_' . $_FILES['image']['name'];
    $destination = ROOT_PATH . "/assets/images/" . $image_name;
    $result = move_uploaded_file($_FILES['image']['tmp_name'] ,$destination);
    if ($result) {
      $_POST['image'] = $image_name;
    } else {
      array_push($errors, 'Failed to upload image!');
    }
  }
  else {
    array_push($errors, 'Post image is required!!');
  }
  if(count($errors) === 0) {
    $id = $_POST['id'];
    unset($_POST['update-post'], $_POST['id']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['body']); //Avoiding HTML tags into database//
    $post_id = update($table, $id, $_POST);
    $_SESSION['message'] = 'Post Updated Succesfully';
    $_SESSION['type'] = 'success';
    header("location: " . BASE_URL . "/admin/posts/index.php");
    exit();
  }
  else {
    $title = $_POST['title'];
    $body = $_POST['body'];
    // $image = $_POST['image'];
    $topic_id = $_POST['topic_id'];
    $published = isset($_POST['published']) ? 1 : 0; //check boxes work differently//
  }
}
?>
