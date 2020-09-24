<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');
  
  if (
    empty($_POST['content'])
  ) {
    header('Location: edit_article.php?errCode=1&id='.$_POST['id']);
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $id = $_POST['id'];
  $user = getUserFromUsername($username);
  $content = $_POST['content'];
  $title = $_POST['title'];
  $type = $_POST['type'];
  print_r($type);


  $sql = "update good_post set content=?, title=?, type=? where id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssii', $content, $title, $type, $id);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: backstage.php");
?>
