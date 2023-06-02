<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $items = new UserModel();
    $pass = md5($_POST['password']);
    if ($items->check($_POST['username'], $pass)) {
        if ($items->Register($_POST['username'], $pass)) {
            $items->addInforByUser(null, null, null, null, null, 'user.png');
            echo "<script type='text/javascript'>alert('Đăng Ký Thành Công');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Tài Khoản Đã Tồn Tại');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>
    <div class="popup__login">
        <div class="form_group">
            <form action="register.php" method="post" class="abs">
                <h3 class="heading">ĐĂNG KÝ</h3>
                <input type="text" name="username" id="username" placeholder="Nhập Tài Khoản...">
                <div class="frmpw">
                    <input type="password" name="password" id="password" placeholder="Nhập Mật Khẩu..">
                    <i class="fa-solid fa-eye hiden"></i>
                </div>
                <button type="submit" class="btn" onclick="Check()">Đăng ký</button>
                <div class="btn-dkn">
                    <span>Bạn đã có tài khoản?</span>
                    <a href="login.php" class="btndk">Đăng nhập ngay</a>
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