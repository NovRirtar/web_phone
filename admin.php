<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
$productModel = new ProductModel();
$userModel = new UserModel();
if (!isset($_COOKIE['user'])) {
    header("location:index.php");
} else {
    $ID = $userModel->getIdByUser($_COOKIE['user']);
    $check_account = $userModel->checkadmin($ID)['type_account'];
    if ($check_account == 0) {
        header("location:index.php");
    }
}
// Mặc Định Là Tag 1
if (isset($_GET['tag'])) {
    include("cpn_user.php");
} else {
    header("location: admin.php?tag=1");
}
// Xử Lý Thêm, Xóa ,Sửa Tài Khoản
include("handleAccount.php");
// Xử Lý Thêm, Xóa, Sửa Sản Phẩm
include("handleProduct.php");
// HIển Thị Thông Tin Account
if (isset($_COOKIE['user'])) {
    // Lấy id Từ cookie
    $id = $userModel->getIdByUser($_COOKIE['user']);
    // Lấy Thông Tin Người Dùng Theo ID
    $info_list = $userModel->getInforByUser($id);
    // Kiểm Tra Loại Tài Khoản Là Admin Hay User
    $check_account = $userModel->checkadmin($id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/detail.css">
    <link rel="stylesheet" href="./public/css/user.css">
    <link rel="stylesheet" href="./public/css/loading.css">

    <style>
        .info_content-detail .form_group input {
            width: 631px;
        }

        table,
        th,
        td {
            border: 3px solid gray;
            padding: 10px 0;
            text-align: center;
        }

        td {
            vertical-align: top;
        }

        table {
            width: 100%;
            background: #fff;
            vertical-align: top;
            height: auto;
        }

        th {
            font-weight: 600;
            color: #fff;
            font-size: 18px;
            background: #000;
        }

        .no_bold th {
            font-weight: normal;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__content">
                <div class="header__content-logo">
                    <a href="./"><img src="./public/img/logomr.png" alt="" class="logoheader"
                            style="margin-left: 80px;width:120px;"></a>
                </div>
                <div class="header__content-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>

                </div>
                <div class="header__content-contact">
                    <div class="user">
                        <?php
                        if (!isset($_COOKIE['user'])) {
                        ?>
                        <a href="login.php" class="text" style="color:#fff;"><i class="fa-solid fa-user"></i>Login</a>
                        <?php
                        } else {
                        ?>
                        <a href="#" class="blockact"
                            style="text-transform: uppercase;font-weight:600;display:inline-block;margin-top:1px">
                            <div class="photo_avt" style="width:50px;height:50px;">
                                <img src="public/avata/<?php echo $info_list['info_image']; ?>" alt=""
                                    class="thumnail_user">
                            </div>
                        </a>
                        <div class="hidden" style="right:-32px;background:gray">
                            <?php
                            if ($check_account['type_account'] == 1) {
                            ?>
                            <a href="admin.php" class="text">Admin</a>
                            <?php
                            } else {
                            ?>
                            <a href="user.php"><i class="fa-regular fa-user icon"></i>Account</a>
                            <?php
                            }
                            ?>
                            <a href="logout.php" class="text">Logout</a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="loading">
            <div class="container">
                <div class="h1Container">

                    <div class="cube h1 w1 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w1 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w1 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w2 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w2 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w2 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w3 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w3 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h1 w3 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>
                </div>

                <div class="h2Container">

                    <div class="cube h2 w1 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w1 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w1 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w2 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w2 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w2 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w3 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w3 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h2 w3 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>
                </div>

                <div class="h3Container">

                    <div class="cube h3 w1 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w1 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w1 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w2 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w2 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w2 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w3 l1">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w3 l2">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>

                    <div class="cube h3 w3 l3">
                        <div class="face --top"></div>
                        <div class="face --left"></div>
                        <div class="face --right"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="admin">
            <div class="container">
                <div class="admin__content" style="padding:100px 0;">
                    <div class="admin__content-nav">
                        <span class="bigtags">Quản Lý Tài Khoản</span>
                        <a href="admin.php?tag=1" class="text">Tài Khoản Cá Nhân</a>
                        <a href="admin.php?tag=2" class="text">Tài Khoản Người Dùng</a>
                        <a href="admin.php?tag=3" class="text">Đơn Hàng</a>
                        <ul>
                            <span class="bigtag">Quản Lý Sản Phẩm</span>
                            <li><a href="admin.php?tag=4.0" class="minitag">Danh Sách Sản Phẩm</a></li>
                            <li><a href="admin.php?tag=4.1" class="minitag">Thêm Sản Phẩm</a></li>
                            <li><a href="admin.php?tag=4.2" class="minitag">Sửa Sản Phẩm</a></li>
                        </ul>
                        <div class="phto" style="text-align: center;">
                            <img src="public/img/tree.png" alt="" width="200px"
                                style="display: inline-block; margin: 20px 0;">
                        </div>
                    </div>
                    <div class="admin__content-display">
                        <?php
                        if ($_GET['tag'] == 1) {
                        ?>
                        <div class="info__content abs">
                            <div class="info_content-img">
                                <div class="photo_avt">
                                    <img src="public/avata/<?php echo $info_list['info_image'] ?>" alt=""
                                        class="thumnail_user">
                                </div>
                                <h2 class="name" style="margin: 30px 0 10px;">
                                    <?php echo $info_list['info_name'] ?>
                                </h2>
                            </div>
                            <div class="info_content-detail">
                                <form action="admin.php?tag=1" method="post" enctype="multipart/form-data">
                                    <div class="form_group">
                                        <label for="name">Họ Và Tên</label>
                                        <input type="text" name="name" id="name"
                                            value="<?php echo $info_list['info_name'] ?>" width="631px">
                                    </div>
                                    <div class="form_group">
                                        <label for="birthday">Ngày Sinh</label>
                                        <input type="text" name="birthday" id="birthday"
                                            value="<?php echo $info_list['info_birthday'] ?>">
                                    </div>
                                    <div class="form_group">
                                        <label for="phone_nb">Số Điện Thoại</label>
                                        <input type="text" name="phone_nb" id="phone_nb"
                                            value="<?php echo $info_list['info_phone'] ?>">
                                    </div>
                                    <div class="form_group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email"
                                            value="<?php echo $info_list['info_email'] ?>">
                                    </div>
                                    <div class="form_group">
                                        <label for="address">Địa Chỉ</label>
                                        <input type="text" name="address" id="address"
                                            value="<?php echo $info_list['info_address'] ?>">
                                    </div>
                                    <div class="form_group">
                                        <label for="img">Hình Đại Diện</label>
                                        <input type="file" name="img" id="img">
                                    </div>
                                    <button type="submit" class="btn-save">Lưu Thông Tin</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        }
                        if ($_GET['tag'] == 2) {

                        ?>
                        <div class="box">
                            <table>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên Tài Khoản</th>
                                    <th>Mật Khẩu</th>
                                    <th>Loại Tài Khoản</th>
                                    <th>Chức Năng</th>
                                </tr>
                                <?php
                            foreach ($userModel->getallaccount() as $account) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $account['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $account['username'] ?>
                                    </td>
                                    <td>
                                        <?php echo $account['passwords'] ?>
                                    </td>
                                    <td>
                                        <?php echo $account['type_account'] ?>
                                    </td>
                                    <td style="display: flex; align-items: center;justify-content: center">
                                        <form action="admin.php?tag=2" method="post">
                                            <input type="hidden" value="<?php echo $account['id'] ?>" name="delete_acc">
                                            <button type="submit"
                                                style="border: none;background:#dc3545; padding: 5px 20px; color: #fff; font-size:16px;border-radius:7px;cursor:pointer;"
                                                onclick="return confirm('Bạn Có Muốn Xóa Không')">Xóa</button>
                                        </form>
                                        <a href="admin.php?tag=2&id=<?php echo $account['id'] ?>"
                                            style="display: inline-block;padding:5px 20px;background:#ffc107;margin-left:10px;font-size:19px;border-radius:7px;">Sửa</a>
                                    </td>
                                </tr>
                                <?php
                            }
                                ?>
                            </table>
                            <a href="admin.php?tag=2&add=add" style="padding: 10px 40px;color:#fff; background: #198754;display:block;
                            margin:30px auto;width:max-content;">Thêm Tài Khoản</a>
                            <?php
                            if (isset($_GET['id'])) {
                                $acc = $userModel->checkadmin($_GET['id']);
                            ?>
                            <div class="update_account">
                                <h1>Cập Nhật Tài Khoản</h1>
                                <form action="admin.php?tag=2&id=<?php echo $_GET['id'] ?>" method="post">
                                    <div class="form_group">
                                        <label for="name">Tên Tài Khoản</label>
                                        <input type="text" name="nameac" id="name"
                                            value="<?php echo $acc['username'] ?>">
                                    </div>
                                    <div class="form_group">
                                        <label for="password">Mật Khẩu</label>
                                        <input type="text" name="passwordac" id="password"
                                            value="<?php echo $acc['passwords'] ?>">
                                    </div>
                                    <div class="form_group">
                                        <label for="passwordnew">Mật Khẩu Mới</label>
                                        <input type="text" name="passwordnew" id="passwordnew"
                                            placeholder="Nhập Mật Khẩu Mới Nếu Muốn...">
                                    </div>
                                    <div class="form_group">
                                        <label for="type">Loại Tài Khoản</label>
                                        <input type="text" name="typeac" id="type"
                                            value="<?php echo $acc['type_account'] ?>">
                                    </div>
                                    <button type="submit" class="subbtn">Cập Nhật</button>
                                </form>
                            </div>
                            <?php
                            }
                            if (isset($_GET['add'])) {
                            ?>
                            <div class="update_account">
                                <h1>Thêm Tài Khoản</h1>
                                <form action="admin.php?tag=2" method="post">
                                    <div class="form_group">
                                        <label for="name">Tên Tài Khoản</label>
                                        <input type="text" name="us" id="name">
                                    </div>
                                    <div class="form_group">
                                        <label for="password">Mật Khẩu</label>
                                        <input type="text" name="pw" id="password">
                                    </div>
                                    <button type="submit" class="subbtn"> Thêm</button>
                                </form>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                        <?php
                        }
                        if ($_GET['tag'] == 3) {
                        ?>
                        <table>
                            <tr class="no_bold">
                                <th>Số Hóa Đơn</th>
                                <th>Id Khách Hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Sản Phẩm</th>
                                <th>Tổng Tiền</th>
                            </tr>
                            <?php
                            foreach ($userModel->getAllOrder() as $order) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $order['id_bill'] ?>
                                </td>
                                <td>
                                    <?php echo $order['id_customer'] ?>
                                </td>
                                <td>
                                    <?php echo $order['custommer_name'] ?>
                                </td>
                                <td>
                                    <?php echo $order['custommer_phone'] ?>
                                </td>
                                <td>
                                    <?php echo $order['custommer_address'] ?>
                                </td>
                                <td
                                    style="overflow:scroll;overflow-x: hidden;height: 120px; width:260px; display:block">
                                    <?php
                                $arr = explode(',', $order['product']);
                                $nb = -1;
                                $qlt = explode(',', $order['quality_prd']);
                                foreach ($productModel->getImgProductByArr($arr) as $temp) {
                                    $nb++;
                                    ?>
                                    <div class="prdbox"
                                        style="display:flex;gap:10px; text-align:left;margin-bottom:15px;">
                                        <img src="public/img/<?php echo $temp['image'] ?>" alt="" width="50px">
                                        <div class="item">
                                            <a href="productDetail.php?id=<?php echo $temp['id'] ?>" class="over"><?php echo $temp['name'] ?></a>
                                            <p style="color:red;margin:3px 0;"><?php if ($temp['discount'] == 0) {
                                        echo number_format($temp['price']) . " đ";
                                    } else {
                                            ?>
                                                <span style="color:#999;text-decoration: line-through"><?php echo number_format($temp['price']) . " đ"; ?></span>
                                                <?php
                                        echo number_format($temp['price'] - ($temp['price'] * $temp['discount'] / 100)) . " đ";
                                    } ?>
                                            </p>
                                            <p><?php echo "Số Lượng " . $qlt[$nb] ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                    ?>
                                </td>
                                <td>
                                    <?php echo number_format($order['totalprice']) . " đ" ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <?php
                        }
                        if ($_GET['tag'] == 4) {
                        ?>
                        <div class="box">
                            <table>
                                <tr class="no_bold">
                                    <th>Id</th>
                                    <th>Hình</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Tình Trạng</th>
                                    <th>Bao Gồm</th>
                                    <th>Bảo Hành</th>
                                    <th>Giá</th>
                                    <th>Giảm</th>
                                    <th>Chức Năng</th>
                                </tr>
                                <?php
                            foreach ($productModel->getAllProduct() as $prd) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $prd['id'] ?>
                                    </td>
                                    <td>
                                        <img src="public/img/<?php echo $prd['image'] ?>" alt="" width="100px">
                                    </td>
                                    <td>
                                        <?php echo $prd['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $prd['status'] ?>
                                    </td>
                                    <td>
                                        <?php echo $prd['accessory'] ?>
                                    </td>
                                    <td>
                                        <?php echo $prd['insurance'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($prd['price']) ?>
                                    </td>
                                    <td>
                                        <?php echo $prd['discount'] . "%" ?>
                                    </td>
                                    <td style="padding:0 5px">
                                        <form action="admin.php?tag=4.0" method="post">
                                            <input type="hidden" value="<?php echo $prd['id'] ?>" name="del_prd_id">
                                            <button type="submit" class="del"
                                                onclick="return confirm('Bạn Có Muốn Xóa Không?')">Xoá</button>
                                        </form>
                                        <a href="admin.php?tag=4.2&update=<?php echo $prd['id'] ?>"
                                            class="btnupdate">Sửa</a>
                                    </td>
                                </tr>
                                <?php
                            }
                                ?>
                            </table>
                        </div>
                        <?php
                        }
                        if ($_GET['tag'] == 4.1) {
                        ?>
                        <div class="box_product">
                            <h2>Thêm Sản Phẩm</h2>
                            <form action="admin.php?tag=4.1" method="post" enctype="multipart/form-data">
                                <div class="form_group">
                                    <label for="productname">Tên Sản Phẩm</label>
                                    <input type="text" name="productname" id="productname"
                                        placeholder="Nhập Tên Sản Phẩm...">
                                </div>
                                <div class="form_group">
                                    <label for="productprice">Giá</label>
                                    <input type="text" name="productprice" id="productprice"
                                        placeholder="Nhập Giá Sản Phẩm...">
                                </div>
                                <div class="form_group">
                                    <label for="discount">Giảm Giá</label>
                                    <input type="text" name="discount" id="discount"
                                        placeholder="Nhập Phần Trăm Giảm...">
                                </div>
                                <div class=" form_group">
                                    <label for="status">Tình Trạng</label>
                                    <input type="text" name="status" id="status" placeholder="Nhập Tình Trạng Máy...">
                                </div>
                                <div class="form_group">
                                    <label for="accessory">Phụ Kiện</label>
                                    <input type="text" name="accessory" id="accessory"
                                        placeholder="Nhập Phụ Kiện Máy...">
                                </div>
                                <div class="form_group">
                                    <label for="insurance">Bảo Hành</label>
                                    <input type="text" name="insurance" id="insurance"
                                        placeholder="Nhập Thời Gian Bảo Hành...">
                                </div>
                                <div class="form_group">
                                    <label for="productphoto">Hình Sản Phẩm</label>
                                    <input type="file" name="productphoto" id="productphoto">
                                </div>
                                <div class="form_group">
                                    <label for="typename">Tên Loại</label>
                                    <input type="text" name="typename" id="typename" placeholder="Nhập Số Theo Loại...">
                                </div>
                                <div class="type cpn">
                                    <p>1.Điện Thoại</p>
                                    <p>2.Máy Tính Bảng</p>
                                    <p>3.LapTop</p>
                                    <p>4.Smart Watch</p>
                                    <p>5.Phụ Kiện</p>
                                </div>
                                <div class="form_group">
                                    <label for="thefirm">Tên Hãng</label>
                                    <input type="text" name="thefirm" id="thefirm" placeholder="Nhập Số Theo Hãng...">
                                </div>
                                <div class="thefirm cpn">
                                    <p>1.Apple</p>
                                    <p>2.Samsung</p>
                                    <p>3.Asus</p>
                                </div>
                                <button type="submit" class="addprd">Thêm Sản Phẩm</button>
                            </form>
                        </div>
                        <?php
                        }
                        if ($_GET['tag'] == 4.2 && isset($_GET['update'])) {
                            $update = $productModel->getProductByID($_GET['update']);
                        ?>
                        <div class="box_product">
                            <h2>Cập Nhật Sản Phẩm</h2>
                            <form action="admin.php?tag=4.2&update=<?php echo $_GET['update'] ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="form_group">
                                    <label for="productname">Tên Sản Phẩm</label>
                                    <input type="text" name="productnames" id="productname"
                                        value="<?php echo $update['name'] ?>">
                                </div>
                                <div class="form_group">
                                    <label for="productprice">Giá</label>
                                    <input type="text" name="productprices" id="productprice"
                                        value="<?php echo $update['price'] ?>">
                                </div>
                                <div class="form_group">
                                    <label for="discount">Giảm Giá</label>
                                    <input type="text" name="discount" id="discount"
                                        value="<?php echo $update['discount'] ?>">
                                </div>
                                <div class=" form_group">
                                    <label for="status">Tình Trạng</label>
                                    <input type="text" name="statuss" id="status"
                                        value="<?php echo $update['status'] ?>">
                                </div>
                                <div class="form_group">
                                    <label for="accessory">Phụ Kiện</label>
                                    <input type="text" name="accessorys" id="accessory"
                                        value="<?php echo $update['accessory'] ?>">
                                </div>
                                <div class="form_group">
                                    <label for="insurance">Bảo Hành</label>
                                    <input type="text" name="insurances" id="insurance"
                                        value="<?php echo $update['insurance'] ?>">
                                </div>
                                <div class="form_group">
                                    <label for="productphoto">Hình Sản Phẩm</label>
                                    <input type="file" name="productphotos" id="productphoto">
                                </div>
                                <div class="form_group">
                                    <input type="hidden" name="photodefault" id="photodefault"
                                        value="<?php echo $update['image'] ?>">
                                </div>
                                <div class="form_group">
                                    <label for="typename">Tên Loại</label>
                                    <input type="text" name="typenames" id="typename"
                                        value="<?php echo $update['type'] ?>">
                                </div>
                                <div class="type cpn">
                                    <p>1.Điện Thoại</p>
                                    <p>2.Máy Tính Bảng</p>
                                    <p>3.LapTop</p>
                                    <p>4.Smart Watch</p>
                                    <p>5.Phụ Kiện</p>
                                </div>
                                <div class="form_group">
                                    <label for="thefirm">Tên Hãng</label>
                                    <input type="text" name="thefirms" id="thefirm"
                                        value="<?php echo $update['thefirm'] ?>">
                                </div>
                                <div class="thefirm cpn">
                                    <p>1.Apple</p>
                                    <p>2.Samsung</p>
                                    <p>3.Asus</p>
                                </div>
                                <button type="submit" class="addprd">Cập Nhật</button>
                            </form>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        let loading = document.querySelector('.loading');
        window.addEventListener('load', () => {
            loading.classList.add('hiden');
        })
        function account() {
            let temp = document.querySelector('.blockact');
            temp.addEventListener('click', (ev) => {
                ev.preventDefault();
                document.querySelector('.hidden').classList.toggle('active');
            })
        }
        account();
    </script>
</body>