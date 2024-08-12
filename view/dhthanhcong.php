
<style>
    .order_details {
        width: 1519px;
        height: 500px;
    }
        .order_details_table {
            display: none;
        }
        #toggleOrderDetails {
            background-color: #088178; 
            color: white; 
            padding: 10px 20px; 
            border: none;
            border-radius: 5px; 
            cursor: pointer;
            
        }
        #toggleOrderDetails:hover {
            background-color: #088178;
        }
    </style>

	<section class="order_details section_gap">
        <div class="container">
            <h3 class="title_confirmation">Đặt Hàng Thành Công ! <a href="index.php?pg=profile_user&act=order"> Xem Đơn Hàng Tại Đây </a></h3>
            <!-- <div class="row order_d_inner">
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Thông Tin Đơn Hàng</h4>
                        <ul class="list">
                            <li><a href="#"><span>Mã Đơn Hàng</span> : </a></li>
                            <li><a href="#"><span>Ngày Đặt Hàng</span> : </a></li>
                            <li><a href="#"><span>Tổng cộng</span> : VNĐ</a></li>  
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Thông Tin Người Nhận</h4>
                        <ul class="list">
                            <li><a href="#"><span>Tên Người Nhận </span> :</a></li>
                            <li><a href="#"><span>Số Điện Thoại</span> : </a></li>
                            <li><a href="#"><span>Địa Chỉ</span> : </a></li>
                            <li><a href="#"><span>Email </span> : </a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- <button id="toggleOrderDetails">Xem Chi Tiết</button>
            <div class="order_details_table" id="orderDetailsTable">
                <h2>Chi Tiết Đơn Hàng</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Pixelstore Blackberry tươi mới</p>
                                </td>
                                <td>
                                    <h5>x 02</h5>
                                </td>
                                <td>
                                    <p>$720.00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Pixelstore Blackberry tươi mới</p>
                                </td>
                                <td>
                                    <h5>x 02</h5>
                                </td>
                                <td>
                                    <p>$720.00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Pixelstore Blackberry tươi mới</p>
                                </td>
                                <td>
                                    <h5>x 02</h5>
                                </td>
                                <td>
                                    <p>$720.00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Tổng cộng phụ</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>$2160.00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Vận chuyển</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>Phí cố định: $50.00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Tổng cộng</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>$2210.00</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
    </section>
    
    <!-- js -->
    <script>
        // Lấy các phần tử DOM cần thiết
        var orderDetailsTable = document.getElementById('orderDetailsTable');
        var toggleOrderDetailsButton = document.getElementById('toggleOrderDetails');

        // Thêm sự kiện click cho button "Xem Chi Tiết"
        toggleOrderDetailsButton.addEventListener('click', function () {
            // Ẩn/hiện chi tiết đơn hàng
            if (orderDetailsTable.style.display === 'none') {
                orderDetailsTable.style.display = 'block';
                toggleOrderDetailsButton.textContent = 'Ẩn Chi Tiết';
            } else {
                orderDetailsTable.style.display = 'none';
                toggleOrderDetailsButton.textContent = 'Xem Chi Tiết';
            }
        });
    </script>