<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
          <a href="index.html">
            <h1>Quản lý cửa hàng sửa chữa máy tính</h1>
            <span>Admin</span>
          </a>
        </div>
        <!--//logo-->


        <div class="clearfix"> </div>
      </div>
      <div class="header-right">
        <div class="profile_details_left"><!--notifications of menu start -->
          <ul class="nofitications-dropdown">
            <?php
$ret1=mysqli_query($con,"select tbluser.FirstName,tbluser.LastName,tblbook.ID as bid,tblbook.AptNumber from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.Status is null");
$num=mysqli_num_rows($ret1);

?>
            <li class="dropdown head-dpdn">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $num;?></span></a>

              <ul class="dropdown-menu">
                <li>
                  <div class="notification_header">
                    <h3>Bạn có <?php echo $num;?>Thông báo mới</h3>
                  </div>
                </li>
                <li>

                   <div class="notification_desc">
                     <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                 <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['bid'];?>">Một lịch hẹn mới được gửi từ <?php echo $result['FirstName'];?> <?php echo $result['LastName'];?> (<?php echo $result['AptNumber'];?>)</a>
                 <hr />
<?php }} else {?>
    <a class="dropdown-item" href="all-appointment.php">Không nhận được cuộc hẹn nào</a>
        <?php } ?>

                  </div>
                  <div class="clearfix"></div>
                 </a></li>


                 <li>
                  <div class="notification_bottom">
                    <a href="new-appointment.php">Xem tất cả thông báo</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
          <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">
        <?php
$adid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img">
                  <span class="prfil-img"><img src="/admin/images/admin.png alt="" width="50" height="50"> </span>
                  <div class="user-name">
                    <p><?php echo $name; ?></p>
                    <span>Admin</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>
                </div>
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password.php"><i class="fa fa-cog"></i> Cài đặt</a> </li>
                <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Hồ sơ</a> </li>
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Đăng xuất</a> </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
