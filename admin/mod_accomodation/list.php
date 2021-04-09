<div class="container">
	<?php
		check_message();
			
		?>
		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
			<h3 align="left">Danh sách loại phòng</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-striped" cellspacing="0">
				  <thead>
				  	<tr >
				  		<th>ID</th>
				  		<th>  
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">Loại phòng</th>
				  		<th>Mô tả</th>	 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$accom = new Accomodation();
				  		$cur = $accom->listOfaccomodation();
						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td width="5%" align="center">'.$result->ACCOMID.'</td>';
				  		echo '<td width="20%" align="left"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ACCOMID. '"/>
				  				<a  href="index.php?view=edit&id='.$result->ACCOMID.'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=view&id='.$result->ACCOMID.'">' . ' '.$result->ACCOMODATION.'</a></td>';
				  		echo '<td>'. $result->ACCOMDESC.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				
				</table>
				<div>
				  <a href="index.php?view=add" class="btn btn-primary">Thêm mới</a>
				  <button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-trash"></span>Xoá</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  	<!-- </div> -->
	  	<!--End of Main Panel-->

</div><!--End of container-->

