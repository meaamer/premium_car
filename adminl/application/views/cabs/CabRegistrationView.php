
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-7">
    <section class="content-header">
      <h1>
      <?php if ( isset($rows) ): ?>
            Update Cab Details
        <?php else: ?>
           Add Cab Details 
        <?php endif ?>
        
        
      </h1>
     
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
              <h3 class="box-title"></h3>
            </div>
            
            <div class="box-body">
            
            <form id="cab_form" enctype="multipart/form-data">
            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cab" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="cab_name" placeholder="Cab Name" 
                value="<?php if( isset($rows) ){echo $rows['cab_name'];}?>">
              </div>
              <br>

              <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-audio-description" aria-hidden="true"></i></span>
            <textarea class="form-control" cols="3" name="cab_des"><?php if( isset($rows) )
            {echo $rows['cab_description'];}?></textarea>
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-image-o" aria-hidden="true">
                </i></span>
                <input type="file" class="form-control" name="cab_img">
              </div>
				<br>
             

              <div class="row">
                <div class="col-lg-10">
                  
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-2">
                <?php if (isset($rows)): ?>
    				
    				<button type="button" class="btn btn-success" style="background-color:#00C0EF;
    				border-color: #00C0EF;" onclick="update_cab(<?php echo $rows['cab_id'];?>);"> Update</button>
                 
                <?php else: ?>
                
                		<button type="button" class="btn btn-success"  style="background-color: #00C0EF;
                		border-color: #00C0EF;" onclick="new_cab();">Submit</button>
                <?php endif ?>	
                </form>
                </div>
                <!-- /.col-lg-6 -->
              </div>
              <!-- /.row -->

       
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <script>

function new_cab(){
    
    if (typeof FormData !== 'undefined'){
        var formData = new FormData( $("#cab_form")[0] );
    $.ajax({
            url :'<?php echo base_url();?>Cabs/AddCab',  // Controller URL
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false, 
            success: function(data){
            alertify.error(data);
            $('#cab_form')[0].reset();
        },
    });
    } 
}


function update_cab(id){
   
    if (typeof FormData !== 'undefined'){
        var formData = new FormData( $("#cab_form")[0] );
    $.ajax({
            url :'<?php echo base_url();?>Cabs/UpdateCab/'+id,  // Controller URL
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false, 
            success: function(data){
            alertify.error(data);
            history.back();
        },
    });
    } 
}
</script>