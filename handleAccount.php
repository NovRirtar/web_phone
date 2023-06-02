<?php
// Thêm Tài Khoản
if (isset($_POST['us']) && isset($_POST['pw'])) {
    $pass = md5($_POST['pw']);
    if ($userModel->check($_POST['us'], $pass)) {
        if ($userModel->Register($_POST['us'], $pass)) {
            $userModel->addInforByUser(null, null, null, null, null, 'user.png');
            echo "<script type='text/javascript'>alert('Đăng Ký Thành Công');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Tài Khoản Đã Tồn Tại');</script>";

    }
?>
<script language="javascript">
    location.href = "admin.php?tag=2"
</script>
<?php
}
// Cập Nhật Tài Khoản
if (isset($_GET['id']) && isset($_POST['nameac']) && isset($_POST['passwordac']) && isset($_POST['typeac'])) {
    $id = $_GET['id'];
    $name = $_POST['nameac'];
    $pass = $_POST['passwordac'];
    $type = $_POST['typeac'];
    if ($_POST['passwordnew'] != null) {
        $pass = md5($_POST['passwordnew']);
    }
    if ($userModel->updateAccount($name, $pass, $type, $id)) {
        echo "<script type='text/javascript'>alert('Cập Nhật Thành Công');</script>";
    }
?>
<script language="javascript">
    location.href = "admin.php?tag=2"
</script>
<?php
}
// Xóa Tài Khoản
if (isset($_POST['delete_acc'])) {
    $id = $_POST['delete_acc'];
    if ($userModel->deleteAccount($id) && $userModel->deleteInfor($id)) {
        echo "<script type='text/javascript'>alert('Xóa Thành Công');</script>";
?>
<script language="javascript">
    location.href = "admin.php?tag=2"
</script>
<?php
    }
}
?>