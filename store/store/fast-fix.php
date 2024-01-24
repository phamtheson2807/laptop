<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
     ?>
<!doctype html>
<html lang="en">
  <head>

    <title>Cửa hàng sửa chữa máy tính | Sửa chữa tại nhà</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">

<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->

<div class="w3l-hero-headers-9">
  <div class="css-slider">
    <input id="slide-1" type="radio" name="slides" checked>
    <section class="slide slide-one">
      <div class="container">
        <div class="banner-text">
        <h3 class="">Sửa chữa nhanh<br>
            Nhanh chóng - Thuận tiện</h3>
            <p class="para  text ">"Với dịch vụ sửa chữa nhanh chóng chỉ trong 1 giờ tại cửa hàng máy tính của chúng tôi, bạn sẽ không cần phải lo lắng về thời gian chờ đợi. Đội ngũ kỹ thuật viên chuyên nghiệp của chúng tôi sẽ giúp bạn khắc phục mọi vấn đề kỹ thuật một cách nhanh chóng và hiệu quả, để bạn có thể sử dụng lại máy tính một cách thuận tiện nhất. Hãy đến với chúng tôi để trải nghiệm dịch vụ sửa chữa nhanh chóng và chất lượng!"</p>
            <a href="book-appointment.php" class="btn logo-button top-margin">Đặt lịch ngay!!!</a>
        </div>
      </div>

    </section>
    <input id="slide-2" type="radio" name="slides">
    <section class="slide slide-two">
    <div class="container">
        <div class="banner-text">
          <h3 class="m-3">Thời gian nhanh chóng<br>
          Giá cả phải chăng <br>
            Rẻ - Hợp lý</h3>
            <a href="book-appointment.php" class="btn logo-button top-margin m-3">Đặt lịch ngay!!!</a>
        </div>
      </div>
      <!-- <nav>
        <label for="slide-2" class="prev">&#10094;</label>
        <label for="slide-1" class="next">&#10095;</label>
      </nav> -->
    </section>
    <header>
      <label for="slide-1" id="slide-1"></label>
      <label for="slide-2" id="slide-2"></label>
    </header>
  </div>
</div>
<section class="w3l-recent-work-hobbies" >
    <div class="recent-work ">
        <div class="container">
            <div class="row about-about">
                <?php


$ret=mysqli_query($con,"select * from  tblservices");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-4 col-md-6 col-sm-6 propClone">
                 <img src="admin/images/<?php echo $row['Image']?>" alt="product" height="200" width="400" class="img-responsive about-me">
                    <div class="about-grids ">
                        <hr>
                        <h5 class="para"><?php  echo $row['ServiceName'];?></h5>
                        <p class="para "><?php  echo $row['ServiceDescription'];?> </p>
                        <p class="para" style="color: hotpink;"> Giá:<?php echo $row['Cost']; ?>VNĐ </p>
<button type="button" onclick="addToCart('<?php echo $row['ServiceName']; ?>')">Thêm vào giỏ hàng</button>
<button type="button" onclick="buyNow('<?php echo $row['ServiceName']; ?>', <?php echo $row['Cost']; ?>)">Mua ngay</button>

                    </div>
                </div>
                <br><?php
$cnt=$cnt+1;
}?>

            </div>
        </div>
    </div>
</section>
<section class="w3l-teams-15">
	<div class="team-single-main ">
		<div class="container">

				<div class="column2 image-text">
					<h3 class="team-head ">Tận tình chu đáo, tư vấn nhiệt tình</h3>
					<p class="para  text ">
						Khách hàng khi mang máy đến cửa hàng sẽ được nhân viên đón tiếp và kiểm tra máy. Sau đó, chúng tôi sẽ tư vấn cho bạn các dịch vụ phù hợp với tình trạng của máy.</p>
						<a href="book-appointment.php" class="btn logo-button top-margin mt-4">Đặt lịch sửa chữa</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="w3l-specification-6">
    <div class="specification-layout ">
        <div class="container">
            <div class=" row">
                <div class="col-lg-6 back-image">
                    <img src="assets/images/b1.jpg" alt="product" class="img-responsive ">
                </div>
                <div class="col-lg-6 about-right-faq align-self">
                    <h3 class="title-big"><a href="about.html">Dịch vụ của chúng tôi</a></h3>
                    <p class="mt-3 para">Chúng tôi cung cấp dịch vụ sửa chữa, vệ sinh với giá vô cùng phải chăng. Đảm bảo chất lượng vệ sinh cho khách hàng.</p>
                        <div class="hair-cut">
                            <div >
                    <ul class="w3l-right-book">
                                            <li><span class="" aria-hidden="true"></span><a href="about.html">Thay Ram</a></li>
                                            <li><span class="" aria-hidden="true"></span><a href="about.html">Nâng cấp ổ cứng</a></li>
                                            <li><span class="" aria-hidden="true"></span><a href="about.html">Bảo trì máy</a></li>
                                            <li><span class="" aria-hidden="true"></span><a href="about.html">Thay bàn phím</a></li>
                                            <li><span class="" aria-hidden="true"></span><a href="about.html">Thay màn hình</a></li>
                                        </ul>
                                    </div>
                                        <div  class="image-right">
                                            <ul class="w3l-right-book">
                                                <li><span class="" aria-hidden="true"></span><a href="about.html">Vệ sinh mạch</a></li>
                                                <li><span class="" aria-hidden="true"></span><a href="about.html">Cài win bản quyền</a></li>
                                                <li><span class="" aria-hidden="true"></span><a href="about.html">Thay ram cũ</a></li>
                                                <li><span class="" aria-hidden="true"></span><a href="about.html">Vệ sinh bàn phím</a></li>
                                                <li><span class="" aria-hidden="true"></span><a href="about.html">Mua mới đổi cũ</a></li>
                                            </ul>
                </div>
            </div>
        </div>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="">^</span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }

  function addToCart(serviceName) {
  var cart = JSON.parse(localStorage.getItem('cart')) || [];
  var index = cart.findIndex(function (item) {
    return item.serviceName === serviceName;
  });

  if (index !== -1) {
    cart[index].quantity++;
  } else {
    cart.push({ serviceName: serviceName, quantity: 1 });
  }

  localStorage.setItem('cart', JSON.stringify(cart));
  updateCartDisplay();

  console.log('Đã thêm "' + serviceName + '" vào giỏ hàng');
}

function updateCartDisplay() {
  var cart = JSON.parse(localStorage.getItem('cart')) || [];
  var cartCount = cart.reduce(function (acc, item) {
    return acc + item.quantity;
  }, 0);

  document.getElementById('cartCount').textContent = cartCount;
}
function buyNow(serviceName, cost) {
        selectedProduct = {
            serviceName: serviceName,
            cost: cost
        };

        // Redirect to the checkout page
        window.location.href = 'checkout.php';
    }
    
    // Function to display the selected product and its price on the checkout page
    function displaySelectedProduct() {
        if (selectedProduct) {
            var checkoutContent = document.getElementById('checkoutContent');
            checkoutContent.innerHTML = '<p> Sản phẩm đã chọn: ' + selectedProduct.serviceName + '</p>';
            checkoutContent.innerHTML += '<p> Giá: ' + selectedProduct.cost + 'VNĐ </p>';
        }
    }
</script>
<!-- /move top -->
</body>

</html>
