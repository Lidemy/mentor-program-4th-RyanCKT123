<?php
	session_start();
	require_once("conn.php");
	require_once("utils.php");

	$id = $_GET['id'];

	$username = NULL;
	$user = NULL;
	if(!empty($_SESSION['username'])) {
	  $username = $_SESSION['username'];
	  $user = getUserFromUsername($username);
	}

	$stmt = $conn->prepare(
		'select * from good_post where id = ?'
	);
	$stmt->bind_param("i", $id);
	$result = $stmt->execute();
	if (!$result) {
		die('Error' . $conn->error);
	}
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>新增文章</title>
</head>
<body>
    <nav class="nav_bar">
        <div class="nav_bar_left">
            <div class="nav_bar_blogname">GoodBlog</div>
            <div class="nav_bar_btn">文章列表</div>
            <div class="nav_bar_btn">分類專區</div>
            <div class="nav_bar_btn">關於我</div>
        </div>
        <div class="nav_bar_right">
            <div class="nav_bar_btn">管理後台</div>
            <div class="nav_bar_btn">登入</div>
        </div>
    </nav>
    <section class="banner">
        <div>存放技術之地</div>
        <div class="banner_subtitle">Welcome to my blog</div>
    </section>
    <section class="contents">
        <form class="content" method="POST" action="handle_add_article.php">
            <div class="title">發表文章：</div>
            <input class="edit_input" name="title" value="請輸任文章標題"></input>
            <select name="type" class="edit_input">
            <?php
                    $stmt = $conn->prepare(
                    'select * from good_classify'
                    );
                    $result = $stmt->execute();
                    $result = $stmt->get_result();
                ?>
                <option value="">請選擇文章分類</option>
                <?php 
                    while($type = $result->fetch_assoc()) {
                ?>
                    <option value=<?php echo $type['id']?>>
                        <?php echo $type['type'] ?>
                    </option>
                <?php } ?>
            </select>
			<textarea name="content" class="edit_article"></textarea>
            <button type="submit" class="readmore_btn">提交</button>
		</form>
    </section>
</body>
</html>