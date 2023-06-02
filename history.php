<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
if (!isset($_COOKIE['user'])) {
    header("location: index.php");
}
$productModel = new ProductModel();
$userModel = new UserModel();

include("handleCheckout.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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
                        <div class="hidden">
                            <?php
                            if ($check_account['type_account'] == 1) {
                            ?>
                            <a href="admin.php" class="text">Admin</a>
                            <?php
                            } else {
                            ?>
                            <a href="user.php"><i class="fa-regular fa-user icon"></i>Account</a>
                            <?php
                                if (isset($_COOKIE['user'])) {
                                    $id_us = $userModel->getIdByUser($_COOKIE['user']);
                                }
                            ?>
                            <a href="history.php?id=<?php echo $id_us ?>">Order History</a>
                            <?php
                            }
                            ?>
                            <a href="logout.php" class="text">Logout</a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="search">
                        <p class="text" onclick="search()" style="cursor: pointer;"><i
                                class="fa-solid fa-magnifying-glass"></i>Search</p>
                    </div>
                    <div class="cartlist" onclick="cart()" style="cursor: pointer;">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="text">Cart</span>
                        <span class="number-cart" style="display:inline-block;padding:2px 6px;background:red;color:#000;
                        border-radius:50%;font-weight:600;">
                            <?php
                            $count = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($cart as $it) {
                                    $count += $it['quality'];
                                }
                                echo $count;
                            } else {
                                echo $count;
                            }
                            ?>
                        </span>
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
        <div class="container">
            <div class="history" style="padding:90px 0 25px;<?php
            $slprd = $productModel->historyOrder($_GET['id']);
            if (count($slprd) == 0)
                echo ("height:100vh");
            ?>">
                <?php
                if (isset($_GET['id'])) {
                ?>
                <h1
                    style="text-align:center;margin:0 auto;font-weight:600;color:#fff;font-size:20px;background:#006d3a;width:660px;padding:10px 0;">
                    LỊCH SỬ ĐƠN HÀNG</h1>
                <?php
                    foreach ($productModel->historyOrder($_GET['id']) as $item) {
                ?>
                <div class="boxhistory">
                    <div class="thumnail">
                        <?php
                        $arr = explode(',', $item['product']);
                        $nb = -1;
                        foreach ($productModel->getImgProductByArr($arr) as $temp) {
                            $nb++;
                        ?>
                        <div class="productdiv">
                            <img src="public/img/<?php echo $temp['image'] ?>" alt="" width="100px">
                            <div class="content">
                                <a href="productDetail.php?id=<?php echo $temp['id'] ?>" class="namepdr"><?php echo $temp['name'] ?></a>
                                <div class="price"> <?php if ($temp['discount'] == 0) {
                                ?>
                                    <p style="color:red;font-weight:600;margin-top:7px;"><?php echo number_format($temp['price']) . " ₫"; ?></p>
                                    <?php
                            } else {
                                $discount = $temp['price'] * $temp['discount'] / 100;
                                    ?>
                                    <div style="color:#999;text-decoration: line-through;margin-top:5px"><?php echo number_format($temp['price']) . " ₫" ?></div>
                                    <p style="color:red;font-weight:600;margin-top:7px;"><?php echo number_format($temp['price'] - $discount) . " ₫"; ?></p>
                                    <?php

                            } ?>
                                </div>
                                <p style="margin:5px 0 0">Số Lượng <?php $qllt = explode(',', $item['quality_prd']);
                            echo ($qllt[$nb]);
                                ?></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="infor">
                        <p>
                            <?php echo "Mã Đơn Hàng: SHOPBUY" . $item['id_bill'] . "FRS" ?>
                        </p>
                        <p>
                            <?php echo "Tên Khách Hàng: " . $item['custommer_name'] ?>
                        </p>
                        <p>
                            <?php echo "Số Điện Thoại: " . $item['custommer_phone'] ?>
                        </p>
                        <p>
                            <?php echo "Địa Chỉ: " . $item['custommer_address'] ?>
                        </p>
                        <p>
                            <?php echo "Tổng Tiền: " . number_format($item['totalprice']) . " ₫" ?>
                        </p>
                    </div>
                </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="footer__content-desc">
                    <div class="textbox" style="overflow:hidden">
                        <a href="./"><img src="./public/img/mery.png" alt="" class="logomer" style="width:200px"></a>
                    </div>
                    <div class="textbox">
                        <a href="#" class="text">Tích điểm Quà tặng VIP</a>
                        <a href="#" class="text">Lịch sử Mua Hàng</a>
                        <a href="#" class="text">Tìm hiểu về mua trả góp</a>
                        <a href="#" class="text">Chính sách Bảo Hành</a>
                    </div>
                    <div class="textbox">
                        <a href="#" class="text ">Giới thiệu công ty</a>
                        <a href="#" class="text">Tuyển dụng</a>
                        <a href="#" class="text">Gửi góp ý, khiếu nại</a>
                        <a href="#" class="text">Tìm siêu thị</a>
                    </div>
                    <div class="textbox">
                        <p class="text -md">Tổng dài hỗ trợ (Miễn phí gọi)</p>
                        <a href="#" class="text">Gọi mua: 1800.1060 (7:30 -22:00)</a>
                        <a href="#" class="text">Kỹ thuật: 1800.1763 (7:30 -22:00)</a>
                        <a href="#" class="text">Khiếu nại: 1800.1062 (7:30 -22:00)</a>
                        <a href="#" class="text">Bảo hành: 1800.1064 (7:30 -22:00)</a>
                    </div>
                </div>
                <div class="backtotop">
                    <i class="fa-sharp fa-solid fa-chevron-up"></i>
                </div>
            </div>
        </div>
    </footer>
    <script>
        let loading = document.querySelector('.loading');
        window.addEventListener('load', () => {
            loading.classList.add('hiden');
        })
        // account
        function account() {
            let temp = document.querySelector('.blockact');
            temp.addEventListener('click', (ev) => {
                ev.preventDefault();
                document.querySelector('.hidden').classList.toggle('active');
            })
        }
        account();
        // backto top
        function scroll() {
            document.querySelector('.backtotop').addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            })
        }
        scroll();
    </script>
</body>

</html>