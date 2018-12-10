




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Cabs
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
                <th>Cab ID</th></th>
                  <th>Cab Name</th>
                  <th>Cab Image</th>
                  <th>Cab Description</th>
                  <th>Update</th>
                  <th>Delete	</th>
                </tr>
                 
                </thead>
                <!--<tbody>
                
                <?php if ( !empty($cabs) ): $i=0; ?>
    			<?php foreach ( $cabs as $cab ): $i++; ?>
        
    				
                <tr id="reload<?php echo $cab['cab_id'];?>">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $cab['cab_name']; ?></td>
                  <td>
                  	<img width="100" src="<?php echo base_url('assets/uploads/').$cab['cab_image'];?>" alt="" />
                  	
                  </td>
                  <td><?php echo $cab['cab_description']; ?></td>
                 
                  
                  <td>
                  	<button type="button" class="btn btn-danger" 
                  	onclick="delete_cab(<?php echo $cab['cab_id'];?>);">
                  	<i class="fa fa-trash" aria-hidden="true"></i></button>
                  	
                  	<a href="<?php echo base_url('Cabs/CabList/').$cab['cab_id'];?>" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
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
function delete_cab(id){

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Cabs/DeleteCab/"+id,
    success: function(response)
    {
      alertify.success(response);
      $('#'+id).remove();
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
                url:"<?php echo base_url() . 'Cabs/CabListX'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[2,3,4,5],  
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
 