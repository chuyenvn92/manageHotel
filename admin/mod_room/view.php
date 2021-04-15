

<?php

$_SESSION['id']=$_GET['id'];
$mydb->setQuery("SELECT *,typeName FROM room rm, roomtype rt WHERE rm.typeID = rt.typeID and roomNo=".$_SESSION['id']);
$cur = $mydb->loadSingleResult();

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Chi tiết phòng</h3></caption>
		<tr>
		<td width="80"><img src="<?php echo $cur->roomImage; ?>" width="300" height="300" title="<?php echo $roomName; ?>"/></td>
		<td align="left" align="left"><p><strong>Tên </strong>
		<?php echo ': '.$cur->typename; ?><br/>
		<strong>Mô tả </strong>
		<?php echo ': '.$cur->Desp; ?><br/>
		<strong>Giá </strong>
		<?php echo ': '.$cur->price; ?><br/>
		<strong>Người lớn </strong>
		<?php echo ': '.$cur->Adults; ?><br/>
		<strong>Trẻ em </strong>
		<?php echo ': '.$cur->Children; ?><br/><br/>
		<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >

	</p>
		
		
				</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
