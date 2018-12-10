<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAidy6_mCUYIDe90UtEvoNWnwzmhU3HoQ&libraries=places"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
          	<?php if ( isset($rows) ): ?>
            Update Vendor Details
        <?php else: ?>
           Add Vendor Details 
        <?php endif ?>
          </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form id="vendor_form">
            
            <div class="row">
             <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="v_name" placeholder="Vendor Name" 
                value="<?php if( isset($rows) ){echo $rows['vendor_name'];}?>">
              </div>
              <br>
			</div>
			<div class="col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" 
            value="<?php if( isset($rows) ){echo $rows['vendor_person_name'];}?>">
              </div>
              <br>
              </div>
		</div>
		 <div class="row">
             <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="v_username" placeholder="Username" 
                value="<?php if( isset($rows) ){echo $rows['vendor_username'];}  ?>">
                
              </div>
				<br>
             </div>
			
             <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control" name="v_password" placeholder="Password"
                value="<?php if( isset($rows) ){echo $rows['vendor_password'];}?>">
              </div>
              <br>
              </div>
              </div>
              
               <div class="row">
             <div class="col-md-6">
               <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>					</span>
                <input type="text" class="form-control" name="v_contact" placeholder="Contact Number"
                value="<?php if( isset($rows) ){echo $rows['vendor_contact_no'];}?>">
              </div>
              <br>
               </div>
             <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i>					</span>
                <input type="text" class="form-control geocomplete" name="v_city" placeholder="City Name"
                value="<?php if( isset($rows) ){echo $rows['vendor_city'];}?>">
              </div>
              <br>
		</div>
		</div>
              

              

             

             
         
             
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
        
      
                  
              
                <!-- /.col-lg-6 -->
               
                <?php if (isset($rows)): ?>
    				
    				<button type="button" class="btn btn-primary pull-right"
    				 onclick="update_vendor(<?php echo $rows['vendor_id'];?>);"> Update</button>
                 
                <?php else: ?>
                
                		<button type="button" class="btn btn-primary pull-right" 
                		onclick="new_vendor();">Add</button>
                <?php endif ?>	
                </form>  
        
        </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <!-- ######################################################################################### -->

  
  <script>
  /* pass new comany details to controller*/
  
  	 function new_vendor()
  {
  	
    var form =$("#vendor_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Vendor/AddVendor",
      data:form.serialize(),
      success: function(response){
       alertify.success(response);
       $("#vendor_form")[0].reset();
         
      }
    });
  }
  
  function update_vendor(id){
	 var form =$("#vendor_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Vendor/UpdateVendor/"+id,
      data:form.serialize(),
      success: function(response){
      	//$('#error').html(response);
       alertify.success(response);
        //history.back();
      }
    });
  }
  
  $(function(){
        
        $(".geocomplete").geocomplete({country: 'IN'})
          .bind("geocode:result", function(event, result){
            $.log("Result: " + result.formatted_address);
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });
        
        $("#find").click(function(){
          $(".geocomplete").trigger("geocode");
        });
        
        
        $("#examples a").click(function(){
          $(".geocomplete").val($(this).text()).trigger("geocode");
          return false;
        });
        
      });
  
  </script>
  
 <script src="<?php echo  base_url();?>assets/plugins/jquery.geocomplete.min.js">
</script> 
  