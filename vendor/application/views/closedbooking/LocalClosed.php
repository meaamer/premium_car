
        <table class="table table-bordered">
          <tr>
            <th>Booking ID</th>
            <th>Company</th>
            <th>Cab</th>
            <th colspan="3">City</th>
            
            
          </tr>
          <tbody id="trip_details">
          	<td><?= $details['booking_id'];?></td>   
          	<td><?= $details['company_name'];?></td>   
          	<td><?= $details['cab_name'];?></td>   
          	<td colspan="3"><?= $details['from_city'];?></td>   
          	
          	  
          </tbody >
          <tr>
          	<th>Inital Opening Kms</th>
          	<th>Final Closing Kms</th>
          	<th>Extra Hours</th>
          	<th>Other Charges</th>
          	<th>Advance Amount</th>
            <th>Reason</th>
          	
          </tr>
          <tbody >
          	<td><?= $details['opening_km'];?></td>
			     <td><?= $details['closing_km'];?></td>
			<td><?= $details['extra_hour'];?></td>
			<td><?= $details['other_charges'];?></td>
			
			<td><?= $details['credit'];?></td>
      <td><?= $details['reason'];?></td>

          	   
      </tbody>
      
          
        </table>
      