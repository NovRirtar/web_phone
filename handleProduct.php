<?php
// Thêm Sản Phẩm
if (isset($_POST['productname'])) {
    $name = $_POST['productname'];
    $price = $_POST['productprice'];
    $status = $_POST['status'];
    $accessory = $_POST['accessory'];
    $insurance = $_POST['insurance'];
    $productphoto = $_FILES['productphoto']['name'];
    $typename = $_POST['typename'];
    $thefirm = $_POST['thefirm'];
    $discount = $_POST['discount'];
    $movefile = 'public/img/' . $productphoto;
    if (
        $name != null && $price != null && $status != null && $accessory != null
        && $insurance != null && $typename != null && $thefirm != null && $discount != null
    ) {
        if (
            is_uploaded_file($_FILES['productphoto']['tmp_name']) && move_uploaded_file(
                $_FILES['productphoto']['tmp_name'],
                $movefile
            )
        ) {
            $productModel->addProduct($name, $price, $status, $accessory, $insurance, $productphoto, $typename, $thefirm, $discount);
            echo "<script type='text/javascript'>alert('Thêm Thành Công');</script>";

        }
    } else {
        echo "<script type='text/javascript'>alert('Phải Nhập Đầy Đủ Thông Tin');</script>";
    }
?>
<script language="javascript">
    location.href = "admin.php?tag=4.1"
</script>
<?php
}
// Xóa Sản Phẩm
if (isset($_POST['del_prd_id'])) {
    if ($productModel->delProduct($_POST['del_prd_id'])) {
        echo "<script type='text/javascript'>alert('Xóa Thành Công');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Xóa Thất Bại');</script>";
    }
?>
<script language="javascript">
    location.href = "admin.php?tag=4.0"
</script>
<?php
}
if (isset($_GET['update']) && isset($_POST['productnames'])) {
    $name = $_POST['productnames'];
    $price = $_POST['productprices'];
    $status = $_POST['statuss'];
    $accessory = $_POST['accessorys'];
    $insurance = $_POST['insurances'];
    $productphoto = $_FILES['productphotos']['name'];
    $typename = $_POST['typenames'];
    $thefirm = $_POST['thefirms'];
    $discount = $_POST['discount'];
    $movefile = 'public/img/' . $productphoto;
    if (
        is_uploaded_file($_FILES['productphotos']['tmp_name']) && move_uploaded_file(
            $_FILES['productphotos']['tmp_name'],
            $movefile
        )
    ) {
        $productModel->updateProduct($name, $price, $status, $accessory, $insurance, $productphoto, $typename, $thefirm, $discount, $_GET['update']);
        echo "<script type='text/javascript'>alert('Cập Nhật Thành Công');</script>";
?>
<script language="javascript">
    location.href = "admin.php?tag=4.0"
</script>
<?php
    }
}
?>