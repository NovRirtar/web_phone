<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "app/models/$className.php";
});
if (!isset($_COOKIE['user'])) {
    header("location: index.php");
}
$userModel = new UserModel();
if (isset($_COOKIE['user'])) {
    $id = $userModel->getIdByUser($_COOKIE['user']);
    if (isset($_POST['name'])) {
        $avata = $_FILES['img']['name'];
        $file = 'public/avata/' . $avata;
        if (
            is_uploaded_file($_FILES['img']['tmp_name']) &&
            move_uploaded_file(
                $_FILES['img']['tmp_name'],
                $file
            )
        ) {
            $userModel->updateInforByUser($_POST['name'], $_POST['birthday'], $_POST['phone_nb'], $_POST['email'], $_POST['address'], $avata, $id);
            echo "<script type='text/javascript'>alert('Cập Nhật Thành Công');</script>";
        }
    }
    $info_list = $userModel->getInforByUser($id);
}
?>