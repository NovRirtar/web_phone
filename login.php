<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    if ($_POST['username'] !== "" && $_POST['password'] !== "") {
        $userModel = new UserModel();
        if ($userModel->Login($_POST['username'], $_POST['password'])) {
            setcookie('user', $_POST['username'], time() + 3600 * 24);
            header("location: index.html");
        } else {
            echo "<script type='text/javascript'>alert('Đăng Nhập Không Thành Công');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>
    <div class="popup__login">
        <div class="form_group">
            <form action="login.php" method="post" class="abs">
                <h3 class="heading">ĐĂNG NHẬP</h3>
                <input type="text" name="username" id="username" placeholder="Nhập Tài Khoản...">
                <div class="frmpw">
                    <input type="password" name="password" id="password" placeholder="Nhập Mật Khẩu..">
                    <i class="fa-solid fa-eye hiden"></i>
                </div>
                <div class="btnlist">
                    <a href="#" class="btnqmk">Quên Mật Khẩu?</a>
                </div>
                <button type="submit" class="btn" onclick="Check()">Đăng Nhập</button>
                <div class="btn-dkn">
                    <span>Bạn chưa có tài khoản?</span>
                    <a href="register.php" class="btndk">Đăng ký ngay</a>
                </div>
                <i class="fa-solid fa-xmark close"></i>
            </form>
        </div>
    </div>
    <script>
        function Check() {
            let usName = document.querySelector("#username").value,
                pass = document.querySelector("#password").value;
            if (usName === "" || pass === "") {
                alert("Phải Điền Đầy Đủ Thông Tin");
            }
        }
    </script>
</body>

</html>