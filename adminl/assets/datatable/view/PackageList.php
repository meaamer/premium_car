<link rel="stylesheet" href="<?php echo  base_url();?>assets/datatables/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css" />

<script src="<?php echo  base_url();?>assets/datatables/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>assets/datatables/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<div class="col-lg-12" style="height: 600px; overflow: scroll;">
	<div class="forms-main col-lg-12" style="margin: auto;float:none">
		<div class="graph-form" style="margin-top: 10px">
			<h2>Package List</h2>	
				<table id="package_data" class="table">
					<thead>
						<th>Package Name</th>
						<th>From City</th>
						<th>To City</th>
						<th>Cab</th>
						<th>No. Of Days</th>
						<th>Km Limit</th>
						<th>Extra km</th>
						<th>Fare Amount</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					<!--<tbody>
						<tr>
							<?php
							foreach($packageList as $row)
							 echo '
								<td>'.$row['packge_name'].'</td>
								<td>'.$row['from_city'].'</td>
								<td>'.$row['to_city'].'</td>
								<td>'.$row['no_of_days'].'</td>
								<td>'.$row['km_limit'].'</td>
								<td>'.$row['extra_km'].'</td>
								<td>'.$row['fare_amount'].'</td>
								<td></td>
							
							
							';?>							
							
						</tr>						
					</tbody>-->
				</table>
		</div>
	</div>
</div>	



<script type="text/javascript" lang="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#package_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Package/PackageListx'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[1,2,3,4,5,6,7,8,9],  
                     "orderable":false,  
                },  
           ],
           
           
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
           	console.log(aData);
					$(nRow).attr('id', aData[10]);
            }
             
      });  
 });  
 
  
 function DeletePackage(id){
 	alertify.confirm('Delete', 'Are You sure you want to DELETE', function(){ 
				$.ajax({
					url:"<?php echo base_url();?>Package/DeletePackages/"+id,
					type:'POST',
					success: function(data){
						alertify.success('Deleted')
						$("#"+id).remove();
					}
					
					
				})
				 }
                , function(){ alertify.error('Cancel')});
 	
 	
 }
 
 
 
 </script> 
 
 <style>
	.mBtnSmall{
		    padding: 5px;
    font-size: 12px;
        margin: 0px;
	}
	tr{
		border-bottom: 1px solid #999 !important;
	}
	.table.dataTable{
		    border-collapse: collapse !important;
	}
	.table td, .table>tbody>tr>td, .table>tfoot>tr>td, .table>thead>tr>td {
    padding: 5px !important; 
	}
</style>