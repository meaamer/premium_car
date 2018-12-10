
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Booking Details</h3>
              <!--<button class="btn btn-primary pull-right">Assign</button>-->
              <?php
              $asignbtn="";
              if(rtrim($details['vendor_id'])==0){
        $asignbtn='<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$booking_id.')" >Assign</button>';
      
      }else if (rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==0) {
      $asignbtn='<button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$booking_id.')" >UnAssign</button>';
  
      } else if(rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==3){
        $asignbtn='<button type="button"  class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-close" onclick=" PaybleAmount('.$rates['transfer_rate'].','.$totaldebit['TotalDebit'].'),GetDetails();" >Close Booking</button>'; 
      }else if(rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==4){
        $asignbtn='<button type="button"  class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-close" onclick="GetDetails();" >Booking Close</button>';}

  ?>
			  <?= $asignbtn;?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">1</th>
                  <th style="width: 170px">Booking ID</th>
                  <td id="booking_id" ><?php echo $booking_id;?></td>
                  
                </tr>
                
                <tr>
                  <th style="width: 20px">2</th>
                  <th style="width: 170px">Cab Name</th>
                  <td><?php echo $details['cab_name'];?></td>
                  <td id="cab_id" style="visibility: hidden" ><?php echo $details['cab_id'];?></td>
                  <td id="type" style="visibility: hidden" ><?php echo $details['type'];?></td>
                  <td style="visibility: hidden" id="advance_id"><?php echo $details['advance_id'];?></td>
                  
                </tr>
                
                 <tr>
                  <th style="width: 20px">3</th>
                  <th style="width: 170px">Company Name</th>
                  <td><?php echo $details['company_name'];?></td>
                  <td class="vendor_id" style="visibility: hidden;" ><?php echo $details['vendor_id'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">4</th>
                  <th style="width: 170px">Traveller Name</th>
                  <td><?php echo $details['first_name'];?> <?php echo $details['last_name'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">5</th>
                  <th style="width: 170px">Booking Type</th>
                  <td><?php echo $details['type'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">6</th>
                  <th style="width: 170px">City</th>
                  <td id="city" ><?php echo $details['from_city'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">7</th>
                  <th style="width: 170px">Mobile No</th>
                  <td><?php echo $details['mobile_number'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">8</th>
                  <th style="width: 170px">Alternate No</th>
                  <td><?php echo $details['alternate_number'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">8</th>
                  <th style="width: 170px">Date</th>
                  <td><?php echo $details['traveling_date'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">9</th>
                  <th style="width: 170px">Time</th>
                  <td><?php echo $details['traveling_time'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">10</th>
                  <th style="width: 170px">Pickup Address</th>
                  <td><?php echo $details['pickup_address'];?></td>
                  
                </tr>
                <tr>
                  <th style="width: 20px">10</th>
                  <th style="width: 170px">Drop Address</th>
                  <td><?php echo $details['drop_point'];?></td>
                  
                </tr>
                
                
              </table>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 
 
 
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Assign Vendor</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            
            <th>Vendor Name</th>
            <th>Vendor City</th>
            <th>Company Transfer Charges</th>
            <th>Vendor Transfer Charges</th>
            <th>Assign</th>
          </tr>
          <tbody id="vendor_list">
            
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
       
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->   
 
 
   
<!--=======Close Booking Modal==========--> 
 <div class="modal fade" id="modal-close">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Close Booking</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            <th>For</th>
            <th>Assinged To</th>
            <th>Cab</th>
            <th colspan="2">City</th>
            <th>Driver Name</th>
            <th>Number</th>
            <th>Cab No</th>
            
            
          </tr>
          <tbody id="">
            <td><?= $details['company_name'];?></td>   
            <td><?= $details['vendor_name'];?></td>   
            <td ><?= $details['cab_name'];?></td>   
            <td colspan="2"><?= $details['from_city'];?></td>
            <td><?= $details['driver_name'];?></td>
            <td><?= $details['driver_contact_number'];?></td>
            <td><?= $details['cab_number'];?></td>



            
          </tbody>
          <tr>
            <th>Inital Opening Kms</th>
            <th>Final Closing Kms</th>
            
            <th>Total Km</th>
            <th>Other Charges</th>
            <th>Advance Amount</th>
            <th>Reason</th>
            <th>Balance Amount</th>
            <th>Pay</th>
            <th>Update</th>
          
          </tr>
          <tbody >
            <td>
              <input type="number" class="form-control col-lg-1" name="opening_km" id="opening_km"  value="<?= $details['opening_km'];?>" />
      </td>
      <td>
              <input type="number" class="form-control col-lg-1" name="closing_km" id="closing_km"  value="<?= $details['closing_km'];?>" />
      </td>
     
      <td>
              <input type="number" class="form-control col-lg-1" name="total_km" id="total_km"  value="<?= $details['totat_kilometer'];?>" />
      </td>
      <td>
              <input type="number" class="form-control col-lg-1" name="other_charges" id="other_charges"  value="<?= $details['other_charges'];?>" />
      </td>

      <td>
              <input type="number" class="form-control col-lg-1" name="advance_amount" id="advance_amount"  value="<?= $details['credit'];?>" />
      </td>

      <td>
              <input type="text" class="form-control col-lg-1" name="reason" id="reason"  value="<?= $details['reason'];?>" />
      </td>

       <td>
              <input type="text" class="form-control col-lg-1 balance_amount" name="balance_amount" id="balance_amount">
              <span style="display:none; " class="balance2"></span>
      </td>
      <td>
              <input type="text" class="form-control col-lg-1 pay_amount" name="pay_amount" id="pay_amount" onkeyup="CalBalance();">
      </td>
      
      <td>
        <a onClick="UpdateTransfer(<?php echo $booking_id; ?>)"> <li class="fa fa-edit" ></li> </a>
      </td>
               
          </tbody>
         
          
        </table>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Dismiss</button>
        <button type="button" onclick="Approve(<?= $booking_id?>);" class="btn btn-success pull-right" data-dismiss="modal">Close Booking</button>
       
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
 
 
 
 
  <script type="text/javascript">
//show total balace aomunt
function PaybleAmount(rate,debit) {
   
    var   total_km=$('#total_km').val();
    var   other_charges =$('#other_charges').val();
    
    var   advance_amount = $('#advance_amount').val();

      var basic = parseInt(total_km)*rate;
      var basic2 = parseInt(other_charges)+parseInt(basic);
      var final_amount1 =basic2 -  advance_amount;
     var final_amount = final_amount1-debit;
        $("#balance_amount").val(final_amount);
        $(".balance2").html(final_amount);
        
}

function CalBalance(){


   balance=$('.balance2').html();
   debit=$('.pay_amount').val();
    var final_amount = parseInt(balance)-parseInt(debit);
   $(".balance_amount").val(final_amount);
  


}


function UpdateTransfer(id){
    //alert('yaser');
    var reason = $('#reason').val();
    var advance_amount = $('#advance_amount').val();  
    var opening_km = $('#opening_km').val();  
    var closing_km = $('#closing_km').val();  
    var extra_kilometer = $('#extra_kilometer').val();  
    var other_charges = $('#other_charges').val();
    var total_km = $('#total_km').val();
    var pay_amount = $('.pay_amount').val();  
    var vendor_id=$('.vendor_id').html();
    var advance_id = $('#advance_id').html();
   
    
    $.ajax({
        type:"POST",
        url:"<?php echo base_url()?>Booking/UpdateTransfer/"+id,
        data:{opening_km:opening_km,closing_km:closing_km,extra_kilometer:extra_kilometer,other_charges:other_charges,reason:reason,advance_amount,advance_amount,total_km:total_km,pay_amount:pay_amount,vendor_id:vendor_id,advance_id:advance_id},
        success: function(response){
         alertify.alert(response);
          //$('#kms_details').html(response);
       
        },error: function(xhr, status, error) {
      console.log(xhr);
    }
      });
    
    
    
  }



  //select the vendor list to assign the vendor
 function get_vendor(id){
 	var type =$('#type').html();
    var city=$('#city').html();
    var cab=$('#cab_id').html();
    var booking_id=$('#booking_id').html();
    var vendor_id=$('.vendor_id').html();
    
    //alert(type);
    
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Booking/GetVendor",
    data:{city:city,cab:cab,type:type,booking_id:booking_id,vendor_id:vendor_id},
    success: function(response){
      $('#vendor_list').html(response);
       
    },error: function(xhr, status, error) {
      console.log(xhr);
    }
});
}

function Approve(booking_id){
    //alert(booking_id);
  
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>Booking/Approved",
      data:{booking_id:booking_id },
        success:function(result){
        alertify.alert(result);
      }
    })
    
    
  }
  
     
</script>