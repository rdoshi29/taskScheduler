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
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Jura" />

</head>
<body>
<div>
<div class="jumbotron" style="height: 180px; width: 100%; margin-top: 10px; padding: 2rem 2rem; opcaity: 0.8;">
    <h2>Task Scheduler</h2>      
    <p>A website that helps you prioritize your tasks.</p>
	<button type="submit" class="btn btn-secondary" name="addbutton" onclick="location.href = 'add.php';" style="border:0px;margin-left: 25px; margin-top: 0px;"><img src="https://img.icons8.com/cotton/2x/plus.png"></button>
 
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
<div class="flex-container">

    <div style="border: 1px solid #ffffff; background: #ffb3ba; overflow-y: scroll; height: 300px; width: 550px; opacity: 0.8;" class='table-responsive'>
    <?php
        include('connect.php');
        #$sql = "SELECT taskid FROM task where username='$hey' order by label ASC, date(deadline) ASC"
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='1' and done=0 order by date(deadline)";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        echo "<table class='table table-hover table-fixed'>
          <thead>
            <tr>
              <th scope='col'> # </th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo"<tr><th scope='row'><button type='button' class='btn btn-default view_data' data-toggle='modal' data-target='#modal1' id=".$row['taskid']."><img src='https://image.flaticon.com/icons/png/512/84/84380.png'></button></th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
        } 
 
        echo "</tbody></table>";
        $conn -> close();
      ?>
    </div>
    <div style="border: 1px solid #ffffff; background: #ffffba; overflow-y: scroll; height: 300px; width: 550px; opacity: 0.8;" class='table-responsive'>
    <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='2' and done=0 order by date(deadline)";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        echo "<table class='table table-hover table-fixed'>
          <thead>
            <tr>
              <th scope='col'> # </th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo"<tr><th scope='row'><button type='button' class='btn btn-default view_data' data-toggle='modal' data-target='#modal1' id=".$row['taskid']."><img src='https://image.flaticon.com/icons/png/512/84/84380.png'></button></th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
        }
        echo "</tbody></table>";
        $conn -> close();
      ?>
    </div>
    <div style="border: 1px solid #ffffff; background: #baffc9; overflow-y: scroll; height: 300px; width: 550px; opacity: 0.8;" class='table-responsive'>
    <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='3' and done=0 order by date(deadline)";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        echo "<table class='table table-hover table-fixed'>
          <thead>
            <tr>
              <th scope='col'> # </th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo"<tr><th scope='row'><button type='button' class='btn btn-default view_data' data-toggle='modal' data-target='#modal1' id=".$row['taskid']."><img src='https://image.flaticon.com/icons/png/512/84/84380.png'></button></th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
        }
        echo "</tbody></table>";
        $conn -> close();
      ?>
    </div>
    <div style="border: 1px solid #ffffff; background: #bae1ff; overflow-y: scroll; height: 300px; width: 550px; opacity: 0.8;" class='table-responsive'>
    <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and label='4' and done=0 order by date(deadline)";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        echo "<table class='table table-hover table-fixed'>
          <thead>
            <tr>
              <th scope='col'> # </th>
              <th scope='col'>TASK</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo"<tr><th scope='row'><button type='button' class='btn btn-default view_data' data-toggle='modal' data-target='#modal1' id=".$row['taskid']."><img src='https://image.flaticon.com/icons/png/512/84/84380.png'></button></th><td>".$row["tname"]."</td><td>".$row["deadline"]."</td></tr>";
            }
        }
        echo "</tbody></table>";
        $conn -> close();
      ?>
    </div>
<div style="border: 1px solid #ffffff; background: #ffdfba; width: 1100px; overflow-y: scroll; height: 300px; opacity: 0.8;" class="table-responsive">
<p class="lead">
  Completed tasks 
</p>
    <?php
        include('connect.php');
        $hey=$_SESSION['username'];
        $sql = "SELECT * FROM task where username='$hey' and done=1 order by date(deadline) DESC;";
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        echo "<table class='table table-hover table-fixed'>
          <thead>
            <tr>
              <th scope='col'>TASK</th>
              <th scope='col'>DESCRIPTION</th>
              <th scope='col'>DEADLINE</th>
            </tr>
          </thead><tbody>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo"<tr><td>".$row["tname"]."</td><td>".$row["detail"]."</td><td>".$row["deadline"]."</td></tr>";
            }
        }
        echo "</tbody></table>";
        $conn -> close();
      ?>
</div>
</div>
  <div id="modal1" class="modal fade">  
      <div class="modal-dialog">  
          <div class="modal-content">  
                <div class="modal-header">    
                    <h4 class="modal-title">Task details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="task_detail">

                </div> 
          </div>             
      </div>  
  </div>  
</div> 
</body>

</html>

 
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var task_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{task_id:task_id},  
                success:function(data){  
                     $('#task_detail').html(data);  
                     $('#modal1').modal("show");  
                }  
           });  
      });  
 });
 </script>
