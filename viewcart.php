<?php
session_start();
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
$productModel = new ProductModel();
$userModel = new UserModel();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
if (isset($_COOKIE['user'])) {
    $id = $userModel->getIdByUser($_COOKIE['user']);
    $info_list = $userModel->getInforByUser($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopBuy</title>
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
        table,
        th,
        td {
            border: 1px solid gray;
            padding: 10px 0;
        }

        td {
            vertical-align: top;
        }

        table {
            width: 100%;
            height: 100%;
            background: #fff;
            vertical-align: top;
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
                        <div class="hidden">
                            <a href="user.php"><i class="fa-regular fa-user icon"></i>Account</a>
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
        <section class="searchs">
            <form action="search.php" method="get">
                <input type="search" name="search" id="search" placeholder="Nhập Sản Phẩm Bạn Muốn Tìm Kiếm....">
                <button type="submit">Tìm Kiếm</button>
            </form>
        </section>
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
        <section class="cartlist" style="height:100%;padding:100px 0 50px;text-align:center;">
            <div class="container">
                <div class="table_desc">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $sum = 0;
                            foreach ($cart as $item) {
                                $count++;
                                $sum += $item['price'] * $item['quality'];
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $count; ?>
                                </th>
                                <td>
                                    <img src="public/img/<?php echo $item['image'] ?>" alt="" width=100px;>
                                </td>
                                <td style="text-align: left;padding-left:10px;">
                                    <?php echo $item['name'] ?>
                                </td>
                                <td>
                                    <?php echo number_format($item['price']) ?>
                                </td>
                                <td>
                                    <?php echo $item['quality'] ?>
                                </td>
                                <td>
                                    <?php echo number_format($item['price'] * $item['quality']) ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="sum" style="display:flex;width:100%;align-items:center;">
                        <span
                            style="background: #000;width:80%; color: #fff; padding: 14px 0;font-weight:600;font-size:18px">
                            Tổng
                            Tiền:
                            <?php echo number_format($sum) . " VNĐ" ?>
                        </span>
                        <a href="checkout.php" class="btn_checkout" style="width:20%;padding:14px 0;display:block;background:#d70018;color:#fff;font-weight: bolder; text-transform: uppercase;
                    font-size:18px;">
                            Thanh Toán
                        </a>
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