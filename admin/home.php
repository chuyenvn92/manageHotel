<div class="container">
<h3>Trang quản trị. Xin chào: <?php echo $_SESSION['ADMIN_UNAME'];?></h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Phòng
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      Khách sạn có nhiều phòng khác nhau được phân loại theo từng loại.
      Mỗi phòng thuộc loại cụ thể và có số lượng người lớn và trẻ em tối đa có thể ở. <a href="mod_room/index.php"> Tới quản lí phòng</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Loại phòng
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Khách sạn có rất nhiều loại phòng khác nhau, mỗi loại đều có những đặc điểm riêng <a href="mod_accomodation/index.php">Tới quản lí loại phòng</a></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Lịch đặt phòng
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
          <a href="mod_reservation/index.php">Tới quản lí đặt phòng</a>
       </div>
    </div>
  </div>
 
   <?php if($_SESSION['ADMIN_UROLE']=="Administrator"){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
          Quản lí tài khoản
        </a>
      </h4>
    </div>
    <div id="collapsesix" class="panel-collapse collapse">
      <div class="panel-body">
		    <a href="mod_users/index.php">Tới quản trị người dùng</a>
      </div>
    </div>
  </div>
 <?php } ?>
</div>
</div>