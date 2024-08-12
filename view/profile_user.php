<?php
if (is_user_logged_in()) {
  $user_profile = get_user_by_id($_SESSION['id_user']);
  $get_bill_user = get_bill_user($_SESSION['id_user']);
}

if (isset($_GET['id_bill'])) {
  $id_bill = $_GET['id_bill'];
  $get_billchitiet_user = get_billchitiet_user($_SESSION['id_user'], $id_bill);
  $show_billchitiet_user = show_billchitiet_user($get_billchitiet_user);
} else {
  $show_bill_user = !empty($get_bill_user) ? show_bill_user($get_bill_user) : 'Không có đơn hàng nào được tìm thấy.';
}

?>
<div class="container main-secction">
  <div class="">
    <div class=" user-left-part">
      <div class=" col-xs-12 user-profil-part pull-left">
        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
          <img src="./layout/img/people/<?= $user_profile['hinh'] ?>" class="avatar rounded-circle" alt="avatar">
        </div>
      </div>
      <div style="margin-left: 234px">
        <br>
        <h3>XIN CHÀO !</h3><strong style="font-size:24px;"><?= $user_profile['hoten']; ?></strong>
      </div>
    </div>
  </div>
</div>
<div class="container" style="margin: 24px 24px;">
  <div class="row" style="margin-left: 52px;">
    <div class="col-md-3 ">
      <div class="list-group ">
        <a href="index.php?pg=profile_user&act=profile_user" class="list-group-item list-group-item-action active click">THÔNG TIN TÀI KHOẢN</a>
        <a href="index.php?pg=profile_user&act=order" class="list-group-item list-group-item-action click">LỊCH SỬ ĐẶT HÀNG</a>
        <a href="index.php?pg=profile_user&act=user_updates" class="list-group-item list-group-item-action click">THAY ĐỔI THÔNG TIN</a>
        <a href="index.php?pg=dangxuat" id="dangxuat" class="list-group-item list-group-item-action click">THOÁT</a>
      </div>
    </div>
    <?php
    if ($_GET['pg'] == 'profile_user' && !isset($_GET['act'])) {
      $_GET['act'] = 'profile_user';
    }
    switch ($_GET['act']) {
      case 'profile_user':
        echo '<div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>THÔNG TIN CÁ NHÂN</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-group row">
                                                <label for="username" class="col-4 col-form-label">Họ Tên</label>
                                                <div class="col-8">
                                                    <input id="username" name="username" placeholder="Họ Tên" required="required" class="form-control here" type="text" value="' . $user_profile['hoten'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="number-phone" class="col-4 col-form-label">Số Điện Thoại</label>
                                                <div class="col-8">
                                                    <input id="number-phone" name="number-phone" placeholder="Số Điện Thoại" class="form-control here" required="required" type="text" value="' . $user_profile['dienthoai'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Email</label>
                                                <div class="col-8">
                                                    <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text" value="' . $user_profile['email'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Role</label>
                                                <div class="col-8">
                                                    <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text" value="' . $user_profile['role'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-4 col-form-label">Địa Chỉ</label>
                                                <div class="col-8">
                                                    <textarea id="address" name="address" cols="40" rows="4" class="form-control">' . $user_profile['diachi'] . '</textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        break;
      case 'user_updates':
        echo '<div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>CÀI ĐẶT CÁ NHÂN</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="index.php?pg=profile_user" method="POST">
                                            <div class="form-group row">
                                                <label for="hoten" class="col-4 col-form-label">Họ Tên</label>
                                                <div class="col-8">
                                                    <input id="hoten" name="hoten" placeholder="Họ Tên" required="required" class="form-control here" type="text" value="' . $user_profile['hoten'] . '">
                                                    <input type="hidden" name="id" value="' . $user_profile['id'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="number-phone" class="col-4 col-form-label">Số Điện Thoại</label>
                                                <div class="col-8">
                                                    <input id="number-phone" name="number-phone" placeholder="Số Điện Thoại" class="form-control here" required="required" type="text" value="' . $user_profile['dienthoai'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Email</label>
                                                <div class="col-8">
                                                    <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text" value="' . $user_profile['email'] . '">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-4 col-form-label">Địa Chỉ</label>
                                                <div class="col-8">
                                                    <textarea id="address" name="address" cols="40" rows="4" class="form-control">' . $user_profile['diachi'] . '</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row change_pass">
                                                <label for="" class="col-4 col-form-label" style="cursor: pointer;">Đổi Mật Khẩu</label>
                                            </div>
                                            <div class="form-group row oldpass" style="display:none">
                                                <label for="oldpass" class="col-4 col-form-label">Mật Khẩu Cũ</label>
                                                <div class="col-8">
                                                    <input id="oldpass" name="oldpass" placeholder="Mật Khẩu" class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row newpass" style="display:none">
                                                <label for="newpass" class="col-4 col-form-label">Mật Khẩu Mới</label>
                                                <div class="col-8">
                                                    <input id="newpass" name="newpass" placeholder="Mật Khẩu" class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-4 col-8">
                                                    <button name="submit" type="submit" class="btn btn-primary">Cập Nhật</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        break;
      case 'order_chitiet':
        echo '<div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Hoá Đơn Chi Tiết</h4>
                                    </div>
                                </div>
                                <table id="example" class="table table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <td>Sản Phẩm</td>
                                            <td>Hình Ảnh</td>
                                            <td>Giá</td>
                                            <td>SL</td>
                                            <td colspan="2">Tổng</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ' . $show_billchitiet_user . '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
        break;
      case 'order':
        echo '<div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Đơn Hàng</h4>
                                    </div>
                                </div>
                                <table id="example" class="table table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Tổng</th>
                                            <th>Ngày</th>
                                            <th>Trạng Thái</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ' . $show_bill_user . '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
        break;
    }
    ?>
  </div>
</div>

<style>
  .click {
    z-index: 2;
    color: #000;
    background-color: #fff;
    border-color: #ccc;
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var changePassBtn = document.querySelector('.change_pass');
    var oldPassFields = document.querySelectorAll('.oldpass, .newpass');

    if (changePassBtn) {
      changePassBtn.addEventListener('click', function() {
        oldPassFields.forEach(function(field) {
          field.style.display = field.style.display === 'none' ? 'flex' : 'none';
        });
      });
    }

    var listGroupItems = document.querySelectorAll('.list-group-item');
    listGroupItems.forEach(function(item) {
      item.addEventListener('click', function() {
        listGroupItems.forEach(function(el) {
          el.classList.remove('click');
        });
        item.classList.add('click');
      });
    });
  });
</script>