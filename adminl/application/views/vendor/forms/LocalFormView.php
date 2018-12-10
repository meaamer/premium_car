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
            Update Local Tariff Details 
        <?php else: ?>
           Add Local Tariff Details 
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
         <form id="local_form">
            
            <div class="row">
			<div class="col-md-4">
              <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true">
        		</i></span>
        		
               
               <select class="form-control" name="vendor_id" id="vendor_id" onchange="GetCabs();">
               <option value="<?php if( isset($rows) ) {echo $rows['vendor_id'];}?>" 
               	selected="" <?php if( !isset($rows) ) {echo "disabled";}?>>
               	<?php if ( isset($rows) ){ echo $rows['vendor_name'];}else{echo "Select your vendor";}?>
               	</option>
               
               	<?php if ( !empty($vendors) ): ?>
				<?php foreach ($vendors as $vendor): ?>
				
					<option value="<?php echo $vendor['vendor_id']?>">
					<?php echo $vendor['vendor_name'];?>
					</option>
				<?php endforeach ?>
				<?php endif ?>
               	
               
               </select>
              </div>
              <br>
              </div>
              <div class="col-md-4">
              <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-taxi" aria-hidden="true">
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
              
              <div class="col-md-4">
              <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true">
        		</i></span>
            <input type="text" class="form-control geocomplete" placeholder="City" 
            name="city" value="<?php if(isset($rows)){echo $rows['city'];}?>">
              </div>
              <br>
			</div>
              
              
              </div>
			<div class="row">
			<div class="col-md-6">
              <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-rupee" aria-hidden="true">
        		</i></span>
            <input type="number" class="form-control" placeholder="8 Hourse 80 kilometers Charges" 
            name="fullday" value="<?php if( isset($rows) ){echo $rows['full_day'];}?>">
              </div>
              <br>
			</div>
            <div class="col-md-6">  
				 <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-rupee" aria-hidden="true">
        		</i></span>
            <input type="number" class="form-control" placeholder="4 Hourse 40 kilometers Charges" 
            name="halfday" value="<?php if( isset($rows) ){echo $rows['half_day'];}?>">
              </div>
              <br>
             </div> 
             </div>
             
             <div class="row">
			<div class="col-md-6">

               <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-rupee" aria-hidden="true">
        		</i></span>
            <input type="number" class="form-control" placeholder="Extra Hours Charges" 
            name="extrahour" value="<?php if( isset($rows) ){echo $rows['extra_hours'];}?>">
              </div>
              <br>
             </div>
             <div class="col-md-6"> 
                <div class="input-group">
        		<span class="input-group-addon"><i class="fa fa-road" aria-hidden="true">
        		</i></span>
            <input type="number" class="form-control" placeholder="Extra Kilometer Charges" 
            name="extrakm" value="<?php if( isset($rows) ){echo $rows['extra_kilometer'];}?>">
              </div>
              <br>
             </div>
             </div>

              

              

             

              
             
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
        
        
        
                <?php if (isset($rows)): ?>
    				
    				<button type="button" class="btn btn-primary pull-right" 
    				onclick="update_local_form(<?php echo $rows['vendor_local_id'];?>);">
    				 Update</button>
                 
                <?php else: ?>
                
                		<button type="button" class="btn btn-primary pull-right" 
                		 onclick="add_local_form();">Add</button>
                <?php endif ?>	
                </form>
                <div id="error"></div>
        </div><!-- /.box-footer-->
        
      </div><!-- /.box -->
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
  
  
   /***Function for Geting cabs priceing and vandors****/
  
  function GetCabs(){
  	var vendor_id =$('#vendor_id').val();
  	var cab_id =$('#cab_id').val();
  	//alert(comp_id);
  	if(vendor_id==null){
		vendor_id="";
	}
	if(cab_id==null){
		cab_id="";
	}
	 
  	$.ajax({
      type:"POST",
      url:"<?php echo base_url()?>VendorPricing/GetLocalPricing",
      data:{cab_id:cab_id,vendor_id:vendor_id},
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
  
  	 function add_local_form()
  {
  	
    var form =$("#local_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>VendorPricing/AddLocal",
      data:form.serialize(),
      success: function(response){
	      alertify.success(response);
	      $("#local_form")[0].reset();
         
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
  function update_local_form(id)
  {
    //alert(id);
    var form =$("#local_form");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>VendorPricing/UpdateLocal/"+id,
      data:form.serialize(),
      success: function(response){
      	//$('#error').html(response);
       alertify.success(response);
        //history.back();
      },error: function(xhr, status, error) {
		  console.log(xhr);
		}
    });
  }
  
  
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