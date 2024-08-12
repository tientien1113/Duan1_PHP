<?php
// $html_dssp_new = showsp($dssp_new);
// $html_dssp_best = showsp($dssp_best);
// $html_dssp_view = showsp($dssp_view);
// $html_luotmua = showluotmua($dssp_luotmua);

$html_luotmua = "";
foreach ($dssp_luotmua as $item){
    extract($item);
    $html_luotmua .= '<div class="pro">
                        <a href="index.php?pg=sproduct&id=' . $id . '">
                            <img src="./upload/' . $hinh . '" alt="">
                        </a>
                        <div class="des">
                            <span>' . $ten_loai . '</span>
                            <a href="index.php?pg=sproduct&id=' . $id . '">
                                <h5>' . $ten_sp . '</h5>
                            </a>
                            <h4>' . number_format($gia, 0, ',', '.') . ' VND</h4>
                        </div>
                        <form method="post" action="index.php?pg=cart">
                            <input type="hidden" name="id" value="' . $id . '">
                            <input type="hidden" name="name" value="' . $ten_sp . '">
                            <input type="hidden" name="img" value="' . $hinh . '">
                            <input type="hidden" name="price" value="' . $gia . '">
                            <input type="hidden" name="soluong" value="1">
                            <button type="submit" name="cart" class="btn-cart"> Đặt hàng</button>
                        </form>
                    </div>';
}

$html_new = "";
foreach ($dssp_new as $item){
    extract($item);
    $html_new .= '<div class="pro">
            <a href="index.php?pg=sproduct&id=' . $id . '">
                <img src="./upload/' . $hinh . '" alt="">
            </a>
            <div class="des">
                <span class="tenloai">' . $ten_loai . '</span>
                <a href="index.php?pg=sproduct&id=' . $id . '">
                    <h5>' . $ten_sp . '</h5>
                </a>
                <h4>' . number_format($gia, 0, ',', '.') . ' VND</h4>
            </div>
            <form method="post" action="index.php?pg=cart">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="name" value="' . $ten_sp . '">
                <input type="hidden" name="img" value="' . $hinh . '">
                <input type="hidden" name="price" value="' . $gia . '">
                <input type="hidden" name="soluong" value="1">
                <button type="submit" name="cart"class="btn-cart">Đặt hàng</button>
            </form>
        </div>';
}

$html_view = "";
foreach ($dssp_view as $item){
    extract($item);
    $html_view .= '<div class="pro">
            <a href="index.php?pg=sproduct&id=' . $id . '">
                <img src="./upload/' . $hinh . '" alt="">
            </a>
            <div class="des">
                <span>' . $ten_loai . '</span>
                <a href="index.php?pg=sproduct&id=' . $id . '">
                    <h5 ">' . $ten_sp . '</h5>
                </a>
                <h4>' . number_format($gia, 0, ',', '.') . ' VND</h4>
            </div>
            <form method="post" action="index.php?pg=cart">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="name" value="' . $ten_sp . '">
                <input type="hidden" name="img" value="' . $hinh . '">
                <input type="hidden" name="price" value="' . $gia . '">
                <input type="hidden" name="soluong" value="1">
                <button type="submit" name="cart"class="btn-cart">Đặt hàng</button>
            </form>
        </div>';
}

$html_sanpham_best = "";
foreach ($dssp_best as $item){
    extract($item);
    $html_sanpham_best .= '<div class="pro">
            <a href="index.php?pg=sproduct&id=' . $idsp . '">
                <img src="./upload/' . $hinh . '" alt="">
            </a>
            <div class="des">
                <span>' . $namedm . '</span>
                <a href="index.php?pg=sproduct&id=' . $idsp . '">
                    <h5>' . $namesp . '</h5>
                </a>
                <h4>' . number_format($gia, 0, ',', '.') . ' VND</h4>
            </div>
            <form method="post" action="index.php?pg=cart">
                <input type="hidden" name="id" value="' . $idsp . '">
                <input type="hidden" name="name" value="' . $namesp . '">
                <input type="hidden" name="img" value="' . $hinh . '">
                <input type="hidden" name="price" value="' . $gia . '">
                <input type="hidden" name="soluong" value="1">
                <button type="submit" name="cart"class="btn-cart">Đặt hàng</button>
            </form>
        </div>';
}
?>




<section class="banner">
    <div class="arrow left" id="prev"><i class="fa-solid fa-circle-chevron-left"></i></div>
    <a href="index.php?pg=shop" id="bannerlink"><img src="upload/5.jpg" alt="bannerimg" id="bannerimg"></a>
    <div class="arrow right" id="next"><i class="fa-solid fa-circle-chevron-right"></i></div>
</section> 
<section id="product1" class="section-p1">
    <h2>SẢN PHẨM BÁN CHẠY</h2>
    <div class="pro-container">
        <?= $html_luotmua;?>
    </div>
    <div class="see-more">
        <a href="index.php?pg=shop" class="btn">➔Xem Thêm</a>
    </div>
</section>

<section id="product1" class="section-p1">
    <h2>SẢN PHẨM MỚI</h2>
    <div class="pro-container">
        <?= $html_new;?>
    </div><div class="see-more">
        <a href="index.php?pg=shop" class="btn">➔Xem Thêm</a>
    </div>
</section>

<section id="banner" class="banner">
    <a href="index.php?pg=shop" id="bannerlink"><img src="upload/5.jpg" alt="bannerimg" id="bannerimg"></a>
</section>

<section id="product1" class="section-p1">
    <h2>SẢN PHẨM XU HƯỚNG</h2>
    <div class="pro-container">
        <?= $html_view?>
    </div>
    <div class="see-more">
        <a href="index.php?pg=shop" class="btn">➔Xem Thêm</a>
    </div>
</section>

<section id="product1" class="section-p1">
    <h2>SẢN PHẨM HOT</h2>
    <div class="pro-container">
        <?= $html_sanpham_best?>
    </div>
    <div class="see-more">
        <a href="index.php?pg=shop" class="btn">➔Xem Thêm</a>
    </div>
</section>
<script>
    const images = [{
            src: "upload/5.jpg",
            href: "index.php?pg=shop"
        },
        {
            src: "upload/2.jpg",
            href: "index.php?pg=shop"
        }
    ];

    let currentIndex = 0;
    const bannerImage = document.getElementById('bannerimg');
    const bannerLink = document.getElementById('bannerlink');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    function changeImage(index) {
        currentIndex = (index + images.length) % images.length; // Ensure index is within bounds
        bannerImage.src = images[currentIndex].src;
        bannerLink.href = images[currentIndex].href;
    }

    function nextImage() {
        changeImage(currentIndex + 1);
    }

    function prevImage() {
        changeImage(currentIndex - 1);
    }

    prevButton.addEventListener('click', prevImage);
    nextButton.addEventListener('click', nextImage);

    setInterval(nextImage, 5000); // Change image every 5 seconds
</script>
