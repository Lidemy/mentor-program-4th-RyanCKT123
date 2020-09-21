<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');
  
  if (
    empty($_GET['id'])
  ) {
    header('Location: Location: index.php?errCode=1');
    die('資料不齊全');
  }

  $id = $_GET['id'];
  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);
  if ($user["role"] == "ADMIN") {
    $sql = "update good_comments set is_deleted=1 where id=? ";
  } else {
    $sql = "update good_comments set is_deleted=1 where id=? and username=?";
  }
  $stmt = $conn->prepare($sql);
  if ($user["role"] == "ADMIN") {
    $stmt->bind_param('i', $id);
  } else {
    $stmt->bind_param('is', $id,  $username);
  }
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>
