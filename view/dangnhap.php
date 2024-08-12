<section>
    <div id="login">
        <h3 class="login-title">Đăng Nhập Hệ Thống</h3>
        
        <?php if ($is_user_logged_in): ?>
            <p>Bạn Đã Đăng Nhập!</p>
        <?php else: ?>
            <form action="index.php?pg=dangnhap" method="POST" id="form-login">
                <div class="form-group-login">
                    <input type="text" name="username" id="username" class="email-ip" placeholder="Tên đăng nhập " required />
                </div>
                <div class="form-group-login">
                    <input type="password" name="password" id="password" placeholder="Mật khẩu " required />
                    <i class="far fa-eye eye" id="togglePassword"></i>
                    <i class="far fa-eye-slash eye eye-none" id="togglePasswordHidden"></i>
                </div>
                <?php
                    if($checkMK==1){
                        echo $saimatkhau;
                    }
                    if($checkMK==2){
                        echo $saitaikhoan;
                    }
                ?>
                <a href="index.php?pg=forgot_password" style="margin-left:52px; color:#000">Quên Mật Khẩu?</a><br><br>
                <p>Bạn Chưa Có Tài Khoản? <a href="index.php?pg=dangky" style="color:blue">Đăng Ký</a></p><br>
                <div class="btn-login pt-1">
                    <button type="submit">Đăng Nhập</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</section>

<script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const eyeIcon = this;
    // Toggle the input type and icon
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  });
</script>
