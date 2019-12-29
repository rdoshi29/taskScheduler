<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div style="opacity: 0.8;">
<div class="jumbotron" style="height: auto; width: 100%; margin-top: 10px; padding: 2rem 2rem;">
    <h2>Task Scheduler</h2>      
    <p>A website that helps you prioritize your tasks.</p>
  </div>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
    
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><img src="https://cdn3.iconfinder.com/data/icons/email-51/48/25-512.png"></span>
    </div>
    <input style="border-top-left-radius: 5px;    border-bottom-left-radius: 5px;    height: auto;" type="text" name="email" placeholder=" Email " class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/phone-512.png"></span>
    </div>
    <input style="border-top-left-radius: 5px;    border-bottom-left-radius: 5px;    height: auto;" type="text" name="phone" placeholder=" Phone " class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><img src="https://image.flaticon.com/icons/png/512/44/44948.png"></span>
    </div>
    <input style="border-top-left-radius: 5px;    border-bottom-left-radius: 5px;    height: auto;" type="text" name="username" placeholder=" Username " class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><img src="https://image.flaticon.com/icons/png/512/52/52840.png"></span>
    </div>
    <input style="border-top-left-radius: 5px;    border-bottom-left-radius: 5px;    height: auto;" type="password" name="password_1" placeholder=" Password " class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><img src="https://image.flaticon.com/icons/png/512/52/52840.png"></span>
    </div>
    <input style="border-top-left-radius: 5px;    border-bottom-left-radius: 5px;    height: auto;" type="password" name="password_2" placeholder=" Confirm password " class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>

</div>
</body>
</html>