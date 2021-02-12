<?php
function validateUser($user)
{
  $errors = array();
  if (empty($user['username'])) {
    array_push($errors, 'Username is required');
  }
  if (empty($user['email'])) {
    array_push($errors, 'Email is required');
  }
  if (empty($user['password'])) {
    array_push($errors, 'Password is required');
  }
  if (empty($user['passwordConf'])) {
    array_push($errors, 'Confirmed Password is required');
  }
  if ($user['passwordConf'] !== $_POST['password']) {
    array_push($errors, 'Confirmed Password did not match.');
  }

  $existingEmail = selectOne('users', ['email' => $user['email']]);
  if($existingEmail)
  {
    array_push($errors, 'Email already exists!');
  }
  $existingUser = selectOne('users', ['username' => $user['username']]);
  if($existingUser)
  {
    array_push($errors, 'Username already exists');
  }
    return $errors;
}
function validateUserUpdate($user)
{
  $errors = array();
  if (empty($user['username'])) {
    array_push($errors, 'Username is required');
  }
  if (empty($user['email'])) {
    array_push($errors, 'Email is required');
  }
  if (empty($user['password'])) {
    array_push($errors, 'Password is required');
  }
  if (empty($user['passwordConf'])) {
    array_push($errors, 'Confirmed Password is required');
  }
  if ($user['passwordConf'] !== $_POST['password']) {
    array_push($errors, 'Confirmed Password did not match.');
  }
    return $errors;
}

function validateLogin($user)
{
  $errors = array();
  if (empty($user['username'])) {
    array_push($errors, 'Username is required');
  }
  if (empty($user['password'])) {
    array_push($errors, 'Password is required');
  }
  return $errors;
}
 ?>
