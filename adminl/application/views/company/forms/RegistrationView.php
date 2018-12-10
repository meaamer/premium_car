
 <!--RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR-->
 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-7">
    <section class="content-header">
      <h1>
        <h1>
       <?php if ( isset($rows) ): ?> Update Company Details
          <?php else: ?>Add Company Details <?php endif ?>
        
      </h1>
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>
    </div>
	</div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-2"></div>
        <div class="col-md-7">
         



          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-header with-border">
             
            </div>
            <div class="box-body">
              

              
				 <form id="company_form">
            	
        
           
              <div class="input-group">
              	
                <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="c_name" placeholder="Company Name" 
                value="<?php if( isset($rows) ){echo $rows['company_name'];}?>">
              </div>
              <br>
			
			
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" 
            value="<?php if( isset($rows) ){echo $rows['company_person_name'];}?>">
              </div>
              <br>
			
			
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="c_username" placeholder="Username" 
                value="<?php if( isset($rows) ){echo $rows['company_username'];}  ?>">
                
              </div>
				<br>
             
			
			
			
		
			
		
              
           
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control" name="c_password" placeholder="Password"
                value="<?php if( isset($rows) ){echo $rows['company_password'];}?>">
              </div>
              <br>
              
               <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>					</span>
                <input type="text" class="form-control" name="c_contact" placeholder="Contact Number"
                value="<?php if( isset($rows) ){echo $rows['company_contact_no'];}?>">
              </div>
              <br>
            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i>					</span>
                <input type="text" class="form-control" name="c_city" placeholder="City Name"
                value="<?php if( isset($rows) ){echo $rows['company_city'];}?>">
              </div>
              <br>
			<?php if (isset($rows)): ?>
				<button type="button" class="btn btn-primary pull-right"
				onclick="update_company(<?php echo $rows['company_id'];?>);"> Update
				</button>
                 
                <?php else: ?>
               
                	<button type="button" class="btn btn-primary pull-right" onclick="new_company();">
                		Add</button>
                <?php endif ?>	
                </form>
                <div id="response" style="width:30%;font-size:12px;"></div>
          </div>
    				
    			
          		
             


            

            
             
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 
 
  <script>
  
 
  /* pass new comany details to controller*/
  
  	 function new_company()
  {
  	
    var form =$("#company_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Company/AddCompany",
      data:form.serialize(),
      success: function(response){
       $("#response").html(response);
       //$("#company_form")[0].reset();
         
      }
    });
  }
  
  function update_company(id)
  {
    //alert(id);
    var form =$("#company_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Company/UpdateCompany/"+id,
      data:form.serialize(),
      success: function(response){
      	$("#response").html(response);
      // alertify.success(response);
        
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