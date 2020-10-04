<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');
  
  if (
    empty($_GET['id'])
  ) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
  }

  $id = $_GET['id'];
  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);
  if ($user["role"] == "ADMIN") {
    $sql = "update good_post set is_deleted=1 where id=? ";
  } else {
    header('Location: index.php?errCode=1');
    die('You have no authority!!!');
  }
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $id);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: backstage.php");
?>
