<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');
  
  if (
    empty($_POST['content']) || empty($_POST['title'])
  ) {
    header('Location: add_article.php');
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);
  $content = $_POST['content'];
  $title = $_POST['title'];
  $type = $_POST['type'];
  print_r($type);

  $sql = "insert into good_post(title, content, type) values(?, ?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssi', $title, $content, $type);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: backstage.php");
?>
