 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Companies
        
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
                
                	<th>No</th>
                  <th>Company Name</th>
                  <th>Owner Name</th>
                  <th>Cotact Number</th>
                  <th>City</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
                </thead>
               <!-- <tbody>
                <?php if ( !empty($companies) ): $i=0; ?>
    			<?php foreach ( $companies as $company ): $i++; ?>
        
    				
                <tr id="reload<?php echo $company['company_id'];?>">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $company['company_name']; ?></td>
                  <td><?php echo $company['company_person_name']; ?></td>
                  <td><?php echo $company['company_contact_no']; ?></td>
                  <td><?php echo $company['company_city']; ?></td>
                  <td><?php echo $company['company_username']; ?></td>
                  <td><?php echo $company['company_password']; ?></td>
                  
                  <td onclick="update_company(this);">
                  	<button type="button" class="btn btn-danger" 
                  	onclick="delete_company(<?php echo $company['company_id'];?>);">
                  	<i class="fa fa-trash" aria-hidden="true"></i></button>
                  	
                  	<a href="<?php echo base_url('Company/CompanyList/').$company['company_id'];?>" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
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
  
  


<!--###############################################################################-->
                

  <script>
  
  
  
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
  
                
<script type="text/javascript">
	
$(document).ready(function(){  
      var dataTable = $('#table_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Company/CompanyListX'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[6,7,8],  
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