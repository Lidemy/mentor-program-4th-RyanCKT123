<?php
	session_start();
	require_once("conn.php");
	require_once("utils.php");

	// $stmt = $conn->prepare('select * from good_comments order by id desc');
	$stmt = $conn->prepare(
		'select '.
		  'C.id as id, C.content as content, '.
		  'C.creat_at as creat_at, U.nickname as nickname, U.username as username '.
		'from good_comments as C ' .
		'left join good_user as U on C.username = U.username '.
		'order by C.id desc'
	);
	$result = $stmt->execute();
	if (!$result) {
		die('Error' . $conn->error);
	}
	$result = $stmt->get_result();
	/*
    1. 從 cookie 裡面讀取 PHPSESSID(token)
    2. 從檔案裡面讀取 session id 的內容
    3. 放到 $_SESSION
  	*/
	$username = NULL;
	$user = NULL;
	if(!empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$user = getUserFromUsername($username);
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
				<span class="board_btn update-nickname">編輯暱稱</span>
				<form class="hide board_nickname-form board_newcomment_form" method="POST" action="update_user.php">
					<div class="board_nickname">
						<span>新的暱稱：</span>
						<input type="text" name="nickname" />
					</div>
					<input class="board_btn" type="submit" />
				</form>
				<h3>Hello <?php echo $user['nickname'];?></h3>
			<?php } ?>
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
							<?php echo escape($row['nickname']); ?>
							(@<?php echo escape($row['username']); ?>)
							</span>
							<span class="card_time">
							<?php echo escape($row['creat_at']); ?>
							</span>
							<?php if ($row['username'] === $username) { ?>
                    			<a href="update_comment.php?id=<?php echo $row['id'] ?>">Edit</a>
                  			<? } ?>
						</div>
						<p class="card_content"><?php echo escape($row['content']); ?></p>
					</div>
				</div>
			<?php } ?>
		</section>
	</main>
	<script>
		var btn = document.querySelector('.update-nickname')
		btn.addEventListener('click', function() {
			var form = document.querySelector('.board_nickname-form')
			form.classList.toggle('hide')
		})
  	</script>
</body>
</html>