<html>
<head>
    <title>Register Page</title>
</head>

<link rel="stylesheet" href="/views/assets/css/main.css">
<body>
<div class="widther">
    <div class="wrapper">
        <div class="login_page">
            <?php
            if(isset($_SESSION['session'])){
                header('Location: /dashboard');
            }
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                session_destroy();
            }
            ?>
            <form action="/action" id="register" method="post">
                <input type="hidden" name="action" value="register">
                <div class="field">
                    <span>Username</span>
                    <input class="input username" type="text" name="username" required>
                </div>
                <div class="field">
                    <span>Email</span>
                    <input class="input email" type="email" name="email" required>
                </div>
                <div class="field">
                    <span>Password</span>
                    <input class="input password" type="password" name="password" required>
                </div>
                <div class="field">
                    <span>Re-Password</span>
                    <input class="input password" type="password" name="repassword" required>
                </div>
                <div class="field">
                    <input class="submit" type="submit" name="submit" value="Register">
                </div>
            </form>
            Have an Account? <a href="/login">Login Here</a>
        </div>
    </div>
</div>
</body>
</html>