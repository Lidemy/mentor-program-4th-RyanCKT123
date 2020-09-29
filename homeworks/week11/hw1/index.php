<?php
	session_start();
	require_once("conn.php");
	require_once("utils.php");

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

	//分頁功能
	$page = 1;
	if (!empty($_GET['page'])) {
		$page = intval($_GET['page']);
	}
	$items_per_page = 5;
	$offset = ($page - 1) * $items_per_page;

	$stmt = $conn->prepare(
		'select '.
			'C.id as id, C.content as content, '.
			'C.creat_at as creat_at, U.nickname as nickname, U.username as username '.
		'from good_comments as C ' .
		'left join good_user as U on C.username = U.username '.
		'where C.is_deleted IS NULL '.
		'order by C.id desc '.
		'limit ? offset ? '
	);
	$stmt->bind_param('ii', $items_per_page, $offset);
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
				<a class="board_btn" href="register.php">註冊</a>
				<a class="board_btn" href="login.php">登入</a>
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
					<?php if ($user['role'] == 'ADMIN') { ?>
						<spin><a class="board_btn" href="backstage.php">後台管理</a></spin>
					<?php } ?>
				<h3>Hello <?php echo escape($user['nickname']); ?></h3>
			<?php } ?>
			<label class="form-switch">
  				<input type="checkbox" name="checkbox">
					<i></i>
					Night Mode  
			</label>
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
							<?php if ($row['username'] === $username || $user['role'] == 'ADMIN') { ?>
								<a href="update_comment.php?id=<?php echo $row['id'] ?>">Edit</a>
								<a href="handle_delete_comment.php?id=<?php echo $row['id'] ?>">Delete</a>
                  			<? } ?>
						</div>
						<div class="card_content"><?php echo escape($row['content']); ?></div>
					</div>
				</div>
			<?php } ?>
		</section>
		<div class="board__hr"></div>
		<?php
			$stmt = $conn->prepare(
			'select count(id) as count from good_comments where is_deleted IS NULL'
			);
			$result = $stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$count = $row['count'];
			$total_page = ceil($count / $items_per_page);
		?>
		<div class="page-info">
			<span>總共有 <?php echo $count ?> 筆留言，頁數：</span>
			<span><?php echo $page ?> / <?php echo $total_page ?></span>
		</div>
		<div class="paginator">
			<?php if ($page != 1) { ?>
				<a href="index.php?page=1">首頁</a>
				<a href="index.php?page=<?php echo $page - 1 ?>">上一頁</a>
			<?php } ?>
			<?php if ($page != $total_page) { ?>
				<a href="index.php?page=<?php echo $page + 1 ?>">下一頁</a>
				<a href="index.php?page=<?php echo $total_page ?>">最後一頁</a> 
			<?php } ?>
      	</div>  
	</main>
	<script>
		//Nightmode
		const checkbox = document.querySelector( 'input[name=checkbox]')
		const  board = document.querySelector('.board' )
		checkbox.addEventListener('change', function( ){
			let check = false
            if (this.checked){
				document.body.style.backgroundColor="#4F4F4F";
                board.style.backgroundColor="black";
				board.style.color="white";
        	} else {
				document.body.style.backgroundColor="#f7f7f7";
				board.style.backgroundColor="white";
				board.style.color="black";
			}
		})
		//Nickname Edit
		var btn = document.querySelector('.update-nickname')
		btn.addEventListener('click', function() {
			var form = document.querySelector('.board_nickname-form')
			form.classList.toggle('hide')
		})
  	</script>
</body>
</html>