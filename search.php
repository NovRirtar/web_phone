<?php
session_start();
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
$productModel = new ProductModel();
$userModel = new UserModel();
include("handleCheckout.php");

if (isset($_COOKIE['user'])) {
    $id = $userModel->getIdByUser($_COOKIE['user']);
    $info_list = $userModel->getInforByUser($id);
    if (isset($_POST['heart'])) {
        $user = $productModel->getadminid($_COOKIE['user']);
        $productModel->AddLike($user, $_POST['heart']);
    }
}
if (isset($_GET['search'])) {
    $searchlist = $productModel->search($_GET['search']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <section class="product" style="padding: 100px 0 50px;">
            <div class="container">
                <div class="product__content" style="grid-template-columns: initial;">
                    <div class="product__content-box box ">
                        <?php
                        foreach ($searchlist as $item) {
                        ?>
                        <div class="item">
                            <div class="thumnail">
                                <img src="public/img/<?php echo $item['image'] ?>" alt="" class="photo">
                            </div>
                            <a href="productDetail.php?id=<?php echo $item['id'] ?>" class="name">
                                <?php echo $item['name'] ?>
                            </a>
                            <p class="price">
                                <?php echo number_format($item['price']) ?>
                            </p>
                            <div class="rating" style="display: flex; align-items: center;">
                                <span class="view">
                                    <i class="fa-solid fa-eye"></i>
                                    <?php echo $item['view'] ?>
                                </span>
                                <div class="like">
                                    <form action="search.php?search=<?php echo $_GET['search'] ?>" method="post">
                                        <input type="hidden" name="heart" value="<?php echo $item['id'] ?>">
                                        <button type="submit" style="border: none;cursor: pointer;">
                                            <i class="fa-solid fa-heart"></i>
                                            <?php echo $item['heart'] ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <form action="search.php?search=<?php echo $_GET['search'] ?>" method="post"
                                class="btn-addtocart">
                                <input type="hidden" name="id_checkout" value="<?php echo $item['id'] ?>">
                                <button type="submit"
                                    style="background: transparent;border:none;font-size:15px;font-weight:600;color:#d70018;cursor: pointer;padding:0;">ADD
                                    TO
                                    CART<i class="fa-solid fa-basket-shopping"></i></button>
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
        function account() {
            let temp = document.querySelector('.blockact');
            temp.addEventListener('click', (ev) => {
                ev.preventDefault();
                document.querySelector('.hidden').classList.toggle('active');
            })
        }
        account();
        function cart() {
            document.querySelector('.cart').classList.toggle('active');
        }
        function search() {
            document.querySelector('.searchs').classList.toggle('active');
        }
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