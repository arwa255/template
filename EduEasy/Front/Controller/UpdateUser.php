<?php
include_once "../Controller/UserC.php";
include_once "../Model/User.php";
include_once "../Controller/loginControl.php";

session_start();
if($_SESSION[loggedIn]!= true)
    header('location:login.html');

$searchSTU = "STU";
$searchTEA = "TEA";
$searchADM = "ADM";

// if(preg_match("/{$search}/i", $mystring)) {
//     echo "True"; } else {
//     echo("False");

if(preg_match("/{$searchSTU}/i", $_SESSION['userId'])){

if(isset($_POST['newUsername'])){
    $newUserName = $_POST['newUsername'];
    $userId = $_SESSION['userId'];

    $control = new StudentC();
    $control->updateStudentUserName($newUserName,$userId);
    header("location:../View/studentMyProfile.php");
}

else if(isset($_POST['newEmail'])){
    $newEmail = $_POST['newEmail'];
    $userId = $_SESSION['userId'];

    $control = new StudentC();
    $control->updateStudentEmail($newEmail,$userId);
    header("location:../View/studentMyProfile.php");
}

else if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']) ){
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['confirmPassword'];
    $userId = $_SESSION['userId'];

    
    $student = checkStudent($userId);
    if($student!=NULL){
        
        $cryptedPassword = $student['password'];
    if(password_verify($oldPassword,$cryptedPassword)==false)
        header("Location:../View/studentMyProfile.php?error=3");
    else {
        $control = new StudentC();
        $crytedNewPassword = password_hash($newPassword,PASSWORD_DEFAULT);
        $control->updateStudentPassword($crytedNewPassword,$userId);
        //$_SESSION['loggedIn'] = true;
        header("location:../View/studentMyProfile.php");
    }
    }
}
}


else if(preg_match("/{$searchTEA}/i", $_SESSION['userId'])){

    if(isset($_POST['newUsername'])){
        $newUserName = $_POST['newUsername'];
        $userId = $_SESSION['userId'];
    
        $control = new TeacherC();
        $control->updateTeacherUserName($newUserName,$userId);
        header("location:../View/teacherMyProfile.php");
    }
    
    else if(isset($_POST['newEmail'])){
        $newEmail = $_POST['newEmail'];
        $userId = $_SESSION['userId'];
    
        $control = new TeacherC();
        $control->updateTeacherEmail($newEmail,$userId);
        header("location:../View/teacherMyProfile.php");
    }
    
    else if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']) ){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['confirmPassword'];
        $userId = $_SESSION['userId'];
    
        
        $teacher = checkTeacher($userId);
        if($teacher!=NULL){
            
            $cryptedPassword = $teacher['password'];
        if(password_verify($oldPassword,$cryptedPassword)==false)
            header("Location:../View/teacherMyProfile.php?error=3");
        else {
            $control = new TeacherC();
            $crytedNewPassword = password_hash($newPassword,PASSWORD_DEFAULT);
            $control->updateTeacherPassword($crytedNewPassword,$userId);
            //$_SESSION['loggedIn'] = true;
            header("location:../View/teacherMyProfile.php");
        }
        }
    }
}

?>