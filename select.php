<?php 
     session_start();
 if(isset($_POST["task_id"]))  
 {  
      $output = '';  
      include('connect.php'); 
      $hey = $_SESSION['username'];
      $query = "SELECT * FROM task WHERE username = '$hey' and taskid = '".$_POST["task_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
            <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Task</label></td>  
                     <td width="70%">'.$row["tname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Description</label></td>  
                     <td width="70%">'.$row["detail"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Deadline</label></td>  
                     <td width="70%">'.$row["deadline"].'</td>  
                </tr> 
                ';  
      }  
      $output .= '</table><button type="submit" class="btn btn-primary" name="editbutton"><img src="https://cdn2.iconfinder.com/data/icons/apple-classic/100/Apple_classic_10Icon_5px_grid-04-512.png"></button> 
      </div>';  
      echo $output; 
      
 }  
