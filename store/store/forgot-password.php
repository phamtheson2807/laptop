<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
$password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");

    $ret=mysqli_num_rows($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      $query1=mysqli_query($con,"update tbluser set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";

   }

    }
    else{

      echo "<script>alert('Thông tin không hợp lệ. Hãy thử lại');</script>";
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>


    <title>Cửa hàng sữa chữa máy tính | Quên mật khẩu</title>

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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}

</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">
            <div class="main-titles-head text-center">
            <h3 class="header-name ">

 Quên mật khẩu
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Trang chủ <span class="" aria-hidden="true">></span></a> <p></li>
    <li class="active ">
    Quên mật khẩu</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details">
                    <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class=" text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Gọi ngay</h6>
                            <p class="para"><a href="tel:+44 99 555 42">+<?php  echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class=" text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Email</h6>
                            <p class="para"><a href="mailto:example@mail.com" class="mail"><?php  echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class=" text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Địa chỉ</h6>
                            <p class="para"> <?php  echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Thời gian mở cửa</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <form method="post">
                        <div>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email của bạn" required="true">

                        </div>
                        <div style="padding-top: 30px;">
                          <input type="text" class="form-control" name="contactno" placeholder="Số điện thoại" required="true" pattern="[0-9]+">

                        </div>
                        <div style="padding-top: 30px;">
                          <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Mật khẩu mới">

                        </div>
                        <div style="padding-top: 30px;">
                           <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Xác nhận mật khẩu">

                        </div>
                        <div class="twice-two" style="padding-top: 30px;">
                          <a class="link--gray" style="color: blue;" href="login.php">Đăng nhập</a>

                        </div>
                        <button type="submit" class="btn btn-contact" name="submit">Đặt l</button>
                    </form>
                </div>
    </div>

    </div></div>
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
</script>
<!-- /move top -->
</body>

</html>