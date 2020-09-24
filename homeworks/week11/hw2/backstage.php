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

    $stmt = $conn->prepare(
        'select * from good_post '.
        'where is_deleted IS NULL '.
		'order by id desc '
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
    <title>Blog後台管理</title>
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
            <a class="nav_bar_btn" href="add_article.php" >新增文章</a>
            <div class="nav_bar_btn">登入</div>
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
            <div class="content_backstage">
                <div class="item_backstage">
                    <div class="title_backstage"><?php echo escape($row['title']); ?></div>
                    <div>
                        <div class="stamp_time"><?php echo escape($row['created_at']); ?></div>
                        <a class="edit_btn" href="edit_article.php?id=<?php echo $row['id'] ?>">Edit</a>
                        <a class="edit_btn" href="handle_delete_article.php?id=<?php echo $row['id'] ?>" >Delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</body>
</html>