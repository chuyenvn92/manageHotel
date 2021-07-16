<?php

if (!isset($_SESSION['dragonhouse_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}


// if (isset($_POST['profileCheck'])) {
//   # code...
//     unset($_SESSION['pay']);
//    unset($_SESSION['dragonhouse_cart']);
// }

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

<div class="container"> 

    <div class="col-xs-12 col-sm-11">
      <!--<div class="jumbotron">-->
        <div class="">
           

          <td valign="top" class="body" style="padding-bottom:10px;">

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
         Ông/Bà <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
           Gửi Ông/Bà. <?php echo $last;?>,<br/><br/>
           Lời chào từ Kim Hotel<br/><br/>
           Vui lòng kiểm tra chi tiết đặt phòng::<br/><br/>
           <strong>Tên khách hàng:</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover">
              <thead>
                <tr  bgcolor="#999999">
                  <!-- <th width="10">#</th> -->
                  <th align="center" width="120">Loại phòng</th>
                  <th align="center" width="120">Check In</th>
                  <th align="center" width="120">Check Out</th>
                  <th align="center" width="120">Số đêm</th>
                  <th  width="120">Giá</th>
                  <th align="center" width="120">Phòng</th>
                  <th align="center" width="90">Giá tiền</th> 
                </tr> 
              </thead>
          <tbody>
          
            <?php




             // $arival   = $_SESSION['from']; 
             //  $departure = $_SESSION['to']; 
              // $days = dateDiff($arival,$departure);
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
                echo '<td>'. $result->PRICE.'VNĐ</td>';
                echo '<td >1</td>';
                echo '<td >'. $_SESSION['dragonhouse_cart'][$i]['dragonhouseroomprice'].'VNĐ</td>'; 
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
              <h5><b> <?php echo  $payable= $days*$result->PRICE; ?></b></h5>
                           
              </td>
            </tr>
            <!--   <tr>
            <td colspan="4"></td><td colspan="5">
                  <div class="col-xs-12 col-sm-12" align="right">
                      <button type="submit" class="btn btn-primary" align="right" name="btnlogin">Payout</button>
                  </div>

            </td>
            </tr> -->

          </tfoot>  
        </table>

    <?php   
     // unset($_SESSION['pay']);
     //    unset($_SESSION['dragonhouse_cart']);
        ?>
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
<br/><br/><br/>
</span>
<div id="divButtons" name="divButtons">
<a href="print_reservation.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<!-- <input type="button" value="Print" onclick="tablePrint();" class="btn btn-primary"> -->
</div>
              </form>
 
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>