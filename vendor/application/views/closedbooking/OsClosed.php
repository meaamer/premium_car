
        <table class="table table-bordered">
          <tr>
            <th>Booking ID</th>
            <th>Company</th>
            <th>Cab</th>
            <th>From</th>
            <th colspan="2">To</th>
            <th > No. of Days</th>
          </tr>
          <tbody id="trip_details">
          	<td><?= $details['booking_id'];?></td>   
          	<td><?= $details['company_name'];?></td>   
          	<td><?= $details['cab_name'];?></td>   
          	<td><?= $details['from_city'];?></td>   
          	<td colspan="2"><?= $details['to_city'];?></td>   
          	<td ><?= $details['no_of_days'];?></td>   
          </tbody >
          <tr>
          	<th>Inital Opening Kms</th>
          	<th>Final Closing Kms</th>
          	<th>Extra Kms</th>
          	<th>Other Charges</th>
          	<th>DA</th>
              <th>Advance Amount</th>
              <th>Reason</th>
          	
          </tr>
          <tbody >
          	<td><?= $details['opening_km'];?></td>
			     <td><?= $details['closing_km'];?></td>
			<td><?= $details['extra_kilometer'];?></td>
			<td><?= $details['other_charges'];?></td>
			<td><?= $details['da'];?></td>
			<td><?= $details['credit'];?></td>
      <td><?= $details['reason'];?></td>

          	   
      </tbody>
      <tbody id="">
        <tr>
          <th>Day</th>
          <th>Open Km</th>
          <th>Open Place</th>
          <th>Close Km</th>
          <th colspan="3"> Close Place</th>
         
       </tr>
        <?php if (!empty($closes)): ?>
        <?php foreach ($closes as $row): ?>
              
       <tr>
      
        <td> <?php echo $row['day']; ?></td>
        
        <td><?php echo $row['open_km'] ; ?></td>
        
        <td><?php echo $row['open_place']; ?></td>
        
        <td><?php echo $row['close_km']; ?></td>

        <td colspan="3"><?php echo $row['close_place']; ?></td>

        
      
     
      </tr>
      <?php endforeach ?>    
       <?php endif ?>    	
          	   
          </tbody>
          
        </table>
      