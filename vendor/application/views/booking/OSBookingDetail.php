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
            <div style="" class="box-header with-border">
              <h3 class="box-title">Booking Details</h3>

              <?php if( $details['vendor_status']==1):?>
              <button class="btn btn-primary pull-right" onclick="CheckData();" style="margin-left: 10px;margin-bottom: 10px;" 
              data-toggle="modal" data-target="#default">Close Booking</button>
              <?php elseif($details['vendor_status']==2):?>
                <p>Booking Rejected</p>
                <?php elseif($details['vendor_status']==3):?>
                <p style="background:#ed5412;color: #fff;padding:5px;font-weight: bold;" class="pull-right" >Booking Closing in Progress</p>
                <?php elseif($details['vendor_status']==4):?>
               <button class="btn btn-success pull-right"  onclick="ClosedBooking(<?=$details['booking_id'];?>,<?=$details['vendor_id'];?>);"  style="margin-left: 10px;margin-bottom: 10px;" data-toggle="modal" data-target="#closedbooking"  >Closed Booking Details</button>
              <?php else:?>
              <button class="btn btn-danger pull-right"  onclick="RejectBooking(<?=$details['booking_id'];?>,<?=$details['vendor_id'];?>);"  style="margin-left: 10px;margin-bottom: 10px;"   >Reject</button>
              <button class="btn btn-success pull-right" data-toggle="modal" data-target="#acceptbooking">Accept</button>
              <?php endif;?>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">1</th>
                  <th style="width: 170px">Booking ID</th>
                  <td id="booking_id"><?php echo $details['booking_id'];?></td>
                  <td style="visibility: hidden;" id="vendor_id"><?php echo $details['vendor_id'];?></td>
                  <td style="visibility: hidden;" id="company_id"><?php echo $details['company_id'];?></td>
                  
                </tr>
                
                <tr>
                  <th style="width: 20px">2</th>
                  <th style="width: 170px">Cab Name</th>
                  <td><?php echo $details['cab_name'];?></td>
                  <td id="cab_id" style="visibility: hidden;" ><?php echo $details['cab_id'];?></td>
                  
                </tr>
                
                 <tr>
                  <th style="width: 20px">3</th>
                  <th style="width: 170px">Company Name</th>
                  <td><?php echo $details['company_name'];?></td>
                  <td id="company_id" style="visibility: hidden;" ><?php echo $details['company_id'];?></td>
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
                  <th style="width: 170px">From City</th>
                  <td><?php echo $details['from_city'];?></td>
                  
                </tr>
                <tr>
                  <th style="width: 20px">7</th>
                  <th style="width: 170px">To City</th>
                  <td><?php echo $details['to_city'];?></td>
                  
                </tr>
                
                <tr>
                  <th style="width: 20px">7</th>
                  <th style="width: 170px">Number of Days</th>
                  <td><?php echo $details['no_of_days'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">8</th>
                  <th style="width: 170px">Mobile No</th>
                  <td><?php echo $details['mobile_number'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">9</th>
                  <th style="width: 170px">Alternate No</th>
                  <td><?php echo $details['alternate_number'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">10</th>
                  <th style="width: 170px">Date</th>
                  <td><?php echo $details['traveling_date'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">11</th>
                  <th style="width: 170px">Time</th>
                  <td><?php echo $details['traveling_time'];?></td>
                  
                </tr>
                 <tr>
                  <th style="width: 20px">12</th>
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
 



<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="form-group">
 <!-- Modal -->
    <div class="modal fade text-lg-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg" style="max-width: 80% !important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Close Booking</h4>
        </div>
        <div class="modal-body">
          <form class="form" id="form_data">
            <div class="form-body">
            <div class="row" id="closing_row">
              <div class="col-md-1">
              <div class="form-group">
              <label for="complaintinput1">Day</label>
              <input type="text" id="date" class="form-control round" 
              placeholder="day" name="date">
              </div>
              </div>
              
              
              <div class="col-md-2">
              <div class="form-group">
              <label for="complaintinput1">Opening Kilometer</label>
              <input type="text" id="open_km"  class="form-control round" 
              placeholder="Opening Kilometer" name="open_km" onkeyup="DayTatalKm();">
              </div>
              </div>


              <div class="col-md-2">
              <div class="form-group">
              <label for="complaintinput1">Place</label>
              <input type="text" id="open_place"  class="form-control round" 
              placeholder="Place" name="open_place">
              </div>
              </div>
              
              <div class="col-md-2">
              <div class="form-group">
              <label for="complaintinput1">Closing Kilometer</label>
              <input type="text" id="close_km" class="form-control round" 
              placeholder="Closing Kilometer" name="close_km"  onkeyup="DayTatalKm();">
              </div>
              </div>
              
              <div class="col-md-2">
              <div class="form-group">
              <label for="complaintinput1">Place</label>
              <input type="text" id="close_place"  class="form-control round" 
              placeholder="Closing Kilometer" name="close_place">
              </div>
              </div>
              
              <div class="col-md-2">
              <div class="form-group">
              <label for="complaintinput1">Total Kms</label>
              <input type="text" id="day_total_kms"  class="form-control round" 
              placeholder="Total Kms" name="day_total_kms">
              </div>
              </div>
              <div class="col-md-1">
              <div style="margin-top: 23px;" class="form-group">
                  <img onclick="AddRow();" src="<?php echo base_url();?>assets/images/plus.png" alt="" />   
             </div>
              </div>
              
              
            </div>
            
            <div  class="row">
              <table class="table table-sm table-bordered" >
        <thead>
          <tr>
            <th>Day</th>
            <th>Open Km</th>
            <th>Place</th>
            <th>Close Km</th>
            <th>Place</th>
            <th>Total Kms</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="responsex" >
        </tbody>
        <</table>
            </div>
<hr>
            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Opening Km</label>
              <input type="text" id="open_kmx"   class="form-control round" placeholder="Opening Km"
               name="open_km" readonly="">


              </div>
              </div>


              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Closing Km</label>
              <input type="text" id="close_km_form" class="form-control round"
               placeholder="Closing Km" name="close_km" readonly="">
              </div>
              </div>

            <!--  <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Extra Kilometer</label>
              <input type="text"  class="form-control round" placeholder="Extra Kilometer"
               name="extra_km" id="extra_km" >
              </div>
             </div> -->

             <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Total Kilometer</label>
              <input type="text" id="total_km_form" class="form-control round"
               placeholder="Total Kilometer" name="total_km" readonly="">
              </div>
              </div>
            
            </div>
            
            <div class="row">
             
              

              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Other Charges</label>
              <input type="text" id="other_charges" class="form-control round"
               placeholder="Other Charges" name="other_charges">
              </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">DA</label>
              <input type="text" id="da" class="form-control round"
               placeholder="DA" name="da" onkeyup="BalanceAmount(<?=$pricings['outstation_per_kilometer'] ?>)">
              </div>
              </div>


              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Total Amount</label>
              <input type="text"  class="form-control round total_amount" placeholder="Total Amount"
               name="" readonly="">
               
              </div>
              </div>



            </div>
            <hr>
              <div class="row">
                <h3 class="col-md-4">Advance Amount</h3>
              </div>
             <div class="row">
              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Advance Amount</label>
              <input type="text"  class="form-control round" placeholder="Advance Amount"
               name="advance" id="advance" onkeyup="TotalAmount()">
              </div>
              </div>


              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Reason</label>
              <input type="text" id="complaintinput1" class="form-control round"
               placeholder="Reason" name="reason">
              </div>
                <input type="hidden" name="vendor_id" value="<?php echo $details['vendor_id']; ?>">
              </div>

              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Balance Amount</label>
              <input type="text"  class="form-control round balance_amount" placeholder="Balance Amount"
               name="balance_amount" readonly="">
             
              </div>
              </div>
            </div>


            
          </div>
        </div>
        <div class="modal-footer">
        <div class="row">
          <button type="button" class="btn grey btn-outline-secondary pull-left col-md-1" data-dismiss="modal">Dismiss</button>
          <div id="response" class="col-md-5"></div>
        <button type="button" class="btn btn-outline-primary" 
        onclick="close_booking(<?php echo $details['booking_id'];?>);">Close Booking</button>
         
      </form>
        
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- show the close booking details to vendors -->
<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="form-group">
    <div class="modal fade text-lg-left" id="closedbooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div 	 style="max-width: 80% !important;" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel1">Closed Booking Details</h4>
            </div>
            <div class="modal-body" id="ClosedBookingDetail">


            </div>
          <div class="modal-footer">
            
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
    </div>
  </div>
</div>





<!-- accept driver details in the time of booking accepting -->
<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="form-group">
    <div class="modal fade text-lg-left" id="acceptbooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel1">Driver Details</h4>
            </div>
            <div class="modal-body">

            <form class="form" id="accepting">
            <div class="form-body">
            <div class="row" id="closing_row">
              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Driver Name</label>
              <input type="text" id="d_name" class="form-control round" 
              placeholder="Driver Name" name="d_name">
              </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Driver Contact No</label>
              <input type="text" id="date" class="form-control round" 
              placeholder="Driver Contact No" name="d_no">
              </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
              <label for="complaintinput1">Cab No</label>
              <input type="text" id="date" class="form-control round" 
              placeholder="Cab No" name="cab_no">
              </div>
              </div>
            </div>
          </div>
       

            </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-outline-secondary btn-success" 
            onclick="AcceptBooking(<?=$details['booking_id'];?>);">Accept Booking</button>
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Dismiss</button>
           </form>  
          </div>
          </div>
        </div>
    </div>
  </div>
</div>































 <script type="text/javascript">






  function AcceptBooking(booking_id,vendor_id){
    //alert(vendor_id);
    alertify.confirm('Accept Booking', 'Are You sure you want to Accept This Booking', function(){ 
        $.ajax({
          url:"<?php echo base_url();?>Booking/AcceptBooking",
          type:'POST',
          data:{booking_id:booking_id,vendor_id:vendor_id},
          success: function(data){
            alertify.success('Booking Accepted');
                  window.location.reload();
          }
          
          
        })
         }
                , function(){ alertify.error('Cancel')});
  
    
  }
  
  
  function RejectBooking(booking_id,vendor_id){
    //alert(vendor_id);
    alertify.confirm('Accept Booking', 'Are You sure you want to Reject This Booking', function(){ 
        $.ajax({
          url:"<?php echo base_url();?>Booking/RejectBooking",
          type:'POST',
          data:{booking_id:booking_id,vendor_id:vendor_id},
          success: function(data){
            alertify.success('Booking Rejected');
            window.location.reload();
          }
          
          
        })
         }
                , function(){ alertify.error('Cancel')});
  
    
  }

    
    function close_booking(id){
    
    var form = $("#form_data");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CloseBooking/OSClosing/"+id,
      data:form.serialize(),
      success: function(response){
       $("#response").html(response);
       
         
      }
    });
  }
  
  
 </script>
 
 <script type="text/javascript">



 /*Function to check if previous days entry record*/ 
	  function CheckData(){
	  	//alert('yaser');	
	  	var booking_id =$('#booking_id').html();								
	  	$.ajax({
	  		url:"<?php echo base_url();?>CloseBooking/CheckCloseBooking",
	  		type:"post",
	  		data:{booking_id:booking_id},
	  		success:function(response){
	  			//alert(response);
	  			$("#responsex").append(response);
	  		}
	  			
	  	})
	  	
	  	
	  }
  
/*Function to Get Opening KMS and CLOSEING */  
	  function Getkms(){
	  	var open_km=$('#open_km').val();
	  	$('#open_kmx').val(open_km).prop('disabled', true);
	  	//$("#open_kmx").prop('disabled', true);
	  }
  
 
    
    function DayTatalKm(){
  var open_km = $("#open_km").val();
     var close_km = $("#close_km").val();
     var result =close_km-open_km;
      $("#day_total_kms").val(result).prop('disabled', true);
}


 function BalanceAmount(per_km){

        var other_charges= $("#other_charges").val();
        var da= $("#da").val();
       
        var result =parseInt( $("#total_km_form").val())*per_km;
        var  addAmount = parseInt(result) + parseInt(other_charges) + parseInt(da);
        $(".total_amount").val(addAmount);
       
        
  }

 //show to vendor recivable amount
     function TotalAmount(){

        var total_amount= $(".total_amount").val();
        var advance= $("#advance").val();
        
        var final_amount = parseInt(total_amount)-parseInt(advance);
        $(".balance_amount").val(final_amount);
  }

    
    
    
  function AddRow(){
    if($('#date').val()=="" || $('#date').val()==null ){
      alertify.alert("Enter Day");
      return false;
    }
    
    if($('#open_km').val()=="" || $('#open_km').val()==null ){
      alertify.alert("Enter Opening Km");
      return false;
    }
    
    if($('#open_place').val()=="" || $('#open_place').val()==null ){
      alertify.alert("Enter Opening Place");
      return false;
    }
    
    if($('#close_km').val()=="" || $('#close_km').val()==null ){
      alertify.alert("Enter Close Kms");
      return false;
    }
    
    if($('#close_place').val()=="" || $('#close_place').val()==null ){
      alertify.alert("Enter Close Place");
      return false;
    }

    
    
    
    
    
    var booking_id =$('#booking_id').html();
    var cab_id=$('#cab_id').html();
    var vendor_id=$('#vendor_id').html();
    var company_id=$('#company_id').html();
    var day=$('#date').val();
    var open_km=$('#open_km').val();
    var open_place=$('#open_place').val();
    var close_km=$('#close_km').val();
    var close_place=$('#close_place').val();
    var day_total_kms=$('#day_total_kms').val();
    total_km_form = 0;
    if($("#total_km_form").val()!=""){
     total_km_form= $("#total_km_form").val()
    }
   
    total_kms=parseInt(total_km_form)+parseInt($("#day_total_kms").val());
    $('#total_km_form').val(total_kms);

   
   

    
    
    
    
    $.ajax({
      url:"<?php echo base_url();?>CloseBooking/ClosingData",
      type:'POST',
      //data:$('')
      data:{booking_id:booking_id,vendor_id:vendor_id,company_id:company_id,cab_id:cab_id,day:day,open_km:open_km,open_place:open_place,close_km:close_km,close_place:close_place,day_total_kms:day_total_kms},
      success: function(response){
          //alert(response);
          $('#responsex').append(response);
         
        }
       })
       
       //var open_km=$('#open_km').val();
	    if($('#responsex tr').length==0){
		  $('#open_kmx').val(open_km);
		}
	   
	   $('#close_km_form').val(close_km);
      
  }   


     
 

  function Remove(id){
    //alert(id);
    $.ajax({
      url:"<?php echo base_url();?>CloseBooking/Remove",
      type:'POST',
      //data:$('')
      data:{id:id},
      success: function(response){
          alertify.alert(response);
          $("#"+id).remove();
        }
       })
  }
  
  //show the delails of close booking to vendors
  function ClosedBooking(booking_id,vendor_id){
    //alert(id);
    $.ajax({
      url:"<?php echo base_url();?>CloseBooking/ClosedBookingDetails",
      type:'POST',
      //data:$('')
      data:{booking_id:booking_id,vendor_id:vendor_id},
      success: function(response){
       
         $('#ClosedBookingDetail').html(response);
        
        }
       })
  }
  
  
  
  

  function AcceptBooking(booking_id)
  {
   
    var form =$("#accepting");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Booking/AcceptBooking/"+booking_id,
      data:form.serialize(),
      success: function(response){
      alertify.success(response);
      window.location.reload();
      },error: function(xhr, status, error) {

      console.log(xhr);
    }
      
    });
       
         
  }

</script>
 