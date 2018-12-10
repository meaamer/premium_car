
  
    
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Booking List</h2>
          </div>
         
        </div>
        <div class="content-body"><!-- Basic Tables start -->


<!-- Bordered table start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bookings</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                       
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                       
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
               
                <div class="table-responsive">
                    <table id="table_data" class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Type</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Info</th>
                                
                                
                            </tr>
                        </thead>
                       <tbody>
                       </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bordered table end -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    
$(document).ready(function(){  
      var dataTable = $('#table_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url();?>Booking/BookingList/3",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[5],  
                     "orderable":false,  
                },  
           ],
           
           
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            console.log("hello");
                    $(nRow).attr('id', aData[10]);
                    if(aData[6]==0){
						$(nRow).css('background-color', 'orange');
						$(nRow).css('color', '#FFF');
					}else if(aData[6]==1){
						$(nRow).css('background-color', 'blue');
						$(nRow).css('color', '#FFF');
					}else if(aData[6]==2){
						$(nRow).css('background-color', 'red');
						$(nRow).css('color', '#FFF');
					}else if(aData[6]==3){
						$(nRow).css('background-color', '#fff');
						$(nRow).css('color', '#000');
					}
					
            }
             
      });  
 });  
 
  
    
</script>       