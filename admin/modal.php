<!--Modal Log-out --> 

  <div class="modal fade" id="logout" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Bạn chắc chắn muốn đăng xuất chứ ????</div>
		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>Đóng</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i>Đăng xuất</a>
		  </div>
		</div> 
    </div>
</div>      
                            
<!--Logout end -->       

<!--Modal Reservation --> 

  <div class="modal fade"  id="reservation" tabindex="-1">

	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Chi tiết đặt phòng</div>
		  <form  method="post" action="processreservation.php?action=delete">

<?php
//$mydb->setQuery("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id");
/*$mydb->setQuery("SELECT * , roomName, firstname, lastname
FROM reservation re, room ro, guest gu, roomtype rt
WHERE re.roomNo = ro.roomNo
AND ro.`typeID` = rt.`typeID` 
AND re.guest_id = gu.guest_id AND reservation_id=".$_GET['res_id']);
$cur = $mydb->loadSingleResult();
*/				  			
echo $resid;
 //echo $_GET['res_id'];


?>
<p>	
<strong>Xác nhận</strong>:<br/>
<strong>Tên</strong><br/>
<strong>Ngày đến</strong><br/>
<strong>Ngày đi</strong><br/>
<strong>Phòng</strong><br/>
<strong>Loại phòng</strong><br/>
<strong>Số đêm</strong><br/>
<strong>Trạng thái</strong><br/>
<strong>Lựa chọn</strong><br/>
</p>



</form>


		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Đóng</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Đăng xuất</a>
		  </div>
		</div> 
    </div>
</div>      
                            
<!--reseionrvat end -->   

</tbody>
</table>

</form>
