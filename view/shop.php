<?php
// $html_dssp_current_category = showsp($dssp);
$html_dssp="";
foreach ($dssp as $item){
        extract($item);
        $html_dssp.= '<div class="pro boxdssp">
                <a href="index.php?pg=sproduct&id=' . $id . '">
                    <img src="./upload/' . $hinh . '" alt="">
                </a>
                <div class="des">
                    <h5>'.$ten_sp.'</h5>
                    <h4>'.number_format($gia,0,',','.').' VND</h4>
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
?>

<section id="page-header" class="bgtitle">
        <h2>Sản phẩm</h2>
        <!-- <p>Save more with coupons & up to 70% off! </p> -->
</section>

<section id="product1" class="section-p1">
        <div class="pro-container">
            <div class="col-3">
                <ul class="cat_menu">
                    <?php
                    // Hiển thị danh mục sản phẩm
                    foreach ($dsdm as $dm) {
                        // $activeClass = ($dm['id'] == $iddm) ? 'active' : '';
                        echo '<li><a href="index.php?pg=shop&iddm=' . $dm['id'] . '">' . $dm['ten_loai'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        <div class="col-9">
            <?= $html_dssp; ?>
        </div>
        </div>
    </div>
</section>



<section id="pagination" class="section-p1">
    <!-- Hiển thị phân trang nếu cần --> 
     <?=$hienthisotrang?>
</section>
