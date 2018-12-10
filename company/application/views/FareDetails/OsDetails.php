<?php 
	$total_fare="";
	
	$fare_one= $no_of_day * $rates['average_per_kilometer'];
	
	
	$fare_two = $fare_one * $rates['outstation_per_kilometer'];
	
	$driver_charges = $rates['driver_charges'] * $no_of_day;
	
	$total_fare_one = $fare_one + $fare_two + $driver_charges;
	
	$gst = $total_fare_one *.05;
	
	
	
	$total_fare = $total_fare_one + $gst;
	//die('#'.print_r($total_fare_one));
	 
	 

?>


<tr>
	<td> &#8377;<?=$total_fare;?>/-</td>
</tr>

