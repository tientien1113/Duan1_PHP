<footer class="section-p1">
    <div class="copyright">
    <h4>HTC.Shop</h4><br>
    
        <p>Thương hiệu HTC được phân phối chính thức bởi </p>
        <p>Công ty Cổ Phần Quốc tế Tam Sơn Giấy chứng nhận đăng ký kinh doanh số: 0101794983 do Sở Kế hoạch và Đầu tư thành phố Hà Nội 
        cấp lần đầu ngày 07 tháng 10 năm 2005</p>
        <p>Địa chỉ trụ sở : Số 21, Ngõ 2, Lê Văn Hưu, Quận Hai Bà Trưng, Hà Nội, Việt Nam <br>
        Tel: +84 24 39369757 <br>
        Fax: +84 24 39369759</p>  
    </div>
</footer>
<script src="layout/script.js">

</script>
<script src="layout/js/jquery-3.3.1.min.js"></script>
<script src="layout/styles/bootstrap4/popper.js"></script>
<script src="layout/styles/bootstrap4/bootstrap.min.js"></script>
<script src="layout/plugins/greensock/TweenMax.min.js"></script>
<script src="layout/plugins/greensock/TimelineMax.min.js"></script>
<script src="layout/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="layout/plugins/greensock/animation.gsap.min.js"></script>
<script src="layout/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="layout/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="layout/plugins/slick-1.8.0/slick.js"></script>
<script src="layout/plugins/easing/easing.js"></script>
<script src="layout/js/custom.js"></script>
<script src="layout/js1/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="layout/js1/vendor/bootstrap.min.js"></script>
<script src="layout/js1/jquery.ajaxchimp.min.js"></script>
<script src="layout/js1/jquery.nice-select.min.js"></script>
<script src="layout/js1/jquery.sticky.js"></script>
<script src="layout/js1/nouislider.min.js"></script>
<script src="layout/js1/jquery.magnific-popup.min.js"></script>
<script src="layout/js1/owl.carousel.min.js"></script>
<!--gmaps Js-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.querySelector(".eye");
        const togglePasswordSlash = document.querySelector(".eye-none");

        togglePassword.addEventListener("click", function() {
            passwordInput.type = "text";
            togglePassword.style.display = "none";
            togglePasswordSlash.style.display = "block";
        });

        togglePasswordSlash.addEventListener("click", function() {
            passwordInput.type = "password";
            togglePassword.style.display = "block";
            togglePasswordSlash.style.display = "none";
        });
    });

    function showNotification(message, type) {
        var alertDiv = document.createElement("div");
        alertDiv.className = "alert " + type;
        alertDiv.innerHTML = message;

        document.body.appendChild(alertDiv);

        setTimeout(function() {
            alertDiv.style.opacity = "0";
            setTimeout(function() {
                alertDiv.remove();
            }, 500);
        }, 3000);
    }
</script>
<!-- thêm sản phẩm vào giỏ hàng -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Bắt sự kiện khi form thêm vào giỏ hàng được submit
        document.querySelectorAll('.add-to-cart-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Ngăn chặn sự kiện submit mặc định của form
                var formData = new FormData(this);

                // Gửi yêu cầu AJAX đến server
                fetch('index.php?pg=cart', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Xử lý phản hồi từ server
                        if (data.success) {
                            // Cập nhật giao diện mà không làm tải lại trang
                            alert('Sản phẩm đã được thêm vào giỏ hàng!');
                            // Thêm các hành động cập nhật giao diện tại đây
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function cancelOrder(bill_id) {
        var confirmation = confirm("Bạn chắc chắn muốn hủy đơn hàng?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: "index.php?pg=cancel_order",
                data: {
                    bill_id: bill_id
                },
                success: function(response) {
                    if (response === "success") {
                        alert("Đơn hàng đã được hủy!");
                        window.location.href = "index.php?pg=profile_user&act=order";
                    } else {
                        alert("Đơn hàng đã được hủy!");
                        window.location.href = "index.php?pg=profile_user&act=order";
                    }
                },
                error: function() {
                    alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
                }
            });
        }
    }
</script>
</body>

</html>