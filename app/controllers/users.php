<?php
include_once(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUsers.php");
$errors = array();
$table = 'users';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$admin = '';
$id = '';

//$admin_users = selectAll($table, ['admin' => 1]);// For showing ADMINS
$users = selectAll($table);

function LoginUser($user)
{
  $_SESSION['id'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['admin'] = $user['admin'];
  $_SESSION['message'] = 'You are now logged in';
  $_SESSION['type'] = 'success';

  if ($_SESSION['admin']) {
    header('location: ' . BASE_URL . '/admin/dashboard.php');
  } else {
    header('location: ' . BASE_URL . '/index.php');
  }
  exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin']))
{
  $errors = validateUser($_POST);
  if (count($errors) === 0)
  {
    unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (isset($_POST['admin'])) {
      $_POST['admin']=1;
      $user_id = create($table, $_POST);
      $_SESSION['message'] = 'Admin User created successfully!';
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL . '/admin/users/index.php');
      exit();
    }
    else {
      $_POST['admin']=0;
      $user_id = create($table, $_POST);
      $user = selectOne($table,['id' => $user_id]);
      LoginUser($user);
    }
  }
  else {
    $username = $_POST['username'];
    $admin = isset($_POST['admin']) ? 1 : 0;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $user = selectOne($table, ['id' => $id]);
  $id = $user['id'];
  $username = $user['username'];
  $admin = $user['admin'] == 1 ? 1 : 0;
  $email = $user['email'];
  $password = $user['password'];
  $passwordConf = $user['password'];

}

if (isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  $user = delete($table, $id);
  $_SESSION['message'] = 'User Deleted Succesfully';
  $_SESSION['type'] = 'success';
  header('location: ' . BASE_URL . '/admin/users/index.php');
  exit();
}

if (isset($_POST['login-btn'])){
  $errors = validateLogin($_POST);
  if (count($errors) === 0) {
    $user = selectOne($table, ['username' => $_POST['username']]);
    if ($user && password_verify($_POST['password'], $user['password'])) {
      //Log in//
      LoginUser($user);
    } else {
      array_push($errors, 'Wrong Credentials!');
    }
  }
  $username = $_POST['username'];
  $password = $_POST['password'];

}

if (isset($_POST['update-user'])) {

  $errors = validateUserUpdate($_POST);
  if (count($errors) === 0)
  {
    $id = $_POST['id'];
    unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_POST['admin']= isset($_POST['admin']) ? 1 : 0;
    $count = update($table, $id, $_POST);
    //dd($_POST);
    $_SESSION['message'] = 'User updated successfully!';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '../admin/users/index.php');
    exit();
  }
  else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    $admin = isset($_POST['admin']) ? 1 : 0;
  }
}

?>
