<?php if (!empty($vendors)): ?>
<?php foreach ($vendors as $vendor): ?>

	<tr>
		<td><?php echo $vendor['vendor_id']; ?></td>
		<td><?php echo $vendor['vendor_name']; ?></td>
		<td><?php echo $vendor['vendor_contact_no']; ?></td>
		<td><?php echo $vendor['vendor_city']; ?></td>
		<td>
			<button class="btn btn-primary" 
			onclick="assign_vendor(<?php echo $vendor['vendor_id'] ?>,
			<?php echo $booking_id;?>);">Assign
			</button>
		</td>     
	</tr>
		
<?php endforeach ?>
<?php endif ?>

<script type="text/javascript">
	  function assign_vendor(vendor_id,company_id){
	  	//alert(vendor_id);
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Vendor/AssignVendor/"+vendor_id+"/"+company_id,
    success: function(response){
      alertify.success(response);
      window.location.reload();
       
    },error: function(xhr, status, error) {
      console.log(xhr);
    }
});
  }
</script>