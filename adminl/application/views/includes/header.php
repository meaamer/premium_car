<?php 
        if($this->session->userdata('userid')=="")
        {
             redirect(base_url('Users/Login'));
        }
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">

 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css')?>">
    

  
  <!-- alertify css -->
<link href="<?php echo base_url('assets/alertify/css/alertify.css');?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/alertify/css/alertify.min.css');?>" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url('assets/alertify/css/themes/default.min.css');?>">
<!--datatable css-->
<link rel="stylesheet" href="<?php echo base_url('assets/DataTables/datatables.min.css')?>">

<!-- jQuery 3 -->
<script src="<?php echo  base_url('assets/bower_components/jquery/dist/jquery.min.js');?>">
</script>
<script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
<script src="<?php echo base_url();?>assets/fcmdsys.js"></script>
<script src="<?php echo base_url();?>assets/firebase-messaging-sw.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PCR</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Premium</b>Cars</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url();?>Booking/index" class="dropdown-toggle">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger" style="visibility: none;"></span>
            </a>
          </li>
          	
        	
          	
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('Users/Logout');?>" class="btn btn-primary"><b>Logout</b></a>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
 <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(["init", {
                appId: "788524a2-4a36-4100-af81-7ac91fb39a62",
                subdomainName: 'thepremiumcars',
                autoRegister: true,
                promptOptions: {
                    /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                    /* actionMessage limited to 90 characters */
                    actionMessage: "We'd like to show you notifications for the latest news.",
                    /* acceptButtonText limited to 15 characters */
                    acceptButtonText: "ALLOW",
                    /* cancelButtonText limited to 15 characters */
                    cancelButtonText: "NO THANKS"
                }
            }]);
        </script>
        <script>
        
            function subscribe() {
                // OneSignal.push(["registerForPushNotifications"]);
                OneSignal.push(["registerForPushNotifications"]);
                event.preventDefault();
            }
            function unsubscribe(){
                OneSignal.setSubscription(true);
            }
			
            var OneSignal = OneSignal || [];
            OneSignal.push(function() {
                /* These examples are all valid */
                // Occurs when the user's subscription changes to a new value.
                OneSignal.on('subscriptionChange', function (isSubscribed) {
                    console.log("The user's subscription state is now:", isSubscribed);
                    OneSignal.sendTag("user_id","4444", function(tagsSent)
                    {
                        // Callback called when tags have finished sending
                        console.log("Tags have finished sending!");
                    });
                });
				OneSignal.on('notificationDisplay', function (event) {
					console.warn('OneSignal notification displayed:', event);
					////// CALL YOU INCREMENT FUNCTION //////////////////
				  	NotifyBooking();
				  
				  
				});
                var isPushSupported = OneSignal.isPushNotificationsSupported();
                if (isPushSupported)
                {
                    // Push notifications are supported
                    OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
                    {
                        if (isEnabled)
                        {
                            console.log("Push notifications are enabled!");

                        } else {
                            OneSignal.showHttpPrompt();
                            console.log("Push notifications are not enabled yet.");
                        }
                    });

                } else {
                    console.log("Push notifications are not supported.");
                }
            });
			

        </script> 
        
        
        <script type="text/javascript">
        	function NotifyBooking(){
				var value =$('#notify_booking').html();
					if(value != null){
						value++;
						$('#notify_booking').html(value);
						$('#notify_booking').css("visibility", "visible");
					}
				}
        </script>        