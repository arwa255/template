<?php

include_once '../Controller\UserC.php';
include_once '../Model\User.php';


function checkEmailExistence($email){
    $db = config::getconnexion();

    try {
        $studentQuery = $db->query(
            "SELECT * FROM student where email = '$email' "
        );
        $existStudent = $studentQuery->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }

    try {
        $teacherQuery = $db->query(
            "SELECT * FROM teacher where email = '$email' "
        );
        $existTeacher = $teacherQuery->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }

    if($existStudent==NULL && $existTeacher==NULL)
        return false;
    else 
        return true;    
}

function checkUserNameExistence($userName){
    $db = config::getconnexion();

    try {
        $studentQuery = $db->query(
            "SELECT * FROM student where userName = '$userName' "
        );
        $existStudent = $studentQuery->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }

    try {
        $teacherQuery = $db->query(
            "SELECT * FROM teacher where userName = '$userName' "
        );
        $existTeacher = $teacherQuery->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }

    if($existStudent==NULL && $existTeacher==NULL)
        return false;
    else 
        return true;    
}






if(checkEmailExistence($_POST['email'])==false && checkUserNameExistence($_POST['userName'])==false){


if($_POST['userType']=='Student'){
    $control = new StudentC();
    //password crypting
    $password = $_POST['password'];
    $crytedPassword = password_hash($password,PASSWORD_DEFAULT);

    $newStudent = new Student($_POST['userName'],$_POST['email'],$crytedPassword,$_POST['userType']);

    //registration email;
    $registrationMessage = 'Welcome to EduEasy , ';
    $registrationMessage .= $_POST['userName'];
    $registrationMessage .= '. This is your User Id: ';
    $registrationMessage .= $newStudent->getUserId();
    $registrationMessage .= '. Use it to login to your account.';

    $emailAdresse=$_POST['email'];

    //sending the registration email
    if(mail($emailAdresse,'Welcome to EduEasy',$registrationMessage,"From:miguelonana1234@gmail.com")==true){
        $control->addStudent($newStudent);
        header("location:../View/login.html");
    }
    
}
else if($_POST['userType']=='Teacher'){
    $control = new TeacherC();

    //password crypting
    $password = $_POST['password'];
    $crytedPassword = password_hash($password,PASSWORD_DEFAULT);

    $newTeacher = new Teacher($_POST['userName'],$_POST['email'],$crytedPassword,$_POST['userType']);
    $control->addTeacher($newTeacher);

    //registration email;
    $registrationMessage = 'Welcome to EduEasy , ';
    $registrationMessage .= $_POST['userName'];
    $registrationMessage .= '. This is your User Id: ';
    $registrationMessage .= $newTeacher->getUserId();
    $registrationMessage .= '. Use it to login to your account.';

    $emailAdresse=$_POST['email'];

    //sending the registration email
    if(mail($emailAdresse,'Welcome to EduEasy',$registrationMessage,"From:miguelonana1234@gmail.com")==true){
        $control->addTeacher($newTeacher);
        header("location:../View/login.html");
    }
}

}
else if(checkUserNameExistence($_POST['userName'])==true && checkEmailExistence($_POST['email'])==true)    
    header("location:../View/registration.html?error=3");
else if(checkUserNameExistence($_POST['userName'])==true)    
    header("location:../View/registration.html?error=2");
else if(checkEmailExistence($_POST['email'])==true)
    header("location:../View/registration.html?error=1");
?>