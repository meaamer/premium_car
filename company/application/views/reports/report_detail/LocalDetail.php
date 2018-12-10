
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Local Booking</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              
            </div>
          </div>
        </div>
        <div class="content-body"><section id="grid-options" class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Details</h4>
				<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
						
						<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
						
					</ul>
				</div>
			</div>
			<div class="card-body collapse in collapse in">
				<div class="card-block">
					
					<table class="table table-bordered table-striped">
						
						<tbody>
							<tr>
								<th class="text-nowrap" scope="row"> Full Name</th>
								
								<td colspan=""><?php echo $rows['first_name'] .'&nbsp'. $rows['last_name'];?></td>
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Mobile No</th>
								<td><?php echo $rows['mobile_number'];?></td>
								
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Alternate Mobile No</th>
								<td><?php echo $rows['alternate_number'];?></td>
							
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Pickup Address</th>
								<td colspan=""><?php echo $rows['pickup_address'];?></td>
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">City</th>
								<td colspan=""><?php echo $rows['from_city'];?></td>
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Cab</th>
								<td colspan=""><?php echo $rows['cab_name'];?></td>
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Sub Type</th>
								<td colspan=""><?php echo $rows['sub_type'];?></td>
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Date</th>
								<td colspan=""><?php echo $rows['traveling_date'];?></td>
							</tr>
							<tr>
								<th class="text-nowrap" scope="row">Time</th>
								<td colspan=""><?php echo $rows['traveling_time'];?></td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>










        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
