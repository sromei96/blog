<?php
function validatePost($post)
{
  $errors = array();
  if (empty($post['title'])) {
    array_push($errors, 'Post title is required');
  }
  if (empty($post['body'])) {
    array_push($errors, 'Body is required');
  }
  if (empty($post['topic_id'])) {
    array_push($errors, 'A topic must be selected');
  }

  $existingPost = selectOne('posts', ['title' => $post['title']]);
  if($existingPost)
  {
    array_push($errors, 'Post with same title already exists!');
  }
    return $errors;
}
function validatePostUpdate($post)
{
  $errors = array();
  if (empty($post['title'])) {
    array_push($errors, 'Post title is required');
  }
  if (empty($post['body'])) {
    array_push($errors, 'Body is required');
  }
  if (empty($post['topic_id'])) {
    array_push($errors, 'A topic must be selected');
  }
    return $errors;
}
 ?>
