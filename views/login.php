<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="/views/assets/css/main.css">
</head>
<body>
<div class="widther">
    <div class="wrapper">
        <div class="login_page">
            <?php
            if(isset($_SESSION['session'])){
                header('Location: /dashboard');
            }
            if(isset($_SESSION['status']) && $_SESSION['status'] == "success"){
                echo $_SESSION['message'];
                $_SESSION['session'] = md5($_SESSION['username']);
                ?>
            <meta http-equiv="refresh" content="2; url=/dashboard" />
            <?php } elseif(isset($_SESSION['status']) && $_SESSION['status'] == "failed") {
                echo $_SESSION['message'];
                session_destroy();
            }
            ?>
            <form action="/action" id="login" method="post">
                <input type="hidden" name="action" value="login">
                <div class="field">
                    <input class="input username" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="field">
                    <input class="input password" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="field">
                    <input class="submit" type="submit" name="submit" value="Login">
                </div>
            </form>
            Don't have account? <a href="/register">Register Here</a>
        </div>
    </div>
</div>
</body>
</html>