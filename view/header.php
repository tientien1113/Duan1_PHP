<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$is_user_logged_in = isset($_SESSION['id_user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTC.Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./layout/header.css">
    <link rel="stylesheet" href="./layout/home.css">
    <link rel="stylesheet" href="./layout/footer.css">
    <link rel="stylesheet" href="./layout/shop.css">
    <link rel="stylesheet" href="./layout/aboutblog.css">
    <link rel="stylesheet" href="./layout/dangnhapki.css">
    <link rel="stylesheet" href="./layout/user.css">
    <link rel="stylesheet" href="./layout/cart.css">
    
</head>
<body>
<header id="header" class="header">
    <?php if ($is_user_logged_in): ?>
        <?php
        $user_profile = get_user_by_username($_SESSION['name']);
        $ds_cart_user = get_cart_user($_SESSION['id_user']);
        ?>
         <a href="index.php" class="logo">HTC.Shop</a>
        <div>
            <ul id="navbar">
            <div class="divbar">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="index.php?pg=shop">SẢN PHẨM</a></li>
                <li><a href="index.php?pg=about">GIỚI THIỆU</a></li>
                <li><a href="index.php?pg=blog">TIN TỨC</a></li>
            </div>
                <div class="col3">
                    <form action="index.php?pg=shop" method="POST" style="margin-left:-30px">
                        <input type="text" name="kyw" placeholder="Tìm Kiếm" style="width:356px;">
                        <input type="hidden" name="pg" value="shop">
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </div>
              
                <li id="id_user" class="icon">
                    <div class="dropdown-content">
                        <a href="index.php?pg=profile_user" class="header__navsub-item"><img src="./layout/img/people/<?=$user_profile['hinh']?>" alt="" width="24px"> <?=$user_profile['hoten']?></a>
                        <a href="index.php?pg=profile_user&act=user_updates" class="header__navsub-item"><i class="fas fa-users-cog"></i>  Cài Đặt</a>
                        <a href="view/dangxuat.php" id="dangxuat" class="header__navsub-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    </div>
                    <a id="user"><img src="../layout/img/people/<?=$user_profile['hinh']?>" alt="" width="36px" height="36px" style="border-radius: 50%!important;"></a>
                </li>
                <li id="lg-bag" class="icon">
                    <a href="index.php?pg=cart"><i class="fa-solid fa-bag-shopping"></i>
                        <?php
                        $count_cart = get_count_cart($_SESSION['id_user']);
                        echo '<span class="cart-quantity">' . $count_cart['soluong_cart'] . '</span>';
                        ?>
                    </a>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="index.php?pg=cart"><i class="fa-solid fa-bag-shopping"></i>
            </a>
           
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    <?php else: ?>
        <a href="index.php" class="logo">HTC.Shop</a>
        <div>
            <ul id="navbar">
            <div class="divbar">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="index.php?pg=shop">SẢN PHẨM</a></li>
                <li><a href="index.php?pg=about">GIỚI THIỆU</a></li>
                <li><a href="index.php?pg=blog">TIN TỨC</a></li>
            </div>
                <div class="col3">
                    <form action="index.php?pg=shop" method="POST" style="margin-left:-30px">
                        <input type="text" name="kyw" placeholder="Tìm Kiếm" style="width:356px;">
                        <input type="hidden" name="pg" value="shop">
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </div>
               
                <li id="id_user">
                    <div class="dropdown-content">
                        <a href="index.php?pg=dangky" id="login1" class="header__navsub-item"><i class="fas fa-user-plus"></i> Đăng ký</a>
                        <a href="index.php?pg=dangnhap" id="login1" class="header__navsub-item"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                    </div>
                    <a id="user"><i class="fas fa-user"></i></a>
                </li>
                <li id="lg-bag"><a href="index.php?pg=cart"><i class="fa-solid fa-bag-shopping"></i>
                
                </i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
        <i class="fa-solid fa-bag-shopping"></i>
        </div>
    <?php endif; ?>
</header>

<script>
    var user = document.getElementById('id_user');
    var navsub = document.getElementsByClassName('dropdown-content')[0];
    var navsubDisplay = navsub.style.display;
    user.onclick = function(){
        var isClose = navsub.style.display === navsubDisplay;
        if(isClose){
            navsub.style.display = 'block';
        }else{
            navsub.style.display = null;
        }
    }
</script>
</body>
</html>
