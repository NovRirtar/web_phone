<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
if (!isset($_COOKIE['user'])) {
    header("location:index.php");
} else {
    $userModel = new UserModel();
    $getIdUser = $userModel->getIdByUser($_COOKIE['user']);
    $passsql = $userModel->checkadmin($getIdUser)['passwords'];
    if (isset($_POST['passwordold']) and $_POST['passwordold'] != null and $_POST['passwordnew'] != null) {
        $passold = md5($_POST['passwordold']);
        if ($passsql != $passold) {
            echo "<script type='text/javascript'>alert('Mật Khẩu Cũ Không Đúng');</script>";
        } else {
            $passnew = md5($_POST['passwordnew']);
            if ($userModel->changePass($passnew, $getIdUser)) {
                echo "<script type='text/javascript'>alert('Đổi Mật Khẩu Thành Công');</script>";
?>
<script language="javascript">
    location.href = "user.php"
</script>
<?php
            }
        }
    } else if (isset($_POST['passwordold']) and $_POST['passwordold'] == null) {
        echo "<script type='text/javascript'>alert('Không Được Bỏ Trống');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>
    <div class="popup__login">
        <div class="form_group">
            <form action="changepass.php" method="post" class="abs">
                <h3 class="heading">ĐỔI MẬT KHẨU</h3>
                <input type="text" disabled name="username" id="username" value="<?php echo $_COOKIE['user'] ?>">
                <div class="frmpw">
                    <input type="text" name="passwordold" id="passwordold" placeholder="Nhập Mật Khẩu Cũ..">
                </div>
                <div class="frmpw">
                    <input type="text" name="passwordnew" id="passwordnew" placeholder="Nhập Mật Khẩu Mới..">
                </div>
                <button type="submit" class="btn" onclick="Check()">Lưu</button>
                <i class="fa-solid fa-xmark close"></i>
            </form>
        </div>
    </div>
    <script>
        function Check() {
            let usNat.querySelector("#username").value,
                pass = document.querySelector("#password").value;
            if (usName === "" || pass === "") {
                alert("Phải Điền Đầy Đủ Thông Tin");
            }
        }
        function click() {
            document.querySelector('.close').addEventListener('click', () => {
                location.href = "user.php";
            })
        }
        click();
    </script>
</body>

</html>