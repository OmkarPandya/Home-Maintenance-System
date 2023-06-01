<?php
// $receiver = "kinal.k@ahduni.edu.in";
$subject = "Project Test 1";
$body = "Hi, there...This is a test email send from homemaintenance2024@gmail.com.";
$sender = "From:homemaintenance2024@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>