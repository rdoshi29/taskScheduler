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
<div class="container" style="opacity: 0.8;">
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
    <div class="column" style="border: 10px solid #ffffff; background: #ffb3ba;">
        <p> DO IT NOW! </P>
        <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='1' order by date(deadline)";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        if ($result->num_rows > 0) {
          echo "<table class='table table-hover table-bordered'>
          <thead>
            <tr>
              <th scope='col'>#</th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
            while($row = $result->fetch_assoc()) {
                
                    echo"<tr><th scope='row'>".$row["taskid"]."</th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
            echo "</tbody></table>";
        }else {
            echo "0 results";
        }
        $conn -> close();
      ?>
    </div>
    <div class="column" style="border: 10px solid #ffffff; background: #ffffba;">
        <p> PLAN IT NOW! </p>
        <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='2' order by date(deadline)";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        if ($result->num_rows > 0) {
          echo "<table class='table table-hover table-bordered'>
          <thead>
            <tr>
              <th scope='col'>#</th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
            while($row = $result->fetch_assoc()) {
                
                    echo"<tr><th scope='row'>".$row["taskid"]."</th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
            echo "</tbody></table>";
        }else {
            echo "0 results";
        }
        $conn -> close();
      ?>
    </div>
</div>
<br>
<div class="row">
    <div class="column" style="border: 10px solid #ffffff; background: #baffc9;">
        <p> DO NOT FORGET! </p>
        <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='3' order by date(deadline);";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        if ($result->num_rows > 0) {
          echo "<table class='table table-striped table-hover'>
          <thead class='thead-light'>
            <tr>
              <th scope='col'>#</th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
            while($row = $result->fetch_assoc()) {
                
                    echo"<tr>
                      <th scope='row'>".$row["taskid"]."</th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
            echo "</tbody></table>";
        }else {
            echo "0 results";
        }
        $conn -> close();
      ?>
    </div>
    <div class="column" style="border: 10px solid #ffffff; background: #bae1ff;">
        <p> PERIODIC TASKS! </p>
        <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='4' order by date(deadline);";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        if ($result->num_rows > 0) {
          echo "<table class='table table-striped table-hover'>
          <thead class='thead-light'>
            <tr>
              <th scope='col'>#</th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
            while($row = $result->fetch_assoc()) {
                
                    echo"<tr>
                      <th scope='row'>".$row["taskid"]."</th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
            echo "</tbody></table>";
        }else {
            echo "0 results";
        }
        $conn -> close();
      ?>
    </div>
</div>
<br>
<div class="jumbotron" style="border: 1px solid #ffffff; background: #ffdfba;">
    <p> COMPLETED TASKS </p>
    <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and deadline < CURRENT_DATE order by date(deadline) DESC;";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        if ($result->num_rows > 0) {
          echo "<div class='table-responsive'><table class='table table-striped table-fixed table-hover'>
          <thead class='thead-light'>
            <tr>
              <th scope='row'>#</th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
            while($row = $result->fetch_assoc()) {
                
                    echo"<tr>
                      <th scope='row'>".$row["taskid"]."</th><td scope='col'>".$row["tname"]."</td><td scope='col'>".$row["deadline"]."</td></tr>";
            }
            echo "</tbody></table></div>";
        }else {
            echo "0 results";
        }
        $conn -> close();
      ?>
</div>
</div>
</body>
</html>
