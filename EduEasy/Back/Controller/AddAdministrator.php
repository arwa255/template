<?php
include_once '../Model/User.php';
include_once '../../Front/Controller/UserC.php';

$searchADM = "ADM";
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true || !preg_match("/{$searchADM}/i", $_SESSION['userId'])){    
    header('location:../../Front/View/login.html');
}
else{
    $control = new AdministratorC();

    //password crypting
    $password = $_POST['password'];
    $crytedPassword = password_hash($password,PASSWORD_DEFAULT);

    $newAdministrator = new Administrator($_POST['userName'],$_POST['email'],$crytedPassword,'Administrator');

    //registration email;
    $registrationMessage = 'Welcome to EduEasy . ';
    $registrationMessage .= $_POST['userName'];
    $registrationMessage .= ' , You have been added as a new administrator .This is your User Id: ';
    $registrationMessage .= $newAdministrator->getUserId();
    $registrationMessage .= '. Use it to login to your account.';

    $emailAdresse=$_POST['email'];

    //sending the registration email
    if(mail($emailAdresse,'Welcome to EduEasy',$registrationMessage,"From:miguelonana1234@gmail.com")==true){
        $control->addAdministrator($newAdministrator);
        header("location:../View/ShowAdministrators.php");
    }
}

?>