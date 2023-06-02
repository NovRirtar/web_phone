<?php
session_start();
if (!isset($_COOKIE['user'])) {
    header("location: login.php");
}
if (!isset($_SESSION['cart'])) {
    header("location: index.php");
}
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});

$userModel = new UserModel();
$productModel = new ProductModel();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
if (isset($_SESSION['cart'])) {
    $str = "";
    $total = 0;
    $sl = "";
    foreach ($cart as $it) {
        $total += $it['price'] * $it['quality'];
        $str .= $it['id'] . ",";
        $sl .= $it['quality'] . ",";
    }
    $length = strlen($str);
    $str = substr($str, 0, $length - 1);
    $sl = substr($sl, 0, strlen($sl) - 1);
}
if (isset($_COOKIE['user'])) {
    $id = $userModel->getIdByUser($_COOKIE['user']);
    $info_list = $userModel->getInforByUser($id);
    $check_account = $userModel->checkadmin($id);
}

if (isset($_POST['name']) && isset($_POST['phone_nb']) && isset($_POST['address'])) {
    $id_cus = $_POST['id_customer'];
    $product = $_POST['product'];
    $name = $_POST['name'];
    $phone = $_POST['phone_nb'];
    $address = $_POST['address'];
    $totalprice = $_POST['total'];
    $quality_prd = $_POST['quality_prd'];
    if ($name == null || $phone == null || $address == null) {
        echo "<script type='text/javascript'>alert('Phải Nhập Đầy Đủ Thông Tin');</script>";
    } else {
        if ($productModel->payment($id_cus, $name, $phone, $address, $product, $quality_prd, $totalprice)) {
            echo "<script type='text/javascript'>alert('Mua Hàng Thành Công');</script>";
?>
<script language="javascript">
    location.href = "delcart.php"
</script>
<?php
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
    <title>Check Out</title>
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
        <div class="cart">
            <div class="cart_content" style="height:200px;">
                <?php
                $sum = 0;
                $countselect = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($cart as $item) {
                        $sum += $item['price'] * $item['quality'];
                        $countselect += $item['quality'];
                ?>
                <div class="item">
                    <div class="thumnail">
                        <img src="public/img/<?php echo $item['image'] ?>" alt="" class="photo">
                    </div>
                    <div class="detail">
                        <p class="name">
                            <?php echo $item['name'] ?>
                        </p>
                        <span class="price">
                            <?php echo number_format($item['price']) ?>
                        </span>
                        <div class="quality"
                            style="display:inline-block;padding:12px;border-radius:50%;background:#000;color:#fff; position:relative;left:7px; margin-bottom:-5px;">
                            <span style="position: absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
                                <?php echo "x" . $item['quality'] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="payment">
                <?php if (isset($_SESSION['cart'])) {
                    echo $countselect;
                } else {
                    echo $countselect;
                } ?>
                <span class="choose">Item(s) Selected</span>
                <p>Tổng Cộng:
                    <?php if (isset($_SESSION['cart'])) {
                        echo number_format($sum) . " VNĐ";
                    } else {
                        echo $sum;
                    } ?>
                </p>
                <div class="btns" style="gap: 10px;">
                    <a href="viewcart.php" class="btn">View Cart</a>
                    <a href="checkout.php" class="btn">Check Out</a>
                    <a href="delcart.php" class="btn">Delete Cart</a>
                </div>
            </div>
        </div>
        <section class="searchs">
            <form action="search.php" method="get">
                <input type="search" name="search" id="search" placeholder="Nhập Sản Phẩm Bạn Muốn Tìm Kiếm....">
                <button type="submit">Tìm Kiếm</button>
            </form>
        </section>
        <?php
        if (isset($_SESSION['cart'])) {
        ?>
        <section class="product_checkout">
            <div class="container">
                <div class="product_checkout-content">
                    <?php $count = 0;
            $sum = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($cart as $item) {
                    $count += $item['quality'];
                    $sum += $item['quality'] * $item['price'];
                    ?>
                    <div class="item">
                        <img src="public/img/<?php echo $item['image'] ?>" alt="" width=100px;>
                        <div class="content">
                            <a href="productDetail.php?id=<?php echo $item['id'] ?>" class="name">
                                <?php echo $item['name'] ?>
                            </a>
                            <p class="price">
                                <?php echo number_format($item['price']) . " ₫" ?>
                            </p>
                            <p class="quality">
                                Số Lượng
                                <?php echo $item['quality'] ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                    ?>
                    <div class="pay"
                        style="display: flex;justify-content: space-between;font-weight:600;font-size:18px;color:red; align-items: center;">
                        <p>Tạm Tính (
                            <?php echo ($count) ?>sản phẩm)
                        </p>
                        <p>
                            <?php echo number_format($sum) . " ₫" ?>
                        </p>
                    </div>
                    <?php
            }
                    ?>
                    <div class="info_customer">
                        <h2>Thông Tin Khách Hàng</h2>
                        <form action="checkout.php" method="post">
                            <div class="form_group">
                                <input type="hidden" name="product" id="product" value="<?php echo $str; ?>">
                            </div>
                            <div class="form_group">
                                <input type="hidden" name="quality_prd" id="quality_prd" value="<?php echo $sl; ?>">
                            </div>
                            <div class="form_group">
                                <input type="hidden" name="id_customer" id="id_customer" value="<?php if (isset($_COOKIE['user']))
                echo $id ?>">
                            </div>
                            <div class="form_group">
                                <input type="text" name="name" id="name" placeholder="Họ Và Tên" value="<?php echo
                (isset($_COOKIE['user'])) ? $info_list['info_name'] : ""
                                    ?>">
                            </div>
                            <div class="form_group">
                                <input type="text" name="phone_nb" id="phone_nb" placeholder="Số Điện Thoại" value="<?php echo
                (isset($_COOKIE['user'])) ? $info_list['info_phone'] : ""
                                    ?>">
                            </div>
                            <div class="form_group">
                                <input type="text" name="address" id="address" placeholder="Địa Chỉ" value="<?php echo
                (isset($_COOKIE['user'])) ? $info_list['info_address'] : ""
                                    ?>">
                            </div>
                            <div class="form_group">
                                <input type="hidden" name="total" id="total" value="<?php echo $total ?>">
                            </div>
                            <button type="submit" class="btn-pay">Thanh Toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>
    </main>
    <script>
        let loading = document.querySelector('.loading');
        window.addEventListener('load', () => {
            loading.classList.add('hiden');
        })
        function cart() {
            document.querySelector('.cart').classList.toggle('active');
        }
        function search() {
            document.querySelector('.searchs').classList.toggle('active');
        }
        // account
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

</html>