<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Jura" />

</head>
<?php 
     session_start();
 if(isset($_POST["task_id"]))  
 {    
      include('connect.php'); 
      $hey = $_SESSION['username'];
      $query = "SELECT * FROM task WHERE username = '$hey' and taskid = '".$_POST["task_id"]."'";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
          $task_name = $row['tname'];
          $deadline = $row['deadline'];
          $detail = $row['detail'];
          $taskno = $row['taskid'];
      }  
  } 
?>
        <form action="select.php" method="post" style="width: 100%;">
        <p style="margin-left: 15px; margin-right: 15px; margin-top: 0px; margin-bottom: 0px;">Task Name</p>
        <div class="input-group">
          <input type="text" style="width: 75%; border-top-left-radius: 5px;    border-bottom-left-radius: 5px; height: 50px; margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px;" id="taskname" class="form-control validate" name="task" value="<?php echo $task_name; ?>">
        </div>
        <p style="margin-left: 15px; margin-right: 15px; margin-top: 0px; margin-bottom: 0px;">Deadline</p>
        <div class="input-group">
          <input type="date" style="width: 75%; border-top-left-radius: 5px;    border-bottom-left-radius: 5px; height: 50px; margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px;" id="deadline" class="form-control validate" name="deadline" value="<?php echo $deadline; ?>">
        </div>
        <p style="margin-left: 15px; margin-right: 15px; margin-top: 0px; margin-bottom: 0px;">Description</p>
        <div class="input-group">
          <textarea style="width: 75%; border-top-left-radius: 5px;    border-bottom-left-radius: 5px; height: 150px; margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px;" rows="3" id="detail" class="form-control validate" name="detail" value="<?php echo $detail; ?>"></textarea>
        </div>
        <div class="input-group">
        <input type="hidden" value="<?php echo $taskno; ?>" name="taskno">
        </div>
      </div>
      <div class="modal-footer">
      <div class="d-flex">
        <button type="submit" name="done" class="btn btn-success"><img src="https://cdn3.iconfinder.com/data/icons/basic-ui-6/40/Asset_35-512.png"></button>
      </div>
      <div class="d-flex">
        <button type="submit" name="save" class="btn btn-info"><img src="https://cdn2.iconfinder.com/data/icons/web-application-icons-part-2/100/Artboard_73-512.png"></button>
      </div>
      <div class="d-flex">
        <button type="submit" class="btn btn-danger" name="deletebutton"><img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/delete-1432400-1211078.png"></button> 
      </div>  
      </div>
    </div>
    </form>
    <?php
if (isset($_POST['save'])) {
    $ti=$_POST["taskno"];
    $tn=$_POST["task"];
    $dl=$_POST["deadline"];
    $td=$_POST["detail"];
    include('connect.php');
    if ($dl == 0000-00-00)
     {
       $dl = date('Y/m/d');
       $dl = date('Y/m/d',strtotime($dl.'+3 days'));
     }
    $sql = "UPDATE task SET tname='$tn',detail='$td',deadline='$dl' WHERE taskid='$ti'";
    if ($conn->query($sql) === TRUE) {
      echo "Updation successfully";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
      header("location: index.php");
  }
  if (isset($_POST['deletebutton'])) {
    $ti=$_POST["taskno"];
    include('connect.php');
    $sql = "Delete from task WHERE taskid='$ti'";
    if ($conn->query($sql) === TRUE) {
      echo "Deletion successfully";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
      header("location: index.php");
  } 
  if (isset($_POST['done'])) {
    $ti=$_POST["taskno"];
    include('connect.php');
    $sql = "UPDATE task SET done=1 WHERE taskid='$ti'";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
      header("location: index.php");
  }
?>
