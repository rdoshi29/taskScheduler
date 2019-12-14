<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first!";
  	header('location: register.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Task Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="jumbotron" style="height: 180px; width: 100%; margin-top: 10px; padding: 2rem 2rem;">
    <h2>Task Scheduler</h2>      
    <p>A website that helps you prioritize your tasks.</p>
  <div class="dropdown" style="float: right;">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
    <img src="https://icon-library.net/images/user-icon-image/user-icon-image-21.jpg">
    </button>
    <div class="dropdown-menu">
    <p class="dropdown-item"><strong><?php echo $_SESSION['username']; ?></strong></p>
      <a class="dropdown-item" href="index.php?logout='1'">Logout</a>
    </div>
  </div>
  </div>
<div class="row">
    <div class="column" style="border: 1px solid #ffffff; background: #ffb3ba;">
        <p> DO IT NOW! </P>
    </div>
    <div class="column" style="border: 1px solid #ffffff; background: #ffffba;">
        <p> PLAN IT NOW! </P>
    </div>
</div>
<br>
<div class="row">
    <div class="column" style="border: 1px solid #ffffff; background: #baffc9;">
        <p> DO NOT FORGET! </P>
    </div>
    <div class="column" style="border: 1px solid #ffffff; background: #bae1ff;">
        <p> PERIODIC TASKS! </P>
    </div>
</div>
<br>
<div class="jumbotron" style="border: 1px solid #ffffff; background: #ffdfba;">
    <p> COMPLETED TASKS </p>
</div>
</div>
</body>
</html>