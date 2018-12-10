
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
              <?php
              $asignbtn="";
              if(rtrim($details['vendor_id'])==0){
				$asignbtn='<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$booking_id.')" >Assign</button>';
			
			}else if (rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==0) {
			$asignbtn='<button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$booking_id.')" >UnAssign</button>';
	
			}else if (rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==1) {
			$asignbtn='<button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$booking_id.')" >Accepted/Unassing</button>';
	
			} else if(rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==3){
				$asignbtn='<button type="button"  class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-close" onclick="GetDetails(),PaybleAmount('.$rates['outstation_per_kilometer'].','.$totaldebit['TotalDebit'].');" >Close Booking</button>';	
			}else if(rtrim($details['vendor_id'])!=0 AND rtrim($details['vendor_status'])==4){
				$asignbtn='<button type="button"  class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-details" onclick="GetDetails();" >Booking Close</button>';}

	?>
			  <?= $asignbtn;?>	
              
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
                  <td style="visibility: hidden" id="cab_id" ><?php echo $details['cab_id'];?></td>
                  <td style="visibility: hidden" id="" class="vendor_id"><?php echo $details['vendor_id'];?></td>
                  <td style="visibility: hidden" id="advance_id"><?php echo $details['advance_id'];?></td>
                </tr>
                  
                
                 <tr>
                  <th style="width: 20px">3</th>
                  <th style="width: 170px">Company Name</th>
                  <td><?php echo $details['company_name'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">4</th>
                  <th style="width: 170px">Traveller Name</th>
                  <td><?php echo $details['first_name'];?> <?php echo $details['last_name'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">5</th>
                  <th style="width: 170px">Booking Type</th>
                  <td id="type" ><?php echo $details['type'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">6</th>
                  <th style="width: 170px">From City</th>
                  <td id="city" ><?php echo $details['from_city'];?></td>
                  
                </tr>
                <tr>
                  <th style="width: 20px">7</th>
                  <th style="width: 170px">To City</th>
                  <td><?php echo $details['to_city'];?></td>
                  
                </tr>
                <tr>
                  <th style="width: 20px">8</th>
                  <th style="width: 170px">No Of Days</th>
                  <td><?php echo $details['no_of_days'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">9</th>
                  <th style="width: 170px">Mobile No</th>
                  <td><?php echo $details['mobile_number'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">10</th>
                  <th style="width: 170px">Alternate No</th>
                  <td><?php echo $details['alternate_number'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">11</th>
                  <th style="width: 170px">Date</th>
                  <td><?php echo $details['traveling_date'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">12</th>
                  <th style="width: 170px">Time</th>
                  <td><?php echo $details['traveling_time'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">13</th>
                  <th style="width: 170px">Pickup Address</th>
                  <td><?php echo $details['pickup_address'];?></td>
                  
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
 
<!--Assign Booking Modal --> 
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
            <th>Company Km Rate</th>
            <th>Vendor Km Rate</th>
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
            <th colspan="2">From</th>
            <th>To</th>
            <th>No. of Days</th>
             <th>Driver Name</th>
            <th>Number</th>
            <th>Cab No</th>

          </tr>
          <tbody id="trip_details">
          	<td><?= $details['company_name'];?></td>   
          	<td><?= $details['vendor_name'];?></td>   
          	<td><?= $details['cab_name'];?></td>   
          	<td colspan="2"><?= $details['from_city'];?></td>   
          	<td><?= $details['to_city'];?></td>   
          	<td><?= $details['no_of_days'];?></td> 
             
            <td><?= $details['driver_name'];?></td>
            <td><?= $details['driver_contact_number'];?></td>
            <td><?= $details['cab_number'];?></td>  
          </tbody>
          <tr>
          	<th>Inital Opening Kms</th>
          	<th>Final Closing Kms</th>
          	<th>Total Kms</th>
          	<th>Other Charges</th>
          	<th>DA</th>
            <th>Advance</th>
            <th>Balance Amount</th>
            <th>Pay</th>
            <th>Reson</th>
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
          		<input type="number" class="form-control col-lg-1" name="da" id="da"  value="<?= $details['da'];?>" />
			</td>

      <td>
              <input type="number" class="form-control col-lg-1" name="advance_amount" id="advance_amount"  value="<?= $details['credit'];?>" />
      </td>
      <td>
              <input type="text" class="form-control col-lg-1 balance" name="balance" id="balance"  >
              <span class="balance2" style="display: none;"></span>
      </td>
      <td>
              <input type="text" class="form-control col-lg-1 debit" name="debit" id="debit" onkeyup="CalBalance();">
      </td>
      <td>
              <input type="text" class="form-control col-lg-1" name="reason" id="reason"  value="<?= $details['reason'];?>" />
      </td>
			<td colspan="2">
				<a onClick="UpdateOne()"> <li class="fa fa-edit" ></li> </a>
			</td>
          	   
          </tbody>
          <tbody id="kms_details">
          	
          	
          	
          	   
          </tbody>
          
        </table>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Dismiss</button>
        
        <button type="button" onclick="Approve(<?=  $booking_id?>);" class="btn btn-success pull-right" data-dismiss="modal">Close Booking</button>
       
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!--=======After Close Booking Modal==========--> 
 <div class="modal fade" id="modal-details">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Details</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            <th>For</th>
            <th>Assinged To</th>
            <th>Cab</th>
            <th>From</th>
            <th>To</th>
            <th>No. of Days</th>
             <th>Driver Name</th>
            <th>Number</th>
            <th>Cab No</th>
          </tr>
          <tbody id="trip_details">
          	<td><?= $details['company_name'];?></td>   
          	<td><?= $details['vendor_name'];?></td>   
          	<td><?= $details['cab_name'];?></td>   
          	<td><?= $details['from_city'];?></td>   
          	<td><?= $details['to_city'];?></td>   
          	<td><?= $details['no_of_days'];?></td> 
             
            <td><?= $details['driver_name'];?></td>
            <td><?= $details['driver_contact_number'];?></td>
            <td><?= $details['cab_number'];?></td>   
          </tbody>
          <tr>
          	<th>Inital Opening Kms</th>
          	<th>Final Closing Kms</th>
          	<th>Extra Kms</th>
          	<th>Total Kms</th>
          	<th>Other Charges</th>
          	<th>DA</th>
            <th>Advance</th>
            <th>Reson</th>
          	
          </tr>
          <tbody >
          	<td>
          		<?= $details['opening_km'];?>
			</td>
			<td>
          		<?= $details['closing_km'];?>
			</td>
			<td>
          		<?= $details['extra_kilometer'];?>
			</td>
			<td>
          		<?= $details['totat_kilometer'];?>	
			</td>
			<td>
          		<?= $details['other_charges'];?>	
			</td>
			<td>
          		<?= $details['da'];?>
			</td>

      <td>
              <?= $details['credit'];?>
      </td>
      <td>
              <?= $details['reason'];?>
      </td>
			
          	   
          </tbody>
          <tbody id="kms_details">
          	
          	
          	
          	   
          </tbody>
          
        </table>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Dismiss</button>
        
       
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<form action=""></form>


<script type="text/javascript">
  //select the vendor list to assign the vendor
 function get_vendor(id){
    var city=$('#city').html();
    var cab=$('#cab_id').html();
    var booking_id=$('#booking_id').html();
    var vendor_id=$('.vendor_id').html();
    var type=$('#type').html();
    
    
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Booking/GetVendor",
    data:{city:city,type:type,cab:cab,booking_id:booking_id,vendor_id:vendor_id},
    success: function(response){
      //alert(response);
      $('#vendor_list').html(response);
       
    },error: function(xhr, status, error) {
      console.log(xhr);
    }
});
}



 function GetDetails(){
 	var booking_id=$('#booking_id').html();
 	//alert(booking_id);
	$.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Booking/GetClosingDetails",
    data:{booking_id:booking_id},
    success: function(response){
      //alert(response);
      $('#kms_details').html(response);
       
    },error: function(xhr, status, error) {
      console.log(xhr);
    }
  });			
			
			
 }

	


  //assign the vendor to booking 
</script> 
<script type="text/javascript">

  function PaybleAmount(rate,debit) {
    //alert(debit)
    var   total_km=$('#total_km').val();
    var   other_charges =$('#other_charges').val();
    var   da  =$('#da').val();
    var   advance_amount = $('#advance_amount').val();

      var basic = parseInt(total_km)*rate;
      var basic2 = parseInt(other_charges)+parseInt(da)+parseInt(basic);
      var final_amount1 =basic2 -  advance_amount;
      var final_amount = final_amount1-debit;
        $("#balance").val(final_amount);
         $(".balance2").html(final_amount);
        balance2
}
 //var balancesx = $('.balance').val();
function CalBalance(){
   balance=$('.balance2').html();
   debit=$('.debit').val();
    var final_amount = parseInt(balance)-parseInt(debit);
   $(".balance").val(final_amount);
}


	function UpdateOne(){
		//alert('yaser');
		var booking_id = $('#booking_id').html();	
		var opening_km = $('#opening_km').val();	
		var closing_km = $('#closing_km').val();	
		var debit = $('#debit').val();	
    var vendor_ids = $('.vendor_id').html();
		var other_charges = $('#other_charges').val();	
		var da = $('#da').val();
    var advance_amount = $('#advance_amount').val();
    var reason = $('#reason').val();
    var total_km = $('#total_km').val();	
    var advance_id = $('#advance_id').html();  
    
		
		//alert(vendor_ids);
		$.ajax({
    		type:"POST",
    		url:"<?php echo base_url()?>Booking/UpdateOne",
    		data:{booking_id:booking_id,opening_km:opening_km,closing_km:closing_km,debit:debit,other_charges:other_charges,da:da,advance_amount:advance_amount,
          reason:reason,total_km:total_km,vendor_ids:vendor_ids,advance_id:advance_id},
    		success: function(response){
    	 	 alertify.alert(response);
      		//$('#kms_details').html(response);
       
    		}
  		});
		
		
		
	}
	
		
	function UpdateTwo(close_id){
		//alert(close_id);
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>Booking/UpdateTwo/"+close_id,
			data:{
				//booking_id:$('#booking_id').html();
				day:$('#day'+close_id).val(),
				open_km:$('#open_km'+close_id).val(),
				open_place:$('#open_place'+close_id).val(),
				close_km:$('#close_km'+close_id).val(),
				close_place:$('#close_place'+close_id).val()},
			success:function(result){
					alertify.alert(result);
			}
		})
		
		
		
	}
	
	function Approve(booking_id){
		//alert(booking_id);
		//return false;
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