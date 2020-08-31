<?php
  require_once('conn.php');

  if (
    empty($_POST['content'])
  ) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
  }

  $username = $_COOKIE['username'];
  $user_sql = sprintf(
    "select nickname from good_user where username='%s'"
    ,
    $username
  );
  $user_result = $conn->query($user_sql);
  $row = $user_result->fetch_assoc();
  $nickname = $row['nickname'];
  $content = $_POST['content'];
  
  $sql = sprintf(
    "insert into good_comments(nickname, content) values('%s', '%s')",
    $nickname,
    $content
  );
  
  $result = $conn->query($sql);
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>
