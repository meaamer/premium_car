

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div class="card-header no-border pb-0">
                <div class="card-title text-xs-center">
                    
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Update your password.</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal" id="update_details" novalidate>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" 
                             placeholder="Current Password" name="current_pass">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>

                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" 
                             placeholder="New Password" name="new_pass">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>

                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" 
                             placeholder="Confirm Password" name="confirm_pass">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="update_password();">
                        	<i class="icon-lock4"></i> Update Password</button>
                    </form>
                </div>
            </div>
            <div class="card-footer no-border">
               <div id="alert"></div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   <br><br><br><br><br><br><br><br><br><br>
   <script>
  function update_password()
  {
  	
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('')?>Login/ResetPassword',
      data:$("#update_details").serialize(),
      success:function(response)
      {
        $("#alert").html(response);
      }
    });
  }
</script>
