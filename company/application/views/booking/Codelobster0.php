<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        <div class="col-md-1"></div>
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Booking Form</h2>
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
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">User Info</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">

						<div class="card-text">
							
						</div>

						<form class="form" id="booking">
							<div class="form-body" id="booking">
								<h4 class="form-section"><i class="icon-android-subway"></i>Travelling Details</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput1">Type</label>
											<select name="type" id="type" class="form-control border-primary">
											<option value="" selected="" disabled="">Select </option>
												<option value="local">Local </option>
												<option value="outstation">Outstation </option>
												<option value="transfer">Transfer</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput2">Cabs</label>
											<select name="cab" id="cab" class="form-control border-primary">
										<option value="" selected="" disabled="">Select </option>
										
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
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">From City</label>
											<input type="text" id="from_city" name="from_city" 
											class="form-control border-primary" placeholder="From City">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4">To City</label>
											<input type="text" id="to_city" name="to_city" 
											class="form-control border-primary" placeholder="To City">
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
											<input type="text" id="time" name="time" 
											class="form-control border-primary" placeholder="Time">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">No Of Days</label>
											<input type="text" id="day" name="day" 
											class="form-control border-primary" placeholder="No Of Days">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4">Address</label>
											<textarea  id="address" name="address" 
											class="form-control border-primary" rows="1"></textarea>
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
								<div class="form-group">
											<label for="userinput3">Email Id</label>
											<input type="text" id="email" name="email" 
										class="form-control border-primary" 
										placeholder="Email Id">
								</div>

								

								

								

								

							</div>

							<div class="form-actions right">
								
								<button type="button" class="btn btn-primary" onclick="add_booking();">
									<i class="icon-check2"></i> Book Now
								</button>
							</div>
						</form>
						<div id="error"></div>
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

// pass the booking details to controoler
function add_booking()
  {
  	
    var form =$("#booking");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Booking/AddBooking",
      data:form.serialize(),
      success: function(response){
	      $('#error').html(response);
	      $("#booking")[0].reset();
         
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  </script>


<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  });
  </script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>