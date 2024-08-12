<?php
require_once 'pdo.php';

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    delete_cart($id);
    // Redirect về trang giỏ hàng sau khi xóa sản phẩm
    header('Location: index.php?pg=cart');
    exit;
}

// Xử lý cập nhật số lượng sản phẩm trong giỏ hàng
if (isset($_POST['update_cart'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $thanhtien = $price * $quantity;
    updates_cart($id, $quantity, $thanhtien, $_SESSION['id_user']);
    header('Location: index.php?pg=cart');
}

// Hiển thị giỏ hàng
function displayCart($cart)
{
    $html_cart = '';
    if ($cart) {
        foreach ($cart as $item) {
            $html_cart .= '<tr>
                              <td><a href="index.php?pg=cart&action=delete&id=' . $item['id'] . '" style="color:#000"><i class="far fa-times-circle"></i></a></td>
                              <td><img src="./upload/' . $item['hinh'] . '" alt=""></td>
                              <td>' . $item['ten_sp'] . '</td>
                              <td>' . number_format($item['gia']) . ' VNĐ</td>
                              <td>
                                  <form action="" method="post">
                                      <input type="hidden" name="update_cart" value="1">
                                      <input type="hidden" name="id" value="' . $item['id_product'] . '">
                                      <input type="hidden" name="price" value="' . $item['gia'] . '">
                                      <input type="number" name="quantity" value="' . $item['soluong'] . '" min="1" onchange="this.form.submit()">
                                  </form>
                              </td>
                              <td>' . number_format($item['thanhtien']) . ' VNĐ</td>
                          </tr>';
        }
    } else {
        $html_cart = '<tr><td colspan="6">Giỏ hàng của bạn trống.</td></tr>';
    }

    return $html_cart;
}

function add_cart($product_id, $id_user, $product_name, $product_img, $product_price, $product_quantity, $thanhtien)
{
    $sql = "INSERT INTO giohang (id_product, id_user, ten_sp, hinh, gia, soluong, thanhtien) VALUES (?, ?, ?, ?, ?, ?, ?);";
    return pdo_execute($sql, $product_id, $id_user, $product_name, $product_img, $product_price, $product_quantity, $thanhtien);
}

function updates_cart($id, $product_quantity, $thanhtien, $id_user)
{
    $sql = "UPDATE giohang SET soluong = ?, thanhtien = ? WHERE id_product = ? AND id_user = ?";
    return pdo_execute($sql, $product_quantity, $thanhtien, $id, $id_user);
}

function delete_cart($id)
{
    $sql = 'DELETE FROM giohang WHERE id = ?;';
    return pdo_execute($sql, $id);
}

function delete_cart_user($id_user)
{
    $sql = 'DELETE FROM giohang WHERE id_user = ?;';
    return pdo_execute($sql, $id_user);
}

function get_cart_user($id_user)
{
    $sql = "SELECT * FROM giohang WHERE id_user = ?";
    return pdo_query($sql, $id_user);
}

function get_cart_product($id_product, $id_user)
{
    $sql = "SELECT * FROM giohang WHERE id_product = ? AND id_user = ?";
    return pdo_query_one($sql, $id_product, $id_user);
}

function get_count_cart($id_user)
{
    $sql = "SELECT SUM(soluong) AS soluong_cart FROM giohang WHERE id_user = ?";
    return pdo_query_one($sql, $id_user);
}

function get_sum_cart($id_user)
{
    $sql = "SELECT SUM(thanhtien) AS tong_cart FROM giohang WHERE id_user = ?";
    return pdo_query_one($sql, $id_user);
}
