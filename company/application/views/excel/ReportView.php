

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js" type="text/javascript">
</script>
<script src="<?php echo base_url();?>assets/excel.js"></script>

<style type="text/css">
	.button {
			background-color: #653dc2;
			padding: 8px;
			color: #fff;
			text-transform: uppercase;
			border-radius:6px; 
			display: inline-block;
			cursor: pointer; 
		}
		table {
    border-collapse: collapse;
}

table, td, td {
    border: 1px solid black;
    padding: 5px;
    font-family: calibri;
    
}	
	
	
</style>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<button onclick="export2xl();" class="button" >Get into EXCEL</button>
<div id="report_table">
<table cellspacing="0" id="">
	
	<tr>
		
		<td>SR NO.</td>
		<td>BOOKING ID</td>
		<td>BOOKING TYPE</td>
		<td>DATE</td>
		<td>FROM CITY</td>
		<?php foreach ($reports as $report): $j=0;$j++;?>
		<?php if (!empty($report['to_city'])): ?><td>TO CITY</td><?php endif ?>

		<?php if (!empty($report['no_of_days'])): ?><td>NO OF DAYS</td><?php endif ?>
		<?php if($j==1) break; ?>
		<?php endforeach ?>
		<td>Cab Name</td>
		<td>Cab Number</td>
		<td>Customer Name</td>
		<td>Mobile No</td>
		<td> Alternate Mobile</td>
		<td> PickUp Address</td>
		<?php if (!empty($report['pickup_point'])): ?><td> Drop Address</td><?php endif ?>	

		
		
		
		
		
		
		<!-- <td>TOTAL KM</td> -->
		
	</tr>
	<?php if (!empty($reports)): $i=0;?>
	<?php foreach ($reports as $report): $i++;?>
		
	
	<tr>
		<td><?= $i; ?></td>
		<td><?= $report['booking_id']; ?></td>
		<td><?= $report['type']; ?></td>
		<td><?= $report['traveling_date']; ?></td>
		<td><?= $report['from_city']; ?></td>
		
		<?php if (!empty($report['to_city'])): ?><td><?php echo $report['to_city']; ?> </td> <?php endif ?>
		
		<?php if (!empty($report['no_of_days'])): ?> <td><?= $report['no_of_days']; ?> </td><?php endif ?>
		<td><?= $report['cab_name']; ?></td>
		<td><?= $report['cab_number']; ?></td>

		<td><?= $report['first_name']; ?>  <?= $report['last_name']; ?></td>
		<td><?= $report['mobile_number']; ?></td>
		<td><?= $report['alternate_number']; ?></td>
		<td><?= $report['pickup_address']; ?></td>
		<?php if (!empty($report['pickup_point'])): ?><td><?= $report['pickup_point']; ?></td><?php endif;?>
		
		
		
		 
		
		


		





	</tr>
	<?php endforeach ?>	
	<?php endif ?>
</table>
</div>
<style>
table {
    border-collapse: collapse;
}

table, td, td {
    border: 1px solid black;
    padding: 5px;
    font-family: calibri;
    
}	
</style>

</body>
</html>

<script>
	function export2xl(){
		//alert('yaser');
	$("#report_table").table2excel({
	    exclude: ".excludetdisClass",
	    name: "Report",
	    filename: "Report" //do not include extension
	});    
} 
</script>



