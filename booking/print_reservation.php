<!DOCTYPE html>
<?php require_once("../includes/initialize.php"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>style.css">  
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/responsive.css">    

<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/bootstrap.css">  

<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/css/font-awesome.min.css"> 


<!-- DataTables CSS -->
<!-- <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet"> -->
 
 <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 <link href="<?php echo WEB_ROOT; ?>css/datepicker.css" rel="stylesheet" media="screen">

 <link href="<?php echo WEB_ROOT; ?>css/galery.css" rel="stylesheet" media="screen">
</head>
<body onload="window.print();">


<?php

if (!isset($_SESSION['dragonhouse_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}


if (isset($_POST['profileCheck'])) {
  # code...
    unset($_SESSION['pay']);
   unset($_SESSION['dragonhouse_cart']);
}

/*$guestid =$_GET['guestid'];
$guest = new Guest();
$result=$guest->single_guest($guestid);*/

  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  // $country =$_SESSION['country'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  // $email = $_SESSION['email'];
  // $password =$_SESSION['pass'];
  $stat = $_SESSION['pending'];

?>


<div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  >Chi tiết đặt phòng
                 
            </h1> 
       </div> 
  </div>

    <form action="index.php?view=payment" method="post"  name="" >
         
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Ông/Bà <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
           Gửi Ông/Bà, <?php echo $last;?>,<br/><br/>
           Lời chào từ Kim Hotel<br/><br/>
           Vui lòng kiểm tra chi tiết đặt phòng:<br/><br/>
           <strong>Tên khách hàng:</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover" style="font-size:11px">
                  <thead>
              <tr  bgcolor="#999999">
              <!-- <th width="10">#</th> -->
              <th align="center" width="120">Loại phòng</th>
               <th align="center" width="120">Check In</th>
                <th align="center" width="120">Check Out</th>
                 <th align="center" width="120">Số đêm</th>
              <th  width="120">Giá</th>
               <th align="center" width="120">Phòng</th>
              <th align="center" width="90">Số tiền</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
          
            <?php




             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
              $count_cart = count($_SESSION['dragonhouse_cart']);

                for ($i=0; $i < $count_cart  ; $i++) {    
              $mydb->setQuery("SELECT * FROM `tblroom` r, `tblaccomodation` a WHERE  r.`ACCOMID`=a.`ACCOMID` AND `ROOMID` =". $_SESSION['dragonhouse_cart'][$i]['dragonhouseroomid']);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<tr>'; 
              // echo '<td></td>';
              echo '<td>'. $result->ROOM.' '. $result->ACCOMODATION.'</td>';
              echo '<td>'.$_SESSION['dragonhouse_cart'][$i]['dragonhousecheckin'].'</td>';
              echo '<td>'.$_SESSION['dragonhouse_cart'][$i]['dragonhousecheckout'].'</td>';
              echo '<td>'.$_SESSION['dragonhouse_cart'][$i]['dragonhouseday'].'</td>';
              echo '<td> &euro;'. $result->PRICE.'</td>';
               echo '<td >1</td>';
                echo '<td >&euro;'. $_SESSION['dragonhouse_cart'][$i]['dragonhouseroomprice'].'</td>';
        

              
              echo '</tr>';
            } 


          }
           $payable= $result->PRICE *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
               <tr>
                   <td colspan="5"></td><td align="right"><h5><b>Tổng hoá đơn: </b></h5>
                   <td align="left">
                  <h5><b> <?php echo '&euro;' . $payable= $days*$result->PRICE; ?></b></h5>
                                   
                  </td>
          </tr>
      
         
          </tfoot>  
        </table>

    
<p>Chúng tôi rất háo hức mong đợi sự xuất hiện của bạn và muốn thông báo cho bạn những điều sau để giúp bạn lập kế hoạch chuyến đi. Số đặt chỗ của bạn là  <b><?php echo $_SESSION['confirmation']?>:</b><br/><br/>Nếu có thắc mắc về việc đặt chỗ của bạn, đại diện dịch vụ khách hàng sẽ liên hệ với bạn. Nếu không, hãy phòng của bạn đã được xác nhận.</p>
<ul>
 <li>Giá phòng là &euro; 500.000 cho bốn giờ đầu tiên và &euro; 100.000 cho những giờ tiếp theo.</li>
 <li>Không vật nuôi.</li>
 <li>Được phép mang đồ ăn từ bên ngoài vào khách sạn.</li>
 <li>Thời gian nhận phòng là 13pm và thời gian trả phòng là 12pm.</li>
 <li>Khách hàng đến nhận phòng trước 13pm sẽ được nhận phòng luôn nếu phòng trống.</li>
 <li>WIFI miễn phí .</li>
 <li>Giá phòng đã bao gồm thuế và phí dịch vụ.</li>
 <li>Giá có thể thay đổi mà không báo trước.</li>
 <li>Thông báo hủy đặt phòng phải được thực hiện ít nhất 10 ngày trước khi đến để được hoàn lại tiền đặt cọc. Nếu hủy trong vòng 10 ngày sẽ bị mất toàn bộ tiền đặt cọc.</li>
 <li>Chúng tôi phục vụ Bữa sáng, Bữa trưa và Bữa tối theo yêu cầu với thời gian báo trước 2 giờ.</li><br>
<strong>Tôi đồng ý xuất trình giấy tờ sau khi nhận phòng:</strong><br/>
 <li>Bản sao của hoá đơn.</li>
 <li>Authorization letter issued by BDO payer for guest/s whose transactions were paid for in his/ her behalf.</li>
 </ul>
 Nếu bạn có bất kỳ câu hỏi nào, vui lòng gửi email theo địa chỉ 
kimhotelhanoi@gmail.com hoặc gọi 024 3255 5678
<br/><br/>
Cảm ơn vì đã lựa chọn Kim Hotel
<br/><br/>
Trân trọng,<br/><br/>
Kim Hotel 

 
</form>
</body>
</html>