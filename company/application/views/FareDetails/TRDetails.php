	
	
	<?php 
	
	
	$gst=$rates['transfer_rate'] * .05;
	//$igst=$rates['transfer_rate'] *.05;
	$transfer_rate = $rates['transfer_rate'] + $gst;
	echo '&#8377;'.$transfer_rate.'/-';
	
	
	?>
	
