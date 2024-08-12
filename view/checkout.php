<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .show-once {
            display: none;
        }
    </style>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="checkout_area section_gap" style="margin-top: 80px;">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <form class="row contact_form" action="index.php?pg=dhthanhcong" method="post" id="checkout_form" novalidate="novalidate">
                    <div class="col-lg-8">
                        <h3>Thông Tin Thanh Toán</h3>
                        <?php
                        if ($is_user_logged_in) {
                            $user_info = get_user_by_id($_SESSION['id_user']);
                        ?>
                        <div class="col-md-12 form-group">
                            <label for="nguoinhan_ten">Họ và Tên</label>
                            <input type="text" class="form-control" id="nguoinhan_ten" name="nguoinhan_ten" placeholder="Nhập họ và tên người nhận" value="<?php echo $user_info['hoten']; ?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="nguoinhan_diachi">Địa chỉ giao hàng</label>
                            <input type="text" class="form-control" id="nguoinhan_diachi" name="nguoinhan_diachi" placeholder="Địa chỉ giao hàng" value="<?php echo $user_info['diachi']; ?>">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="nguoinhan_sdt">Số điện thoại người nhận</label>
                            <input type="text" class="form-control" id="nguoinhan_sdt" name="nguoinhan_sdt" placeholder="Số điện thoại người nhận" value="<?php echo $user_info['dienthoai']; ?>">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="nguoinhan_email">Địa chỉ Email</label>
                            <input type="text" class="form-control" id="nguoinhan_email" name="nguoinhan_email" placeholder="Địa chỉ Email" value="<?php echo $user_info['email']; ?>">
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="accept_terms" required>
                            <label for="f-option4">Tôi đã đọc và chấp nhận </label>
                            <a href="#">điều khoản & điều kiện*</a>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" name="order_notes" id="order_notes" rows="1" placeholder="Ghi chú đơn hàng"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-4" style="margin-right: px ;">
                        <div class="order_box" style="left: 124px;">
                            <h2>Hoá Đơn Chi Tiết</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Tổng cộng</span></a></li>
                            </ul>
                            <ul class="list">
                                <?php
                                foreach ($ds_cart_user as $item) {
                                    $ten_sp = strlen($item['ten_sp']) > 20 ? substr($item['ten_sp'], 0, 10) . '...' : $item['ten_sp'];

                                    echo '<li style="display:flex; justify-items:center"><a style="width:220px">' . $ten_sp . '</a><a style="width:138px"><span class="middle">x ' . $item['soluong'] . '</span></a><a style="width:138px"> <span class="last">' . number_format($item['thanhtien']) . '</span></a></li><hr>';
                                }
                                ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Tổng Giá <span>
                                            <?php $sum_cart = get_sum_cart($_SESSION['id_user']);
                                            echo number_format($sum_cart['tong_cart']) . ' VNĐ'; ?></span></a></li>
                                <li><a href="#">Vận chuyển <span>Phí cố định: Free</span></a></li>
                                <li><a href="#">Thanh Toán <span>
                                            <?php $sum_cart = get_sum_cart($_SESSION['id_user']);
                                            echo number_format($sum_cart['tong_cart']) . ' VNĐ'; ?></span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" checked="checked" name="selector" value="0">
                                    <label for="f-option5">Thanh toán khi nhận hàng</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" value="1">
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                            </div>
                            <?php $sum_cart = get_sum_cart($_SESSION['id_user']);
                            echo '<input type="hidden" name="tongtien" value="' . $sum_cart['tong_cart'] . '">'; ?>
                            <input type="submit" name="thanhtoan" value="Đặt Hàng" class="primarys-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- checkform -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var thongTinNguoiNhan = [
            { id: 'nguoinhan_ten', label: 'Họ và Tên' },
            { id: 'nguoinhan_diachi', label: 'Địa chỉ giao hàng' },
            { id: 'nguoinhan_sdt', label: 'Số điện thoại người nhận' },
            { id: 'nguoinhan_email', label: 'Địa chỉ Email' }
        ];
        var checkboxDieuKhoan = document.getElementById('f-option4');
        var formThanhToan = document.getElementById('checkout_form');
        // Hàm bật trạng thái chỉ đọc của ô nhập liệu
        function batTrangThaiChiDoc(nguonNhap) {
            nguonNhap.removeAttribute('readonly');
        }
        // Hàm tắt trạng thái chỉ đọc của ô nhập liệu
        function tatTrangThaiChiDoc(nguonNhap) {
            nguonNhap.setAttribute('readonly', true);
        }
        // Hàm hiển thị thông báo lỗi
        function hienThongBaoLoi(idNguonNhap, thongBao) {
            var nguonNhap = document.getElementById(idNguonNhap);
            var divLoi = document.createElement('div');
            divLoi.className = 'error-message';
            divLoi.textContent = thongBao;
            divLoi.id = idNguonNhap + '_error';
            // Hiển thị thông báo lỗi trực tiếp tại input
            nguonNhap.insertAdjacentElement('afterend', divLoi);
        }
        // Hàm xóa thông báo lỗi
        function xoaThongBaoLoi(idNguonNhap) {
            var divLoi = document.getElementById(idNguonNhap + '_error');
            if (divLoi) {
                divLoi.remove();
            }
        }
        // Bắt sự kiện khi người dùng tập trung vào ô nhập liệu
        function xuLySuKienTapTrung(nguonNhap) {
            nguonNhap.addEventListener('focus', function () {
                batTrangThaiChiDoc(nguonNhap);
                xoaThongBaoLoi(nguonNhap.id);
            });
            nguonNhap.addEventListener('focusout', function () {
                tatTrangThaiChiDoc(nguonNhap);
                // Kiểm tra và hiển thị thông báo nếu trường trống hoặc checkbox chưa được tích
                if (!nguonNhap.value.trim() && nguonNhap.id !== 'nguoinhan_email' && nguonNhap.id !== 'nguoinhan_diachi') {
                    hienThongBaoLoi(nguonNhap.id, thongTinNguoiNhan.find(item => item.id === nguonNhap.id).label + ' không được để trống');
                }
            });
        }
        // Bắt sự kiện khi submit form
        formThanhToan.addEventListener('submit', function (suKien) {
            // Ẩn tất cả thông báo lỗi trước khi kiểm tra lại
            var thongBaoLoi = document.querySelectorAll('.error-message');
            thongBaoLoi.forEach(function (loi) {
                loi.remove();
            });
            // Kiểm tra và hiển thị thông báo nếu checkbox chưa được tích
            if (!checkboxDieuKhoan.checked) {
                suKien.preventDefault();
                hienThongBaoLoi('f-option4', 'Bạn phải đọc và chấp nhận điều khoản và điều kiện');
            }
            // Kiểm tra địa chỉ giao hàng
            var nguonNhapDiaChiGiaoHang = document.getElementById('nguoinhan_diachi');
            var giaTriDiaChiGiaoHang = nguonNhapDiaChiGiaoHang.value.trim().toLowerCase();
            if (!giaTriDiaChiGiaoHang || giaTriDiaChiGiaoHang === 'địa chỉ giao hàng') {
                suKien.preventDefault();
                hienThongBaoLoi('nguoinhan_diachi', 'Vui lòng nhập địa chỉ giao hàng');
            }
        });
        // Áp dụng cho tất cả các trường thông tin
        thongTinNguoiNhan.forEach(xuLySuKienTapTrung);
    });
</script>
<!-- end checkform -->

<!-- Thêm Bootstrap JS và các phụ thuộc -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
