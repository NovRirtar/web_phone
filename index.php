<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
$productModel = new ProductModel();
$userModel = new UserModel();

include("handleCheckout.php");

$product_type = $productModel->getAllProductType();
$product_trend = $productModel->getSale();

// Phân Trang
$page = 1;
$perpage = 8;
if (isset($_GET['fill'])) {
    $totalPage = ceil($productModel->countFirm($_GET['fill']) / $perpage);
} else if (isset($_GET['price'])) {
    $price_start = explode(",", $_GET['price'])[0];
    $price_end = explode(",", $_GET['price'])[1];
    $page = $productModel->totalproductbyprice($price_start, $price_end);
    $totalPage = ceil($page / $perpage);
} else {
    $totalPage = ceil($productModel->countProduct() / $perpage);
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
if (isset($_GET['view'])) {
    if ($_GET['view'] == "desc") {
        $list = $productModel->descprice($page, $perpage);
    } else if ($_GET['view'] == "asc") {
        $list = $productModel->asc($page, $perpage);
    } else if ($_GET['view'] == "view") {
        $list = $productModel->view($page, $perpage);
    }
} else {
    if (isset($_GET['fill'])) {
        $list = $productModel->thefirm($_GET['fill'], $page, $perpage);
    } else if (isset($_GET['price'])) {
        $list = $productModel->pricefill($price_start, $price_end, $page, $perpage);
    } else {
        $list = $productModel->getProductByPage($page, $perpage);
    }
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
        <section class="banner">
            <div class="banner__content">
                <div class="banner__cotent-wrap">
                    <div class="img">
                        <img src="public/img/banner11.jpg" alt="" class="photo">
                    </div>
                    <div class="img">
                        <img src="public/img/banner7.jpg" alt="" class="photo">
                    </div>
                    <div class="img">
                        <img src="public/img/banner8.jpg" alt="" class="photo">
                    </div>
                    <div class="img">
                        <img src="public/img/banner9.jpg" alt="" class="photo">
                    </div>
                </div>
            </div>
        </section>
        <section class="list">
            <div class="container">
                <div class="list__content">
                    <div class="list__content-name">Danh Mục Nổi Bật</div>
                    <div class="list__content-box">
                        <?php
                        foreach ($product_type as $type) {
                        ?>
                        <div class="item">
                            <a href="typedetail.php?id=<?php echo $type['id_type'] ?>">
                                <div class="img">
                                    <img src="public/img/<?php echo $type['img_type'] ?>" alt="" class="photo">
                                </div>
                                <p class="name">
                                    <?php echo $type['name_type'] ?>
                                </p>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="thumnail">
            <div class="container">
                <div class="thumnail__content">
                    <div class="photo">
                        <img src="public/img/banner5.jpg" alt="" class="img">
                    </div>
                    <div class="photo">
                        <img src="public/img/banner6.jpg" alt="" class="img">
                    </div>
                    <div class="photo">
                        <img src="public/img/thumnail1.jpg" alt="" class="img">
                    </div>
                </div>
            </div>
        </section>
        <section class="trend">
            <div class="container">
                <div class="trend__content">
                    <div class="trend__content-textbox">
                        SALE OFF
                    </div>
                    <div class="trend__content-box box owl-carousel">
                        <?php
                        foreach ($product_trend as $item) {
                        ?>
                        <div class="item">
                            <?php if ($item['discount'] != 0) {
                            ?>
                            <div class="discount">
                                <?php echo "Sale " . $item['discount'] . "%"; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="thumnail">
                                <img src="public/img/<?php echo $item['image'] ?>" alt="" class="photo">
                            </div>
                            <a href="productDetail.php?id=<?php echo $item['id'] ?>" class="name">
                                <?php echo $item['name'] ?>
                            </a>
                            <div class="price">
                                <?php if ($item['discount'] == 0) {
                                echo number_format($item['price']);
                            } else {
                                $discount = $item['price'] * $item['discount'] / 100;
                                ?>
                                <span style="color:#999;text-decoration: line-through;"><?php echo number_format($item['price']); ?></span>

                                <?php

                                echo number_format($item['price'] - $discount);
                            } ?>
                            </div>
                            <div class="rating" style="display: flex; align-items: center;">
                                <span class="view">
                                    <i class="fa-solid fa-eye"></i>
                                    <?php echo $item['view'] ?>
                                </span>
                                <div class="like">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="heart" value="<?php echo $item['id'] ?>">
                                        <button type="submit" style="border: none;cursor: pointer;">
                                            <i class="fa-solid fa-heart"></i>
                                            <?php echo $item['heart'] ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <form action="index.php" method="post" class="btn-addtocart">
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
        <section class="product">
            <div class="container">
                <div class="product__content">
                    <div class="product__content-fill">
                        <h2 class="text">Chọn Theo Tiêu Chí</h2>
                        <div class="sx">
                            <a href="index.php?page=<?php echo $page; ?>&view=desc">Sắp Xếp Giá Giảm Dần<i
                                    class="fa-solid fa-arrow-down-long"></i></a>
                            <a href="index.php?page=<?php echo $page; ?>&view=asc">Sắp Xếp Giá Tăng Dần<i
                                    class="fa-solid fa-arrow-up-long"></i></a>
                            <a href="index.php?page=<?php echo $page; ?>&view=view">Xem Nhiều Nhất<i
                                    class="fa-solid fa-eye"></i></a>
                        </div>
                        <div class="filler">
                            <h2 class="text">Chọn Theo Hãng</h2>
                            <ul>
                                <?php
                                foreach ($productModel->getAllTheFirm() as $firm) {
                                ?>
                                <li><a
                                        href="index.php?page=<?php echo $page; ?>&fill=<?php echo $firm['thefirm_id'] ?>">
                                        <img src="public/img/<?php echo $firm['thefirm_img'] ?>" alt="" class="photo">
                                    </a>

                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="price">
                            <h2 class="text">Chọn Theo Mức Giá</h2>
                            <?php
                            foreach ($productModel->getAllpiceList() as $ev) {
                            ?>
                            <a href="index.php?page=<?php echo $page; ?>&price=<?php echo $ev['price_url'] ?>">
                                <?php echo $ev['list_name'] ?>
                            </a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="thumnail">
                            <img src="public/img/ring.png" alt="" class="ring">
                        </div>
                    </div>
                    <div class="product__content-box box">
                        <?php
                        foreach ($list as $item) {
                        ?>
                        <div class="item">
                            <?php if ($item['discount'] != 0) {
                            ?>
                            <div class="discount">
                                <?php echo "Sale " . $item['discount'] . "%"; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="thumnail">
                                <img src="public/img/<?php echo $item['image'] ?>" alt="" class="photo">
                            </div>
                            <a href="productDetail.php?id=<?php echo $item['id'] ?>" class="name">
                                <?php echo $item['name'] ?>
                            </a>
                            <div class="price">
                                <?php if ($item['discount'] == 0) {
                                echo number_format($item['price']);
                            } else {
                                $discount = $item['price'] * $item['discount'] / 100;
                                ?>
                                <span style="color:#999;text-decoration: line-through;"><?php echo number_format($item['price']); ?></span>

                                <?php

                                echo number_format($item['price'] - $discount);
                            } ?>
                            </div>
                            <div class="rating" style="display:flex;align-item:center;">
                                <span class="view">
                                    <i class="fa-solid fa-eye"></i>
                                    <?php echo $item['view'] ?>
                                </span>
                                <div class="like">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="heart" value="<?php echo $item['id'] ?>">
                                        <button type="submit" style="border: none;cursor: pointer;">
                                            <i class="fa-solid fa-heart"></i>
                                            <?php echo $item['heart'] ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <form action="index.php" method="post" class="btn-addtocart">
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
                <div class="numberpage">
                    <ul class="pagination">
                        <?php
                        $temp;
                        if (isset($_GET['view'])) {
                            if ($_GET['view'] == "desc") {
                                $temp = "&view=desc";
                            } else if ($_GET['view'] == "asc") {
                                $temp = "&view=asc";
                            } else if ($_GET['view'] == "view") {
                                $temp = "&view=view";
                            }
                        } else {
                            if (isset($_GET['fill'])) {
                                $temp = "&fill=" . $_GET['fill'];
                            } else if (isset($_GET['price'])) {
                                $temp = "&price=" . $_GET['price'];
                            } else {
                                $temp = "";
                            }
                        }
                        // Nếu Số Trang Là 1 Thì Không Cho Nhấn Previous
                        if (isset($_GET['page'])) {
                            $page = (int) $_GET['page'];
                            if ($page == 1) {
                        ?>
                        <li class="page-item" style="pointer-events: none;"><a class="page-link"
                                href="index.php?page=<?php echo $page ?>">Previous</a>
                        </li>
                        <?php
                            } else {
                        ?>
                        <li class="page-item"><a class="page-link"
                                href="index.php?page=<?php echo $page - 1 . $temp ?>">Previous</a>
                        </li>
                        <?php
                            }
                        }
                        // Hiển Thị Số Trang
                        for ($i = 1; $i <= $totalPage; $i++) {
                            if ($i == $page) {
                        ?>
                        <li class="page-item" style="background: #be1125ed;">
                            <a href="index.php?page=<?php echo $i . $temp ?>" class="page-link">
                                <?php echo $i ?>
                            </a>
                        </li>
                        <?php
                            } else {
                        ?>
                        <li class="page-item">
                            <a href="index.php?page=<?php echo $i . $temp ?>" class="page-link">
                                <?php echo $i ?>
                            </a>
                        </li>
                        <?php
                            }
                        }
                        // Nếu Số Trang Nhỏ Hơn Tổng Số Trang Thì Được Nhấn Next 
                        if ($page < $totalPage) {
                        ?>
                        <li class="page-item"><a class="page-link"
                                href="index.php?page=<?php echo $page + 1 . $temp ?>">Next</a></li>
                        <?php
                        } else {
                        ?>
                        <li class="page-item" style="pointer-events: none;"><a class="page-link"
                                href="index.php?page=<?php echo $page ?>">Next</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="logo">
            <div class="container">
                <div class="logo__content owl-carousel" style="padding: 50px 0;">
                    <div class="item">
                        <img src="public/img/sli_logo1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/img/sli_logo2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/img/sli_logo3.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/img/sli_logo4.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/img/sli_logo5.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/img/sli_logo6.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/img/sli_logo7.jpg" alt="">
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        let loading = document.querySelector('.loading');
        window.addEventListener('load', () => {
            loading.classList.add('hiden');
        })
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        $('.banner__cotent-wrap').flickity({
            // options
            contain: true,
            pageDots: true,
            freeScroll: true,
            wrapAround: true,
            autoPlay: true
        });
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