<section>
  <div id="login">
    <h3 class="login-title">Đăng Ký Hệ Thống</h3>

    <form action="index.php?pg=dangky" method="POST" id="form-login">
      <!-- Các trường nhập liệu cho đăng ký -->
      <div class="form-group-login">
        <input type="text" name="hoten" id="hoten" class="email-ip" placeholder="Họ và tên " required />
      </div>
      <div class="form-group-login">
        <input type="email" name="email" id="email" class="email-ip" placeholder="Email " required />
      </div>
      <div class="form-group-login">
        <input type="tel" name="dienthoai" id="dienthoai" class="email-ip" placeholder="Số Điện Thoại " required />
      </div>
      <div class="form-group-login">
        <input type="text" name="username" id="username" class="email-ip" placeholder="Tên Đăng Nhập " required />
      </div>
      <div class="form-group-login">
        <input type="password" name="password" id="password" placeholder="Mật khẩu" required />
        <i class="far fa-eye eye" id="togglePassword"></i>
        <i class="far fa-eye-slash eye eye-none" id="togglePasswordHidden"></i>
      </div>
      <p>Bạn đã có tài khoản? <a href="index.php?pg=dangnhap" style="color:blue">Đăng Nhập</a></p><br>
      <div class="btn-login pt-1">
        <button type="submit">Đăng Ký</button>
      </div>
    </form>
  </div>
</section>
<script>
  document.getElementById('togglePassword').addEventListener('click', function() {
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