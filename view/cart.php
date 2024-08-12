<?php
if (is_user_logged_in()) {
    $ds_cart_user = get_cart_user($_SESSION['id_user']);
} else {
    $ds_cart_user = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <!-- Thêm Bootstrap CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <section id="page-header" class="about-header">
        <h2>GIỎ HÀNG</h2>
    </section>

    <section id="cart" class="section-p1">
        <?php if (!empty($ds_cart_user)) : ?>
            <table width="100%">
                <thead>
                    <tr>
                        <td>Xóa</td>
                        <td>Hình ảnh</td>
                        <td>Sản phẩm</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng cộng</td>
                    </tr>
                </thead>
                <tbody>
                    <?= displayCart($ds_cart_user); ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Giỏ hàng của bạn đang trống. Hãy tiếp tục mua sắm để thêm sản phẩm vào giỏ hàng.</p>
        <?php endif; ?>
    </section>

    <section id="cart-add" class="section-p1">
        <?php if (!empty($ds_cart_user)) : ?>
            <div id="coupon">
                <h3>Áp Dụng Mã Giảm Giá</h3>
                <div>
                    <form method="post" action="index.php?pg=cart">
                        <input type="text" name="discount_code" placeholder="Nhập Mã Giảm Giá Của Bạn">
                        <button type="submit" class="normal">Áp Dụng</button>
                    </form>
                </div>
            </div>

            <div id="subtotal">
                <h3>Tổng Giỏ Hàng</h3>
                <table>
                    <?php
                    $sum_cart = get_sum_cart($_SESSION['id_user']);
                    if ($sum_cart !== false) :
                    ?>
                        <tr>
                            <td>Tổng Giá Giỏ Hàng</td>
                            <td><?= number_format($sum_cart['tong_cart']) ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td>Phí Vận Chuyển</td>
                            <td>Miễn phí</td>
                        </tr>
                        <tr>
                            <td><strong>Tổng Cộng</strong></td>
                            <td><strong><?= number_format($sum_cart['tong_cart']) ?> VNĐ</strong></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <a class="normal" href="index.php?pg=checkout">Tiếp Tục Thanh Toán</a>
            </div>
        <?php endif; ?>
    </section>

    <!-- Thêm Bootstrap JS và các phụ thuộc -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>