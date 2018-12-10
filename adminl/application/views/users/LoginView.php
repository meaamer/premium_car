<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Premium Car Rentals</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?php echo base_url('assets/login_style.css'); ?>">

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
</head>

<body>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Admin Login</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form id="send_details">
      <input type="text" placeholder="Username" name="username">
      <input type="password" placeholder="Password" name="password">
      <button type="button" onclick="user_login();">Login</button>
    </form><br>
    <div id="alert"></div>
  </div>
  
  <div class="cta"><a href=""> </a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


   

</body>
</html>


<script>
  function user_login()
  {
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('')?>Users/CheckUserDetail',
      data:$("#send_details").serialize(),
      success:function(response)
      {
        $("#alert").html(response);
      }
    });
  }
</script>