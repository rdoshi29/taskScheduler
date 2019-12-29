<?php
include('connect.php');
$sql = "SELECT tname, detail, email, deadline, task.username FROM task, registration where deadline = CURRENT_DATE+1 and task.username = registration.username;";
$result = mysqli_query($conn, $sql);
require 'PHPMailerAutoload.php';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'yahaemailid';                 // SMTP username
        $mail->Password = 'yahapassword';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        
        $mail->setFrom('yahaemailid', 'Planning Buddy');
        $mail->addAddress($row['email']);     // Add a recipient
        
        $mail->Subject = "Reminder for ".$row['tname'];
        $mail->Body    = "Hello ".$row['username'].",<br>You have the task".$row['tname']." due today.<br>Task Description: ".$row['detail'];
        $mail->AltBody = "You have the task".$row['tname']." due today.";
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
} 


$sql = "UPDATE task deadline = CURRENT_DATE+7 where label=4";
$result = mysqli_query($conn, $sql);
$conn -> close();
?>
