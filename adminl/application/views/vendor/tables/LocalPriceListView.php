
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Vendor Local Tariff
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
                  <th>Vendor Name</th>
                  <th>Can Name</th>
                  <th>Cab Image</th>
                  <th>Fullday </th>
                  <th>Halfday </th>
                  <th>Extra Hours</th>
                  <th>Extra Kilometer</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                <?php if ( !empty($locals) ): $i=0; ?>
    			<?php foreach ( $locals as $local ): $i++; ?>
        
    				
                <tr id="reload<?php echo $local['vendor_local_id'];?>">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $local['vendor_name']; ?></td>
                  <td><?php echo $local['cab_name']; ?></td>
                  <td>
                  	<img width="100" src="<?php echo base_url('assets/uploads/').$local['cab_image'];?>" alt="" />
                  </td>
                  <td><?php echo $local['full_day']; ?>/-</td>
                  <td><?php echo $local['half_day']; ?>/-</td>
                  <td><?php echo $local['extra_hours']; ?>/-</td>
                  <td><?php echo $local['extra_kilometer']; ?>/-</td>
                  
                  <td>
                  	<a href="<?php echo base_url('VendorPricing/LocalList/').$local['vendor_local_id'];?>" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                  	<button type="button" class="btn btn-danger" 
                  	onclick="delete_local(<?php echo $local['vendor_local_id'];?>);">
                  	<i class="fa fa-trash" aria-hidden="true"></i></button>
                  	
                  </td>
                </tr>
                
                <?php endforeach ?>
				<?php endif ?>
            
                </tbody>
                <tfoot>
                
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
function delete_local(id){

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>VendorPricing/DeleteLocal/"+id,
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
 