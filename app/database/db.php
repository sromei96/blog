<?php
session_start(); //user session starts//
require('connect.php');
function dd($value){
  echo "<pre>", print_r($value,true), "<pre>";
  die();
}

function executeQuery($sql, $data){
  global $conn;
  $stmt = $conn->prepare($sql);
  //echo $conn -> error;die; ///CHECKING PARAMETER///
  $values = array_values($data);
  $types = str_repeat('s',count($values));
  try {
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
  } catch (\Exception $e) {
    dd($e);

  }
  return $stmt;

}

function selectAll($table, $conditions = []){
  global $conn;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) {
    //For condition less query//
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
  else {
    //For condition applied query//
    //$sql = "SELECT * FROM $table WHERE username = 'sromei' AND admin = 1";//
    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?"; //For 1st Condition//
      }
      else {
        $sql = $sql . " AND $key=?"; //For 2nd Condition//
      }
      $i++;

    }

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }

}

function selectOne($table, $conditions){
  global $conn;
  $sql = "SELECT * FROM $table";
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " WHERE $key=?"; //For 1st Condition//
    }
    else {
      $sql = $sql . " AND $key=?"; //For 2nd Condition//
    }
    $i++;

  }
  //$sql = "SELECT * FROM $table WHERE username = 'sromei' AND admin = 1";//
  //Individual Search//
  $sql = $sql . " LIMIT 1";

  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc();
  return $records;
}

function create($table, $data){
  //INSERT INTO users SET username=?, admin=?, email=?, password=?//
  global $conn;
  $sql = "INSERT INTO $table SET ";

  $i=0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?"; //For 1st Condition//
    }
    else {
      $sql = $sql . ", $key=?"; //For 2nd Condition//
    }
    $i++;
  }
  //dd($sql);

  $stmt  = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;
}

function update($table, $id, $data){
  //UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=?//
  global $conn;
  $sql = "UPDATE $table SET ";

  $i=0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?"; //For 1st Condition//
    }
    else {
      $sql = $sql . ", $key=?"; //For 2nd Condition//
    }
    $i++;
  }
  $sql = $sql . " WHERE id=?";
  $data['id'] = $id;

  $stmt  = executeQuery($sql, $data);
  return $stmt->affected_rows;
}

function delete($table, $id){
  //DELETE FROM users WHERE id=?//
  global $conn;
  $sql = "DELETE FROM $table WHERE id=?";

  $stmt  = executeQuery($sql, ['id' => $id]);
  return $stmt->affected_rows;
}
function getPublishedPosts()
{
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p
          JOIN users AS u ON p.user_id=u.id
          WHERE p.published=?";
  $stmt = executeQuery($sql, ['published' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}
function getPostsByTopicId($topic_id)
{
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p
          JOIN users AS u ON p.user_id=u.id
          WHERE p.published=? AND topic_id=?";
  $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}
function searchPosts($term)
{
  global $conn;
  $match = '%' . $term . '%';
  $sql = "SELECT p.*, u.username FROM posts AS p
          JOIN users AS u ON p.user_id=u.id
          WHERE p.published=?
          AND p.title LIKE ? OR p.body LIKE ?";
  $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

// $data = [
//   'id' => 1,
//   'name' => 'test',
//   'description' => 'ajjdkflkfkejekfk',
//   //'email' => 'test@gmail.com',
//   //'password' => 'test1'
// ];
//
//  $id = create('topics', $data);
//       dd($stmt);


?>
