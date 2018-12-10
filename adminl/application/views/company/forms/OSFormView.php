<div class="content-wrapper">
 	<section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
          	 		<?php if ( isset($rows) ): ?>
            		Update Outstation Tariff Details 
        			<?php else: ?>
          			 Add Outstation Tariff Details 
        			<?php endif ?>
          </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool"
             data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool"
             data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          
        </div>
        <div class="box-body">
         
             <form id="os_form">
            
              		<div class="row">
            <div class="col-md-6">
            <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-building" aria-hidden="true">
        		</i></span>
        		
               <select class="form-control" name="company_id" id="company_id" onchange="GetCabs();">
               
               <option value="<?php if( isset($rows) ) {echo $rows['company_id'];}?>" 
               	selected="" <?php if( !isset($rows) ) {echo "disabled";}?>>
            <?php if ( isset($rows) ){ echo $rows['company_name'];}else{echo "Select your Company";}?>
               	</option>
               
               	<?php if ( !empty($companies) ): ?>
				<?php foreach ($companies as $company): ?>
				
					<option value="<?php echo $company['company_id']?>">
					<?php echo $company['company_name'];?>
					</option>
				<?php endforeach ?>
				<?php endif ?>
               	
               
               </select>
              </div>
              <br>
              </div>
              
              <div class="col-md-6">
              	<div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true">
        		</i></span>
        		
               <select class="form-control" name="cab_id" id="cab_id" onchange="GetCabs();">
              
               
               
               	<option value="<?php if( isset($rows) ) {echo $rows['cab_id'];}?>" 
               	selected="" <?php if( !isset($rows) ) {echo "disabled";}?>>
               	<?php if ( isset($rows) ){ echo $rows['cab_name'];}else{echo "Select your Cab";}?>
               	</option>
               	
               
               
               	<?php if ( !empty($cabs) ): ?>
				<?php foreach ($cabs as $cab): ?>
					<option value="<?php echo $cab['cab_id']?>"><?php echo $cab['cab_name'];?>
					</option>
				<?php endforeach ?>
				<?php endif ?>
               	
               
               </select>
              </div>
              <br>
              </div>
              </div>
              
					<div class="row">
					<div class="col-md-6">
              			<div class="input-group">
        				<span class="input-group-addon"><i class="fa fa-rupee" aria-hidden="true">
        				</i></span>
            			<input type="number" class="form-control" 
            			placeholder="Outstation Per Kilometer" name="os_per_km" 
            		value="<?php if( isset($rows) ){echo $rows['outstation_per_kilometer'];}?>">
              			</div><br>
					</div>
					
					
            		<div class="col-md-6">  
				 		<div class="input-group">
        		 		<span class="input-group-addon"><i class="fa fa-rupee" aria-hidden="true">
        		 		</i></span>
                 	<input type="number" class="form-control" placeholder="Extra Per Kilometer" 
            	 		name="extra_per_km" 
				 		value="<?php if( isset($rows) ){echo $rows['extra_per_kilometer'];}?>">
              			</div><br>
            		 </div> 
             		</div>
             
             <div class="row">
			<div class="col-md-6">

               <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-rupee" aria-hidden="true">
        		</i></span>
            <input type="number" class="form-control" placeholder="Average Per Kilometer" 
            name="avg_per_km" value="<?php if( isset($rows) ){echo $rows['average_per_kilometer'];}?>">
              </div>
              <br>
             </div>
             <div class="col-md-6"> 
                <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true">
        		</i></span>
            <input type="number" class="form-control" placeholder="Driver Charges" 
            name="driver_chrages" value="<?php if( isset($rows) ){echo $rows['driver_charges'];}?>">
              </div>
              <br>
             </div>
             </div>

              

              

             

              
                

              
                
         
             
        </div></<div>

        <!-- /.box-body -->
        <div class="box-footer">
        <?php if (isset($rows)): ?>
    				
    				<button type="button" class="btn btn-primary pull-right" 
    				onclick="update_outstation(<?php echo $rows['company_outstation_id'];?>);">
    				 Update</button>
                 
                <?php else: ?>
                
                		<button type="button" class="btn btn-primary pull-right" 
                		onclick="new_outstation();">Add</button>
                <?php endif ?>	
                </form>
                <div id="error"></div>
       
        <div id="error"></div>
        </div><!-- /.box-footer-->
        
         
      </div>
      <!-- /.box -->
      <!--#######cab and company pricing details come here###########-->
     
     <section class="content" id="tableResponse">
      
    </section>
     <!--#####end her#######-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






  
  <!-- ######################################################################################### -->
 
  
  
  <script>
  
  /***Function for Geting cabs priceing and Company priceing****/
  
  function GetCabs(){
  	var comp_id =$('#company_id').val();
  	var cab_id =$('#cab_id').val();
  	//alert(comp_id);
  	if(comp_id==null){
		comp_id="";
	}
	if(cab_id==null){
		cab_id="";
	}
	
  	$.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CompanyPricing/GetOSPricing",
      data:{cab_id:cab_id,comp_id:comp_id},
      success: function(response){
      	$('#tableResponse').html(response);
      //alertify.success();
       // history.back();
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
  
  
   /***Function for Geting cabs and Company****/
  
  function GetCabs(){
  	var comp_id =$('#company_id').val();
  	var cab_id =$('#cab_id').val();
  	//alert(comp_id);
  	if(comp_id==null){
		comp_id="";
	}
	if(cab_id==null){
		cab_id="";
	}
	
  	$.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CompanyPricing/GetOSPricing",
      data:{cab_id:cab_id,comp_id:comp_id},
      success: function(response){
      	$('#tableResponse').html(response);
      //alertify.success();
       // history.back();
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
  
  /* pass new comany details to controller*/
  
  	 function new_outstation()
  {
  	
    var form =$("#os_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CompanyPricing/AddOS",
      data:form.serialize(),
      success: function(response){
	       alertify.success(response);
	       $("#os_form")[0].reset();
         
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
  function update_outstation(id)
  {
    //alert(id);
    var form =$("#os_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CompanyPricing/UpdateOS/"+id,
      data:form.serialize(),
      success: function(response){
      	//$('#error').html(response);
       alertify.success(response);
        history.back();
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
  function delete_OS(id){

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>CompanyPricing/DeleteOS/"+id,
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