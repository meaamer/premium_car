<link rel="stylesheet" href="<?php echo base_url('assets/DataTables/datatables.min.css')?>">

<script src="<?php echo  base_url('assets/DataTables/datatables.min.js');?>"></script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bookings
        
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
               <table id="table_data" class="table table-bordered">
                <thead>
                <tr>
                  <th>Booking ID</th>
                  <th>Cab Name</th>
                  <th>Company Name</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Assigned</th>
                  <th>Accepted</th>
                  <th>Actions</th>
                </tr>
                  
                </thead>
                
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
  
  


<!--###############################################################################-->
                
<script type="text/javascript">
	
$(document).ready(function(){  
      var dataTable = $('#table_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Booking/BookingList/0'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[],  
                     "orderable":false,  
                },  
           ],
           
           
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
           //	console.log(aData);
					$(nRow).attr('id', aData[0]);
					if(aData[8]==0){
						$(nRow).css('font-weight', 'bold');
						$(nRow).css('color', '#000');
						$(nRow).css('background-color', '#ddd');
					}else{
						$(nRow).css('font-weight', 'normal');
						
						$(nRow).css('color', '#000');
					}
					//
            }
             
      });  
 });  
 
  
	
</script>