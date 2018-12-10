
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendors
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Vendor ID</th>
                  <th>Vendor Name</th>
                  <th>Owner Name</th>
                  <th>Cotact Number</th>
                  <th>City</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
                </thead>
               <!-- <tbody>
                
                <?php if ( !empty($vendors) ): $i=0; ?>
    			<?php foreach ( $vendors as $vendor ): $i++; ?>
        
    				
                <tr id="reload<?php echo $vendor['vendor_id'];  ?>">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $vendor['vendor_name']; ?></td>
                  <td><?php echo $vendor['vendor_person_name']; ?></td>
                  <td><?php echo $vendor['vendor_contact_no']; ?></td>
                  <td><?php echo $vendor['vendor_city']; ?></td>
                  <td><?php echo $vendor['vendor_username']; ?></td>
                  <td><?php echo $vendor['vendor_password']; ?></td>
                  
                  <td>
                  	<button type="button" class="btn btn-danger" 
                  	onclick="delete_vendor(<?php echo $vendor['vendor_id'];?>);">
                  	<i class="fa fa-trash" aria-hidden="true"></i></button>
                  	</td>
                  	<td>
                  	<a href="<?php echo base_url('Vendor/VendorList/').$vendor['vendor_id'];?>" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                  </td>
                </tr>
                
                <?php endforeach ?>
				<?php endif ?>
            
                </tbody>-->
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 
<script>
function delete_vendor(id){

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Vendor/DeleteVendor/"+id,
    success: function(response)
    {
      alertify.success(response);
      $('#reload'+id).remove();
    }
  });
  },
  function(){
    alertify.error('Cancel');
  })
}
</script>

               
<script type="text/javascript">
	
$(document).ready(function(){  
      var dataTable = $('#table_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vendor/VendorListX'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[6,7,8],  
                     "orderable":false,  
                },  
           ],
           
           
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
           	console.log(aData);
					$(nRow).attr('id', aData[10]);
            }
             
      });  
 });  
 
  
	
</script>       