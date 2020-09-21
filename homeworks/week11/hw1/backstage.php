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

	if ($user === NULL || $user['role'] !== 'ADMIN') {
		header('Location: index.php');
		exit;
	}

	$stmt = $conn->prepare(
		'select id, role, nickname, username from good_user order by id asc'
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
	<title>Ｍassage Board</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header class="warning">
    	<strong>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</strong>
	</header>
	<main class="board">
		<div>
			<a class="board_btn" href="index.php">回留言版<a>
		</div>
		<h1 class="board_title">後台管理</h1>
			<table class="adminCols">
				<thead>
				<tr>
				<th>Username</th>
				<th>Nickname</th>
				<th>Role</th>
				<th>comment_counts</th>
				<th>adjust</th>
				</tr>
				</thead>
				<?php
					while($row = $result->fetch_assoc()) {
				?>
				<tbody>
				<tr>
				<td><?php echo escape($row['username']) ?></td>
				<td><?php echo escape($row['nickname']) ?></td>
				<td><?php echo escape($row['role']) ?></td>
				<td>0</td>
				<td>
				<form method="POST" action="update_role.php">
					<select name='role'>
						<option>ADMIN</option>
						<option>NORMAL</option>
						<option>BANNED</option>
					</select>
					<input type="hidden" name="username" value="<?php echo $row['username'] ?>" />
					<input type="submit" value="Change"/>
				</form>
				</td>
				</tr>
				</tbody>
				<?php 
				}
				?>
			</table>
	</main>
</body>
</html>


