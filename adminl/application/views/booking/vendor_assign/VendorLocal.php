
<?php if (!empty($vendors)): ?>
	

<?php foreach ($vendors as $vendor): ?>
	<?php
	
	if(rtrim($vendor_id)==$vendor['vendor_id']){
	$asignbtn='<button class="btn btn-warning" onclick="assign_vendor(0,'.$booking_id.')" >UnAssign</button>';
	
			}else{
				$asignbtn = '<button class="btn btn-primary" 
			onclick="assign_vendor( '.$vendor["vendor_id"].', '.$booking_id.');">Assign
			</button>';
			}
	?>
	<tr>
		<td><?php echo $vendor['vendor_name']; ?></td>
		<td><?php echo $vendor['vendor_city']; ?></td>
		<td>&#8377;<?php echo  $companies['full_day']; ?></td>
		<td>&#8377;<?php echo  $companies['half_day']; ?></td>
		<td>&#8377;<?php echo  $vendor['full_day']; ?></td>
		<td>&#8377;<?php echo  $vendor['half_day']; ?></td>
		<td>
			<?php echo  $asignbtn; ?>
		</td>     
	</tr>
		
<?php endforeach ?>
<?php endif ?>

<script type="text/javascript">
	  function assign_vendor(vendor_id,booking_id){
	  	
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Booking/AssignBooking/",
    data:{vendor_id:vendor_id,booking_id:booking_id},
    success: function(response){
      alertify.success(response);
      window.location.reload();
       
    },error: function(xhr, status, error) {
      console.log(xhr);
    }
});
  }
</script>