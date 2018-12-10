<?php

	if( $type=="fullday"){
		
		$gst=$rates['full_day'] * .05;
		$igst=$rates['full_day'] *.05;
		 $full_day = $rates['full_day'] + $gst + $igst;
		 echo '&#8377;'.$full_day.'/-';
		 
	}else{
		
		$gst=$rates['half_day'] * .05;
		$igst=$rates['half_day'] *.05;
		$half_day = $rates['half_day'] + $gst + $igst;
		echo  '&#8377;'.$half_day.'/-';
	}	
?>
	


