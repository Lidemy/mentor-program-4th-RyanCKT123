<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  $page = $_POST['page'];
  
  if (
    empty($_POST['content']) ||
    empty($_POST['id']) ||
    empty($_POST['title']) ||
    empty($_POST['type'])
  ) {
    header('Location: ' . $page);
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $id = $_POST['id'];
  $user = getUserFromUsername($username);
  $content = $_POST['content'];
  $title = $_POST['title'];
  $type = $_POST['type'];


  $sql = "update good_post set content=?, title=?, type=? where id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssii', $content, $title, $type, $id);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header('Location: ' . $page);
?>
