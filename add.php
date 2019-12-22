<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<?php 
     session_start();
 if(isset($_POST["label"]))  
 {    
      include('connect.php'); 
      $hey = $_SESSION['username'];
      $label = $_POST['label'];
      
  } 
?>
                    <form action="index.php" method="post" style="width: 100%;">
                    <p style="margin-left: 15px; margin-right: 15px; margin-top: 0px; margin-bottom: 0px;">Task Name</p>
                    <div class="input-group">
                      <input type="text" style="width: 75%; border-top-left-radius: 5px;    border-bottom-left-radius: 5px; height: 50px; margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px;" id="taskname" class="form-control validate" name="task">
                    </div>
                    <p style="margin-left: 15px; margin-right: 15px; margin-top: 0px; margin-bottom: 0px;">Deadline</p>
                    <div class="input-group">
                      <input type="date" style="width: 75%; border-top-left-radius: 5px;    border-bottom-left-radius: 5px; height: 50px; margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px;" id="deadline" class="form-control validate" name="deadline">
                    </div>
                    <p style="margin-left: 15px; margin-right: 15px; margin-top: 0px; margin-bottom: 0px;">Description</p>
                    <div class="input-group">
                      <textarea style="width: 75%; border-top-left-radius: 5px;    border-bottom-left-radius: 5px; height: 150px; margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px;" rows="3" id="detail" class="form-control validate" name="detail"></textarea>
                    </div>
                    <div class="input-group">
                    <input type="hidden" name="label" value="<?php echo $label; ?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                  <div class="d-flex">
                    <button type="submit" name="insert" class="btn btn-info"><img src="https://cdn2.iconfinder.com/data/icons/web-application-icons-part-2/100/Artboard_73-512.png"></button>
                  </div>
                  </div>  

                </div>
                </form>   
