<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque&family=Cabin:wght@500&family=Josefin+Sans&family=Lato&family=Montserrat&family=Odibee+Sans&family=Pixelify+Sans&family=Tilt+Neon&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="login-container">
            <div class="login-background">
                <video autoplay loop muted>
                    <source type="video/mp4" src="../assets/video_background.mp4">
                </video>
            </div>
            <div class="login-form">
                <div class="login-title">Tính Tiền Điện</div>
                <form action="" method="post">
                    <h4>Chào mừng đến với website tính tiền điện</h4>
                    <div class="login-side">
                        <div class="login-input">
                            <span>Tên đăng nhập</span>
                            <input type="text" name="username" required>
                        </div>
                        <div class="login-input">
                            <span>Mật khẩu</span>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" name="dangnhap" class="submit">Đăng nhập</button>
                    <div class="register-side">
                        <span>Chưa có tài khoản ?</span><a href="../Authen/register.php">Đăng kí</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>