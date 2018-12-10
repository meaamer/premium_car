<div class="content-wrapper">
   <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php if ( isset($rows) ): ?> Update Company Details
          <?php else: ?>Add Company Details <?php endif ?>
          </h3>

          <div class="box-tools pull-right">
            <button 
            	type="button" class="btn btn-box-tool"
             	data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i>
            </button>
            
            <button 
            type="button" class="btn btn-box-tool" 
            data-widget="remove" data-toggle="tooltip" 
            title="Remove">
              <i class="fa fa-times"></i>
            </button>
            
          </div>
        </div>
        
        
        
<div class="box-body">
        <form id="company_form">
            	
        <div class="row">
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="c_name" placeholder="Company Name" 
                value="<?php if( isset($rows) ){echo $rows['company_name'];}?>">
              </div>
              <br>
			</div>
			<div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" 
            value="<?php if( isset($rows) ){echo $rows['company_person_name'];}?>">
              </div>
              <br>
			</div>
			<div class="col-md-4">	
			
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="c_username" placeholder="Username" 
                value="<?php if( isset($rows) ){echo $rows['company_username'];}  ?>">
                
              </div>
				<br>
             </div>
			
			
			</div>
		
			
		
              
            <div class="row">
            
            <div class="col-md-4">	
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control" name="c_password" placeholder="Password"
                value="<?php if( isset($rows) ){echo $rows['company_password'];}?>">
              </div>
              <br>
              </div>
            <div class="col-md-4">
               <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>					</span>
                <input type="text" class="form-control" name="c_contact" placeholder="Contact Number"
                value="<?php if( isset($rows) ){echo $rows['company_contact_no'];}?>">
              </div>
              <br>
             </div> 
             <div class="col-md-4"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i>					</span>
                <input type="text" class="form-control" name="c_city" placeholder="City Name"
                value="<?php if( isset($rows) ){echo $rows['company_city'];}?>">
              </div>
              <br>
			</div>
			</div>
                       
	</div>
        <!-- /.box-body -->
        <div class="box-footer">
        
         
                <?php if (isset($rows)): ?>
    				
    			
				<button type="button" class="btn btn-primary pull-right"
				onclick="update_company(null,<?php echo $rows['company_id'];?>);"> Update
				</button>
                 
                <?php else: ?>
               
                		<button type="button" class="btn btn-primary pull-right" onclick="new_company();">
                		Add</button>
                <?php endif ?>	
                </form>
                <div id="response" style="width:30%;font-size:12px; padding:2pxs	;"></div>
                
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
     <!-- #####################################Form Close###############################-->
    
    <!-- #######################Table Start#######################################################-->
    
   
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="package_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                
                	<th>No</th>
                  <th>Company Name</th>
                  <th>Owner Name</th>
                  <th>Cotact Number</th>
                  <th>City</th>
                  <th>Username</th>
                  <th>Password</th>
                  
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="table_data">
                
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
  
  $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Company/CompanyList/",
      success: function(data){
       
      $("#table_data").html(data);
      }
      
    });
  /* pass new comany details to controller*/
  
  	 function new_company()
  {
  	var rowCount = $('#package_data tr').length;
    var form =$("#company_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Company/AddCompany/"+rowCount,
      data:form.serialize(),
      success: function(response){
       $("#response").html(response);
       $("#company_form")[0].reset();
         
      }
    });
  }
  
  function update_company(rowno,id)
  {
    //alert(id);
    var form =$("#company_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Company/UpdateCompany/"+id/rowno,
      data:form.serialize(),
      success: function(response){
      	$("#response").html(response);
      // alertify.success(response);
        //history.back();
      }
    });
  }
  
 
    
 function delete_company(id){

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Company/DeleteCompany/"+id,
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