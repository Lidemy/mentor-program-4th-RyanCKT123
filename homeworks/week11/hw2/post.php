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

	// $stmt = $conn->prepare(
	// 	'select * from good_post where id = ?'
    // );
    $stmt = $conn->prepare(
		'select '.
			'P.id as id, P.content as content, '.
			'P.created_at as created_at, P.title as title, U.id as type_num, U.type as type '.
		'from good_post as P ' .
		'left join good_classify as U on P.type = U.id '.
		'where P.is_deleted IS NULL and P.id = ? '
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
    <title>文章</title>
</head>
<body>
    <nav class="nav_bar">
        <div class="nav_bar_left">
            <a class="nav_bar_blogname" href="index.php" style="text-decoration: none;">GoodBlog</a>
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
        <div class="content">
            <div class="article_title">
                <div class="title">文章：</div>
                <?php if($user['role'] == 'ADMIN') { ?>
                    <a type="button" class="edit_btn" href="edit_article.php?id=<?php echo $row['id'] ?>" >Edit</a>
                <?php } ?>
            </div>
            <div class="edit_input" style="padding: 7px; box-sizing: border-box;">
                <?php echo $row['title'] ?>
            </div>
            <div class="edit_input" style="padding: 7px; box-sizing: border-box;">
                <?php echo $row['type'] ?>
            </div>
			<div name="content" class="edit_article"><?php echo $row['content'] ?></div>
		</div>
    </section>
</body>
</html>