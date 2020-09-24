
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Blog</title>
</head>
<body>
    <form class="blog_login" method="POST" action="handle_login.php">
        <div class= "container">
            <div class="blog_login_title">Log In</div>
            <div class="blog_login_col">
                <div class="blog_input_title">USERNAME</div>
                <input type="text" name="username" class="input_col"></input>
            </div>
            <div class="blog_login_col">
                <div class="blog_input_title">PASSWORD</div>
                <input type="password" name="password" class="input_col"></input>
            </div>
            <input type="submit" class="blog_login_btn" value="SIGN IN"></input>
        <div class= "container">
    </form>
</body>
</html>
