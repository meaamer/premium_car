<style type="text/css">
 .error{color: red;}
</style>



<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <section class="flexbox-container">
        <div class="row match-height">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="basic-layout-form-center">Generate Report</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block">
                  <form class="form" name="report" id="report" action="<?php echo base_url() ?>ExcelReport/GetReport" method="post">


                    <div class="form-body">


                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="form-group col-md-10">
                          <label for="eventInput5">Select Booking Type</label>
                          <select class="form-control" name="type"  id="type">
                            <option selected="" disabled="">Select</option>
                            <option value="local">Local</option>
                            <option value="transfer">Transfer</option>
                            <option value="outstation">Outstation</option>
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="form-group col-md-5">
                          <label for="eventInput5">From Date</label>
                          <input type="text" id="date" class="form-control datepicker" name="from_date" placeholder="From Date">
                        </div>

                        <div class="form-group col-md-5">
                          <label for="eventInput5">To Date</label>
                          <input type="text"  class="form-control datepicker" name="to_date" placeholder="To Date">
                        </div>
                      </div>

                    </div>



                    <div class="form-actions center">

                      <button type="submit" class="btn btn-primary pull-right">
                        <i class="icon-check2"></i> Generate
                      </button>
                    </div>
                  </form> 

                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="print"></div>
      </section>

    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<br><br><br><br><br><br><br><br><br><br>
   <script>
// Wait for the DOM to be ready
$(function() {
 
  $("form[name='report']").validate({
   
    rules: {
    
      type: "required"
    },
   
    messages: {
      type: "Please Select Booking Type",
     },
  
    submitHandler: function(form) {
      form.submit();
    }
  });
});



$( function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "dd-mm-yy"
});
  });
  

 
</script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>

