
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Accomodation();
$result = $rm->single_accomodation($_SESSION['id']);

?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

	<fieldset>
		<legend>Cập nhật loại phòng</legend>											         
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ACCOMODATION">Tên:</label>

              <div class="col-md-8">
              		<input name="ACCOMID" type="hidden" value="<?php echo $result->ACCOMID; ?>">
                 <input class="form-control input-sm" id="ACCOMODATION" name="ACCOMODATION" placeholder=
									  "Tên loại phòng" type="text" value="<?php echo $result->ACCOMODATION; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ACCOMDESC">Mô tả:</label>

              <div class="col-md-8">
                   <input class="form-control input-sm" id="ACCOMDESC" name="ACCOMDESC" placeholder=
									  "Mô tả nè" type="text" value="<?php echo $result->ACCOMDESC; ?>">
              </div>
            </div>
          </div>

		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Cập nhật</button>
              </div>
            </div>
          </div>

			
	</fieldset>	


</form>


</div><!--End of container-->
			

<?php unset($_SESSION['id']) ?>