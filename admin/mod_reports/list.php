 
<div class="wrapper">
  
 
    <form action="" method="POST" >
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>BÁO CÁO KIM HOTEL
            <small class="pull-right">Ngày: <?php echo date('d/m/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <div class="col-sm-2 invoice-col">
        
      </div>
        <div class="col-sm-2 invoice-col">
          Phòng
          <address>
            <input class="form-control" size="20" type="text" value="<?php echo isset($_POST['txtsearch']) ? $_POST['txtsearch'] :'' ?>" Placeholder="Tìm kiếm..." name="txtsearch" id="txtsearch">
        </address>    
      
        </div>
        <div class="col-sm-2 invoice-col">
          Tình trạng
          <address>
            <div class="form-group">
			  <select name="categ" class="form-control">
			  	<option value="Checkedin" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Checkedin' ? 'selected' :'' ?>>Ngày Checkin</option>
        <option value="Checkedout" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Checkedout' ? 'selected' :'' ?>>Ngày Checkedout</option>
        <option value="Arrival" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Arrival' ? 'selected' :'' ?>>Chuyển</option>
        <option value="Pending" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Pending' ? 'selected' :'' ?>>Chờ xử lí</option>
        <option value="Confirmed" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Confirmed' ? 'selected' :'' ?>>Đã xác nhận</option>
			  </select>
		  </div>
          </address>
        </div>

        <!-- /.col -->
        <div class="col-sm-2 invoice-col">
          Ngày Checkedin
          <address> 
		  <div class="form-group">
			 <input class="form-control date start " size="20" type="text" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : date('d-m-Y'); ?>" Placeholder="Ngày checkout" name="start" id="from" data-date="" data-date-format="dd-mm-yyyy" data-link-field="any" data-link-format="dd-mm-YYYY">
		 </div>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-2 invoice-col">
        Ngày Checkedout
        <address>
        <div class="form-group"> 
		      <input class="form-control date end " size="20" type="text" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : date('Y-m-d'); ?>"  name="end" id="end" data-date="" data-date-format="dd-mm-yyyy" data-link-field="any" data-link-format="dd-mm-yyyy">
		  </div>
		  
        </address>

        </div>
        <!-- /.col -->
           <!-- /.col -->
        <div class="col-sm-2 invoice-col"> 
        <br/>
        <address>
        <div class="form-group"> 
        <button type="submit" name="submit" class="btn btn-primary">Xác nhận</button>
		  </div>
		  
        </address>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i><?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>
            <small class="pull-right"> <?php echo (isset($_POST['start'])) ? 'Ngày Checkin :' .$_POST['start'] : ''; ?> <?php echo (isset($_POST['end'])) ? ' Ngày Checkout :' .$_POST['end'] : ''; ?> </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
   

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 col-md-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phòng</th>
              <th>Giá</th>
              <th>Ngày đến</th>
              <th>Ngày đi</th>
              <th>Phí phát sinh</th>
              <th>Tổng</th>
            </tr>
            </thead>
            <tbody>
             <?php
	if(isset($_POST['submit'])){ 

  
	$sql ="SELECT * 
		 FROM  `tblaccomodation` A,  `tblroom` RM,  `tblreservation` RS,  `tblpayment` P,  `tblguest` G
		 WHERE A.`ACCOMID` = RM.`ACCOMID` 
		 AND RM.`ROOMID` = RS.`ROOMID` 
		 AND RS.`CONFIRMATIONCODE` = P.`CONFIRMATIONCODE` 
     AND P.`GUESTID` = G.`GUESTID`  
     AND DATE(`ARRIVAL`) >=  '".$_POST['start']."'
		 AND DATE(`DEPARTURE`) <=  '".$_POST['end']."' AND P.STATUS='" .$_POST['categ']."'
     AND CONCAT( `ACCOMODATION`, ' ', `ROOM` , ' ' , `ROOMDESC`) LIKE '%" .$_POST['txtsearch'] ."%'";
	

  $mydb->setQuery($sql);
	$res = $mydb->executeQuery();
	$row_count = $mydb->num_rows($res);
	$cur = $mydb->loadResultList();


		if ($row_count >0){
      			foreach ($cur as $result) {
                $days =  dateDiff(date($result->ARRIVAL),date($result->DEPARTURE));
                   ?>
                  <tr> 
                    <td><?php echo $result->G_FNAME . ' ' .  $result->G_LNAME;?></td>
                    <td><?php echo $result->ACCOMODATION . ' [' .$result->ROOM.']' ;?></td>
                    <td> &euro; <?php echo $result->PRICE;?></td>
                    <td><?php echo date_format(date_create($result->ARRIVAL),'m/d/Y');?></td>
                    <td><?php echo date_format(date_create($result->DEPARTURE),'m/d/Y');?></td>
                    <td><?php echo ($days==0) ? '1' : $days;?></td>
                    <td> &euro; <?php echo $result->RPRICE;?></td>
                  </tr>
                  <?php 
                    @$tot += $result->RPRICE;
                  } 

                  }
              }
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6"> 
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Tổng cộng: </p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Tổng:</th>
                <td><?php echo @$tot .'VNĐ'; ?></td>
              </tr> 
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</form>
<form action="printreport.php" method="POST" target="_blank">
<input type="hidden" name="txtsearch" value="<?php echo (isset($_POST['txtsearch'])) ? $_POST['txtsearch'] : ''; ?>">
 <input type="hidden" name="categ" value="<?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>">
    <input type="hidden" name="start" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] :  date('Y-m-d'); ?>">
    <input type="hidden" name="end" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] :  date('Y-m-d'); ?>">
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12"> 
       <span class="pull-right"> <button type="submit" class="btn btn-primary"  ><i class="fa fa-print"></i>In hoá đơn</button></span>  
          </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
    <div class="clearfix"></div>
 
</div>
<!-- ./wrapper -->
 