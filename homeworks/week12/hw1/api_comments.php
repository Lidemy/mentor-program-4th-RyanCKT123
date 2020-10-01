<?php
    require_once("conn.php");
    header('Content-type:application/json;charset=utf-8');

    if (
      empty($_GET['site_key'])
    ) {
      $json = array(
          "ok" => false,
          "message " => "Please add site_key in url"
      );

      $response = json_encode($json);
      echo $response;
      die();
    }

    $site_key = $_GET['site_key'];

    $sql = "select nickname, content, created_at from good_discussions where site_key = ? order by id desc";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $site_key);
    $result = $stmt->execute();

    if (!$result) {
      $json = array(
        "ok" => false,
        "message" => $conn->error
      );
      $response = json_encode($json);
      echo $response;
      die();
    }

    $result = $stmt->get_result();
    $discussion = array();
    while($row = $result->fetch_assoc()) {
      array_push($discussion, array(
        "nickname" => $row["nickname"],
        "content" => $row["content"],
        "created_at" => $row["created_at"]
      ));
    }

    $json = array(
      "ok" => true,
      "message" => $discussion
    );

    $response = json_encode($json);
    echo $response;
?>
