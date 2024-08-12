<?php
require_once 'pdo.php';



//cập nhật mật khẩu người dùng
function update_password($id, $newpass_hash) {
    $sql = "UPDATE user SET id =?, password = ? WHERE id=" . $id;
    return pdo_execute($sql, $id, $newpass_hash);
}
// cập nhật thông tin người dùng
function update_user($id, $hoten, $sdt, $diachi, $email) {
    $sql = "UPDATE user SET id=?, hoten=?, dienthoai=? ,diachi=? ,email=? WHERE id=" . $id;
    return pdo_execute($sql, $id, $hoten, $sdt, $diachi, $email);
}
// lấy tất cả người dùng
function get_all_users($new) {
    $sql = "SELECT * FROM user";
    if ($new == 1) {
        $sql .= " ORDER BY id DESC LIMIT 7";
    }
    return pdo_query($sql);
}
// lấy 1 người dùng theo id
function get_user_by_id($user_id) {
    $sql = "SELECT * FROM user WHERE id = ?";
    return pdo_query_one($sql, $user_id);
}
if (!function_exists('is_user_logged_in')) {
    function is_user_logged_in() {
        return isset($_SESSION['user_id']);
    }
}
// xóa 1 người dùng theo id
function delete_user_by_id($user_id) {
    $sql = "DELETE FROM user WHERE id = ?";
    return pdo_execute($sql, $user_id);
}

// cập nhật role cho người dùng
function update_user_role($id, $new_role) {
    $sql = "UPDATE user SET role = ? WHERE id = ?";
    return pdo_execute($sql, $new_role, $id);
}
// cập nhật trạng thái cho người dùng có thể thành admin, người dùng hoặc bị chặn
function update_user_status($id, $new_status) {
    $sql = "UPDATE user SET status = ? WHERE id = ?";
    return pdo_execute($sql, $new_status, $id);
}

// hiển thị thông tin người dùng
function show_user($dsuser) {
    $html_dsuser = '';
    $i = 0;
    foreach ($dsuser as $user) {
        $i++;
        $html_dsuser .= ' <tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($user['hinh']) . '</td>
                            <td>' . htmlspecialchars($user['hoten']) . '</td>
                            <td>' . get_role_name($user['role']) . '</td>
                            <td>' . htmlspecialchars($user['username']) . '</td>
                            <td>' . $user['dienthoai'] . '</td>
                            <td>' . htmlspecialchars($user['email']) . '</td>
                            <td>' . htmlspecialchars($user['diachi']) . '</td>
                            <td>
                                <a href="index.php?pg=user_edit&id=' . $user['id'] . '" class="btn btn-warning"> Sửa</a>
                                <a href="index.php?pg=user_delete&id=' . $user['id'] . '" class="btn btn-danger"> xóa</a>
                            </td>
                        </tr>';
    }
    return $html_dsuser;
}

// danh sách role
function get_role_name($role) {
    switch ($role) {
        case 0:
            return 'User';
        case 1:
            return 'Admin';
        case 2:
            return 'Block';
        default:
            return 'Unknown';
    }
}

// danh sách trạng thái
function get_status_name($status) {
    switch ($status) {
        case 0:
            return 'Active';
        case 1:
            return 'Blocked';
        default:
            return 'Unknown';
    }
}

// hiển thị thông tin người dùng mới
function show_user_new($dsuser) {
    $html_dsuser = '';

    foreach ($dsuser as $user) {
        $html_dsuser .= ' <tr>
                            <td>' . $user['id'] . '</td>
                            <td>' . $user['username'] . '</td>
                        </tr>';
    }
    return $html_dsuser;
}

function register_user($hoten, $email, $dienthoai, $username, $password, $role = 0) {
    // Kiểm tra mật khẩu có ít nhất 6 ký tự, bao gồm ít nhất một số, một chữ cái in hoa và một ký tự đặc biệt
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*(),.?":{}|<>]{6,}$/', $password)) {
        return "Mật khẩu phải có ít nhất 6 ký tự, bao gồm ít nhất một số, một chữ cái in hoa và một ký tự đặc biệt";
    }

    // Kiểm tra tên đăng nhập có ký tự đặc biệt
    if (!preg_match('/^[0-9A-Za-z!@#$%^&*(),.?":{}|<>]+$/', $username)) {
        return "Tên đăng nhập không hợp lệ";
    }

    // Kiểm tra tên đăng nhập đã tồn tại chưa
    if (username_exists($username)) {
        return "Tên đăng nhập đã tồn tại";
    }

    // Kiểm tra email có đúng định dạng hay không
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Địa chỉ email không hợp lệ";
    }

    // Kiểm tra số điện thoại có đúng định dạng hay không
    if (!preg_match('/^[0-9]{10,11}$/', $dienthoai)) {
        return "Số điện thoại không hợp lệ";
    }

    // Hash mật khẩu
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert vào CSDL
    $sql = "INSERT INTO user (hoten, email, dienthoai, username, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    try {
        pdo_execute($sql, $hoten, $email, $dienthoai, $username, $hashed_password, $role);
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// đăng nhập
function login_user($username, $password) {
    $user = get_user_by_username($username);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Thêm dòng này nếu chưa có
        session_regenerate_id(true);
        return true;
    } else {
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }
        if ($_SESSION['login_attempts'] >= 3) {
            // Khoá tài khoản hoặc thực hiện các biện pháp bảo mật khác
            // ...
        }
        return false;
    }
}

// lấy người dùng theo tên
function get_user_by_username($username) {
    $sql = "SELECT * FROM user WHERE username = ?";
    return pdo_query_one($sql, $username);
}
// kiểm tra tên người dùng có tồn tại trong csdl hay không 
function username_exists($username) {
    $sql = "SELECT COUNT(*) FROM user WHERE username = ?";
    $count = pdo_query_value($sql, $username);
    return $count > 0;
}

// lấy toàn bộ số lượng người dùng 
function get_soluong_user() {
    $sql = "SELECT COUNT(id) FROM user WHERE 1";
    $count = pdo_query_value($sql);
    return $count;
}
?>
