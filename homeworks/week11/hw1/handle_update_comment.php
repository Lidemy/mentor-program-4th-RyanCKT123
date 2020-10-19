<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');
  
  if (
    empty($_POST['content'])
  ) {
    header('Location: update_comment.php?errCode=1&id='.$_POST['id']);
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $id = $_POST['id'];
  $user = getUserFromUsername($username);
  $content = $_POST['content'];
  if ($user["role"] == "ADMIN") {
    $sql = "update good_comments set content=? where id=?";
  } else {
    $sql = "update good_comments set content=? where id=? and username=?";
  }
  $stmt = $conn->prepare($sql);
  if ($user["role"] == "ADMIN") {
    $stmt->bind_param('si', $content, $id);
  } else {
    $stmt->bind_param('sis', $content, $id, $username);
  }
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>