<?php
	require_once("conn.php");

	$result = $conn->query("select * from good_comments order by id desc");

	if (!$result) {
		die('Error' . $conn->error);
	}
	$username = NULL;
	if (!empty($_COOKIE['username'])) {
		$username = $_COOKIE['username'];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ｍassage Board</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header class="warning">
    	<strong>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</strong>
	</header>
	<main class="board">
		<div>
			<?php if (!$username) { ?>
				<a class="board_btn" href="register.php">註冊<a>
				<a class="board_btn" href="login.php">登入<a>
			<?php } else { ?>
				<a class="board_btn" href="logout.php">登出<a>
				<h3>Hello <?php echo $username;?></h3>
			<?php } ?>
			<h3>Hello <?php echo $username;?></h3>
		</div>
		<h1 class="board_title">Comments</h1>
		<?php
			if (!empty($_GET['errCode'])) {
				$code = $_GET['errCode'];
				$msg = 'Error';
				if ($code === '1') {
					$msg = '資料不齊全';
				}
				echo '<h2 class="error">' . $msg . '<h2>';
			}
		?>
			<form class="board_newcomment_form" method="POST" action="handle_add_comment.php">
				<textarea name="content" rows="5"></textarea>
				<?php if ($username) { ?>
					<input class="board_submit_btn" type="submit"/>
					<?php } else { ?>
				<h3>請登入發布留言</h3>
				<?php } ?>
			</form>
		<div class="board__hr"></div>
		<section>
			<?php
				while($row = $result->fetch_assoc()) {
			?>
				<div class="card">
					<div class="card_avatar"></div>
					<div class="card_body">
						<div class="card_info">
							<span class="card_author">
							<?php echo $row['nickname']; ?>
							</span>
							<span class="card_time">
							<?php echo $row['creat_at']; ?>
							</span>
						</div>
						<p class="card_content"><?php echo $row['content']; ?></p>
					</div>
				</div>
			<?php } ?>
		</section>
	</main>
</body>
</html>
