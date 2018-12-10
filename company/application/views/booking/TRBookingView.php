
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        <div class="col-md-1"></div>
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Transfer Booking</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="card" id="booking_card" style="display:inherit;">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">User Info</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							
						</ul>
					</div>
				</div>
				<div class="card-body collapse in" id="thisbook">
					<div class="card-block">

						<div class="card-text">
							
						</div>

						<form class="form" id="booking">
							<div class="form-body" id="">
								<h4 class="form-section"><i class="icon-android-subway"></i>Travelling Details</h4>
								<input type="hidden" name="type" id="type" value="transfer">
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput2">Cabs</label>
											<select name="cab" id="cab" class="form-control border-primary">
										<option value="" selected="" disabled="">Select Cab</option>
										
										<?php if ( !empty($cabs) ): ?>
  										<?php foreach ($cabs as $cab ): ?>
    									<option value="<?php echo $cab['cab_id'];?>">
    									<?php echo $cab['cab_name']?>
    									</option>
  										<?php endforeach ?>
										<?php endif ?>
											</select>
										</div>
									</div>
								<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">City</label>
											<input type="text" id="from_city" name="from_city" 
											class="form-control border-primary geocomplete" placeholder="City">
										</div>
									</div>	
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">Date</label>
											<input type="text" id="datepicker" name="date" 
											class="form-control border-primary" placeholder="Date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4">Time</label>
											<input type="text" id="timepicker" name="time" 
											class="form-control border-primary" placeholder="Time">
										</div>
									</div>
								</div>
								
								<h4 class="form-section"><i class="icon-mail6"></i>
								 Contact Info</h4>
								 
								 <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">First Name</label>
											<input type="text" id="first_name" name="first_name" 
											class="form-control border-primary" placeholder="First Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">Last Name</label>
											<input type="text" id="last_name" name="last_name" 
											class="form-control border-primary" placeholder="Last Name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">Mobile Number</label>
											<input type="text" id="mobile" name="mobile" 
										class="form-control border-primary" placeholder="Mobile Number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">Alternate Mobile Number</label>
											<input type="text" id="alt_mobile" name="alt_mobile" 
												class="form-control border-primary"
												 placeholder="Alternate Mobile Number">
										</div>
									</div>
								</div>
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4">Pickup Address</label>
											<textarea  id="address" name="address" 
											class="form-control border-primary" rows="2"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4">Drop Address</label>
											<textarea  id="drop_address" name="drop_address" 
											class="form-control border-primary" rows="2"></textarea>
										</div>
									</div>
								</div>


								

								

								

								

							</div>

							<div class="form-actions right">
								<button type="button" id="continue" class="btn btn-primary hide" onclick="ShowDetails();">
									<i class="icon-check2"></i> Continue
								</button>
								
							</div>
						</form>
						<div class="error2" style="width: 40%;"></div>
						<div class="fare_details" style="width: 40%;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div id="estimate_card" style="display:none;" class="card">
				<div class="card-header">
					<h4 class="card-title" style="text-align: center;" id="basic-layout-colored-form-control">Approx Fare</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<h3 style="text-align: center;" class="fare_details" ></h3>
						<!--<table class="table">
							<thead >
							<tr>
								<th>Approx. Fare</th>
								<th class="fare_details"></th>
								</tr>
							</thead>
							
						</table>-->
						<div class="form-actions pull-right">
								
								<button type="button" id="book" class="btn btn-primary" onclick="add_booking();">
									<i class="icon-check2"></i> Book Now
								</button>
							</div>
							<div class="error" style="width: 40%;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<script>

//show the estimated price of booking
function ShowDetails(){
	
	var form =$("#booking");
	$.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Booking/GetTREstimation",
    data:form.serialize(),
     beforeSend: function(){
			$('#continue').prop('disabled',true);
	   },
    success: function(response){
    $('.fare_details').html(response);
    $('#continue').prop('disabled',false);
	}
    });
}

// pass the booking details to controoler
function add_booking()
  {
  	
    var form =$("#booking");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Booking/TRBooking",
      data:form.serialize(),
      beforeSend: function(){
			$('#book').prop('disabled',true);
	   },
      success: function(response){
	      $('.error').html(response);
	      //$("#booking")[0].reset();
         
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
 $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd-mm-yy",
      minDate: 0
});
  }); 
  
  
   $( function() {
   $('#timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '10',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
  });
  </script>
 <script>
     $(function(){
       
       $(".geocomplete").geocomplete({country: 'IN'})
         .bind("geocode:result", function(event, result){
           $.log("Result: " + result.formatted_address);
         })
         .bind("geocode:error", function(event, status){
           $.log("ERROR: " + status);
         })
         .bind("geocode:multiple", function(event, results){
           $.log("Multiple: " + results.length + " results found");
         });
       
       $("#find").click(function(){
         $(".geocomplete").trigger("geocode");
       });
       
       
       $("#examples a").click(function(){
         $(".geocomplete").val($(this).text()).trigger("geocode");
         return false;
       });
       
     });
 </script>  
