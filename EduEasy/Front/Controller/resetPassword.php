<?php

include_once "../config.php";
include_once '../Controller\UserC.php';
include_once '../Model\User.php';
include_once 'loginControl.php';

$userId = $_POST['userId'];
$email = $_POST['email'];

$searchSTU = "STU";
$searchTEA = "TEA";
$searchADM = "ADM";

if(preg_match("/{$searchSTU}/i", $userId))
    $user = checkStudent($userId);
else if(preg_match("/{$searchTEA}/i", $userId))
    $user = checkteacher($userId);   
else if(preg_match("/{$searchADM}/i", $userId))
    $user = checkAdministrator($userId);
    
if($user == NULL)
    header("location:../View/resetPassword.html?error=1");
else if($user != NULL && $email!=$user['email'])
    header("location:../View/resetPassword.html?error=1");    
else if($user != NULL && $email==$user['email']){
    $uncryptedPassword = password_hash('resetpassword',PASSWORD_DEFAULT);
    $cryptedPassword = password_hash($uncryptedPassword,PASSWORD_DEFAULT);
    
    if(preg_match("/{$searchSTU}/i", $userId)){
        $control = new StudentC();
        $control->updateStudentPassword($cryptedPassword,$user['userId']);
    }
    else if(preg_match("/{$searchTEA}/i", $userId)){
        $control = new TeacherC();
        $control->updateTeacherPassword($cryptedPassword,$user['userId']);
    }   
    else if(preg_match("/{$searchADM}/i", $userId)){
        $control = new AdministratorC();
        $control->updateAdministratorPassword($cryptedPassword,$user['userId']);
    }

    $message = "Dear ";
    $message .= $user['userName'];
    $message .= " , You have succesfully undergone the procedure to reset your password. Your new password is: ";
    $message.= $uncryptedPassword;
    $message .= ". Use it to login to your EduEasy account.";
    mail($user['email'],"Recover your EduEasy Account's password",$message,"From:miguelonana1234@gmail.com");
    header("location:../View/login.html?error=2");
}

?>