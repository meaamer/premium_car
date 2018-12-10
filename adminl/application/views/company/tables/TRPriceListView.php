
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company Transfer Tariff Details
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Company Name</th>
                  <th>Can Name</th>
                  <th>Cab Image</th>
                  <th>Transfer Rate</th>
                  <th>Waiting Charges</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                <?php if ( !empty($transfers) ): $i=0; ?>
    			<?php foreach ( $transfers as $transfer ): $i++; ?>
        
    				
                <tr id="reload<?php echo $transfer['company_transfer_id'];?>">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $transfer['company_name']; ?></td>
                  <td><?php echo $transfer['cab_name']; ?></td>
                  <td>
                  	<img width="100" src="<?php echo base_url('assets/uploads/').$transfer['cab_image'];?>" alt="" />
                  </td>
                  <td><?php echo $transfer['transfer_rate']; ?>/-</td>
                  <td><?php echo $transfer['waiting_charges']; ?>/-</td>
                 
                  
                  <td>
                  	<a href="<?php echo base_url('CompanyPricing/TRList/').$transfer['company_transfer_id'];?>" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                  	
                  	<button type="button" class="btn btn-danger" 
                  	onclick="delete_TR(<?php echo $transfer['company_transfer_id'];?>);">
                  	<i class="fa fa-trash" aria-hidden="true"></i></button>
                  	
                  </td>
                </tr>
                
                <?php endforeach ?>
				<?php endif ?>
            
                </tbody>
                <tfoot>
                <tr>
                  
                </tr>
                </tfoot>
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
function delete_TR(id){

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>CompanyPricing/DeleteTR/"+id,
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
 