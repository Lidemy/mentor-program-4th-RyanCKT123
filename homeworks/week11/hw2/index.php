<?php
    session_start();
    require_once("conn.php");
    require_once("utils.php");

    $username = NULL;
	$user = NULL;
	if(!empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$user = getUserFromUsername($username);
	}

    $items_per_page = 5;
    $stmt = $conn->prepare(
		'select '.
			'P.id as id, P.content as content, '.
			'P.created_at as created_at, P.title as title, U.id as type_num, U.type as type '.
		'from good_post as P ' .
		'left join good_classify as U on P.type = U.id '.
		'where P.is_deleted IS NULL '.
		'order by P.id desc '.
		'limit 5 '
	);
    $result = $stmt->execute();
	if (!$result) {
		die('Error' . $conn->error);
	}
    $result = $stmt->get_result();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Blog</title>
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
            <?php if (!$username) { ?>
                <a class="nav_bar_btn" href="login.php" >登入</a>
            <?php } else if($user['role'] == 'ADMIN') { ?>
                <a class="nav_bar_btn" href="backstage.php">管理後台</a>
                <a class="nav_bar_btn" href="logout.php">登出</a>
            <?php } else { ?>
                <a class="nav_bar_btn" href="logout.php">登出</a>
            <?php } ?>
        </div>
    </nav>
    <section class="banner">
        <div>存放技術之地</div>
        <div class="banner_subtitle">Welcome to my blog</div>
    </section>
    <section class="contents">
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
            <div class="content">
                <div class="article_title">
                    <div class="title"><?php echo escape($row['title']); ?></div>
                    <?php if($user['role'] == 'ADMIN') { ?>
                        <a type="button" class="edit_btn" href="edit_article.php?id=<?php echo $row['id'] ?>" >Edit</a>
                    <?php } ?>
                </div>
                <div class="stamp">
                    <div class="stamp_time"><?php echo escape($row['created_at']); ?></div>
                    <div class="stamp_classfy"><?php echo escape($row['type']); ?></div>
                </div>
                <div class="article"><?php echo escape($row['content']); ?></div>
                <button type="button" class="readmore_btn" >READ MORE</button>
            </div>
        <?php } ?>
    </section>
</body>
</html>