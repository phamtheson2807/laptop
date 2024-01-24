<section class="w3l-header-4 header-sticky">
    <header class="absolute-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
              </button>
              <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">Về chúng tôi</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dịch vụ
                    </a>
                    <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="fast-fix.php">Sửa chữa nhanh</a>
                        <a class="dropdown-item" href="fix-home.php">Sửa chữa tại nhà</a>
                        <a class="dropdown-item" href="fix-store.php">Sửa tại cửa hàng</a>
                        <a class="dropdown-item" href="computer-cleaning.php">Vệ sinh máy tính</a>
                    </div>
                    </li>

                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Liên hệ</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="col-md-6">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa icon-expand fa-bars"></span>
                <span class="fa icon-close fa-times"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav2">
                <ul class="navbar-nav ml-auto">
                <?php if (strlen($_SESSION['bpmsuid']==0)) {?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tài khoản
                    </a>
                    <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdownMenuLink">
                      <?php
                      ?>
                      <a class="dropdown-item" href="admin/index.php">Admin</a>
                      <a class="dropdown-item" href="signup.php">Đăng ký</a>
                      <a class="dropdown-item" href="login.php">Đăng nhập</a>
                    </div>
                  </li>
                  <?php }?>
                  <?php if (strlen($_SESSION['bpmsuid']>0)) {?>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Quản lý lịch hẹn sửa chữa
                    </a>
                    <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdownMenuLink">
                      <?php
                      ?>
                      <a class="dropdown-item" href="book-appointment.php">Đặt lịch sửa chữa</a>
                      <a class="dropdown-item" href="booking-history.php">Lịch sử đặt</a>
                      <a class="dropdown-item" href="invoice-history.php">Lịch sử đơn hàng</a>
                    </div>
                  </li>
                    <!-- Thêm giỏ hàng vào đây -->
                   
                    <li class="nav-item dropdown">
  <div class="dropdown" style="cursor:pointer">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
      <span>Giỏ hàng</span>
      <div class="badge qty" id="cartCount">0</div>
    </a>
    <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdownMenuLink">
      <div class="cart-list" id="cart_product">
        <!-- Cart items go here -->
      </div>
      <div class="cart-btns">
        <a class="dropdown-item" href="cart.php">Sửa</a>
      </div>
    </div>
  </div>
</li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Tài khoản
      </a>
      <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="profile.php">Hồ sơ</a>
        <a class="dropdown-item" href="change-password.php">Đổi mật khẩu</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Đăng xuất</a>
    </li>
  <?php }?>
</ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
  </section>
  <script>
  function updateCartCount() {
    // Get the cart from localStorage
    var cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Find the cart count badge element
    var cartCountBadge = document.getElementById('cartCount');

    // Update the cart count
    cartCountBadge.textContent = cart.reduce((total, item) => total + item.quantity, 0);
  }

  // Update the cart count when the page loads
  window.onload = updateCartCount;
</script>