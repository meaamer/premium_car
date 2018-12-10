
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
              //print_r($details['vendor_id']);
			if(rtrim($details['vendor_id'])==0){
				$asignbtn='<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$details['booking_id'].')" >Assign</button>';
			
			}else{
			$asignbtn='<button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default" onclick="get_vendor('.$details['booking_id'].')" >UnAssign</button>';
	
			}

	?>
			  <?= $asignbtn;?>	
              
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">1</th>
                  <th style="width: 170px">Booking ID</th>
                  <td id="booking_id" ><?php echo $details['booking_id'];?></td>
                </tr>
                  
                
                <tr>
                  <th style="width: 20px">2</th>
                  <th style="width: 170px">Cab Name</th>
                  <td><?php echo $details['cab_name'];?></td>
                  <td style="visibility: hidden" id="cab_id" ><?php echo $details['cab_id'];?></td>
                  <td style="visibility: hidden" id="vendor_id" ><?php echo $details['vendor_id'];?></td>
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
 
 
 


