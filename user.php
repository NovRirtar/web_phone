<?php
include("cpn_user.php");
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
    <style>
        .hidden {
            right: -37px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__content">
                <div class="header__content-logo">
                    <a href="./"><img src="./public/img/logomr" alt="" class="logoheader" width="110px"></a>
                </div>
                <div class="header__content-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>

                </div>
                <div class="header__content-contact" style="align-items: center;">
                    <div class="user">
                        <?php
                        if (!isset($_COOKIE['user'])) {
                        ?>
                        <a href="login.php" class="text"><i class="fa-solid fa-user"></i>Login</a>
                        <?php
                        } else {
                        ?>
                        <a href="#" class="blockact"
                            style="text-transform: uppercase;font-weight:600;display:inline-block;margin-top:1px">
                            <?php
                            if (isset($_COOKIE['user'])) {
                            ?>
                            <div class="photo_avt" style="width:50px;height:50px;">
                                <img src="public/avata/<?php echo $info_list['info_image']; ?>" alt=""
                                    class="thumnail_user">
                            </div>
                            <!-- <?php
                                if ($info_list['info_name'] != null) {
                                    echo $info_list['info_name'];
                                } else {
                                    echo $_COOKIE['user'];
                                }
                            }
                            ?> -->
                        </a>
                        <div class="hidden">
                            <a href="index.php">Home</a>
                            <a href="changepass.php">Change Password</a>
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
        <?php
        if (isset($_COOKIE['user'])) {
        ?>

        <section class="info">
            <div class="container">
                <div class="info__content" style="margin-top:50px;">
                    <div class="info_content-img">
                        <div class="photo_avt">
                            <img src="public/avata/<?php echo $info_list['info_image'] ?>" alt="" class="thumnail_user">
                        </div>
                        <h2 class="name" style="margin: 30px 0 10px;">
                            <?php echo $info_list['info_name'] ?>
                        </h2>
                    </div>
                    <div class="info_content-detail">
                        <form action="user.php" method="post" enctype="multipart/form-data">
                            <div class="form_group">
                                <label for="name">Họ Và Tên</label>
                                <input type="text" name="name" id="name" value="<?php echo $info_list['info_name'] ?>">
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
            </div>
        </section>
        <?php
        }
        ?>
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
    </script>
</body>

</html>