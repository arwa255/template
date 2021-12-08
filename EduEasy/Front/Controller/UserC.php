<?php

include_once '../config.php';
include_once '../Model/User.php';
 

class StudentC{


    function addStudent($newStudent){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO student (userId,email,userName,password,registrationDate) 
                    VALUES (:userId,:email,:userName,:password,:registrationDate)'
            );
            $query->execute([
                'userId' => $newStudent->getUserId(),
                'email' => $newStudent->getEmail(),
                'userName' => $newStudent->getUserName(),
                'password' => $newStudent->getPassword(),
                'registrationDate' => $newStudent->getRegistrationDate()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function updateStudentUserName($newUserName,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE student SET userName= :userName where userId = :userId'
            );
            $query = $query->execute([
                'userName' => $newUserName,
                'userId' => $userId
            ]);
            $_SESSION['userName'] = $newUserName;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateStudentEmail($newEmail,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE student SET email= :email where userId = :userId'
            );
            $query = $query->execute([
                'email' => $newEmail,
                'userId' => $userId
            ]);
            $_SESSION['email'] = $newEmail;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function updateStudentPassword($newPassword,$userId){
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE student SET password= :password where userId = :userId'
            );
            $query = $query->execute([
                'password' => $newPassword,
                'userId' => $userId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function deleteStudent($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM student WHERE userId = :userId'
            );
            $query->execute([
                'userId' => $userId
            ]);
        } catch (\Throwable $th) {
            $e->getMessage();
        }
    }
}

class TeacherC{


    function addTeacher($newTeacher){
        $db = config::getConnexion();

        try {
            $query = $db->prepare(
                'INSERT INTO teacher (userId,email,userName,password,registrationDate) 
                    VALUES (:userId,:email,:userName,:password,:registrationDate) '
            );// INSERT INTO 'nom_de_la_table'
            $query->execute([
                'userId' => $newTeacher->getUserId(),
                'email' => $newTeacher->getEmail(),
                'userName' => $newTeacher->getUserName(),
                'password' => $newTeacher->getPassword(),
                'registrationDate' => $newTeacher->getRegistrationDate()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function updateTeacherUserName($newUserName,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE teacher SET userName= :userName where userId = :userId'
            );
            $query = $query->execute([
                'userName' => $newUserName,
                'userId' => $userId
            ]);
            $_SESSION['userName'] = $newUserName;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateTeacherEmail($newEmail,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE teacher SET email= :email where userId = :userId'
            );
            $query = $query->execute([
                'email' => $newEmail,
                'userId' => $userId
            ]);
            $_SESSION['email'] = $newEmail;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function updateTeacherPassword($newPassword,$userId){
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE teacher SET password= :password where userId = :userId'
            );
            $query = $query->execute([
                'password' => $newPassword,
                'userId' => $userId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function deleteTeacher($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM teacher WHERE userId = :userId'
            );
            $query->execute([
                'userId' => $userId
            ]);
        } catch (\Throwable $th) {
            $e->getMessage();
        }
    }
}


class AdministratorC{

    function addAdministrator($newAdministrator){
        $db = config::getConnexion();

        try {
            $query = $db->prepare(
                'INSERT INTO administrator (userId,email,userName,password,registrationDate) 
                    VALUES (:userId,:email,:userName,:password,:registrationDate) '
            );
            $query->execute([
                'userId' => $newAdministrator->getUserId(),
                'email' => $newAdministrator->getEmail(),
                'userName' => $newAdministrator->getUserName(),
                'password' => $newAdministrator->getPassword(),
                'registrationDate' => $newAdministrator->getRegistrationDate()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function deleteAdministrator($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM administrator WHERE userId = :userId'
            );
            $query->execute([
                'userId' => $userId
            ]);
        } catch (\Throwable $th) {
            $e->getMessage();
        }
    }

    function updateAdministratorUserName($newUserName,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE administrator SET userName= :userName where userId = :userId'
            );
            $query = $query->execute([
                'userName' => $newUserName,
                'userId' => $userId
            ]);
            $_SESSION['userName'] = $newUserName;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateAdministratorEmail($newEmail,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE administrator SET email= :email where userId = :userId'
            );
            $query = $query->execute([
                'email' => $newEmail,
                'userId' => $userId
            ]);
            $_SESSION['email'] = $newEmail;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function updateAdministratorPassword($newPassword,$userId){
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE administrator SET password= :password where userId = :userId'
            );
            $query = $query->execute([
                'password' => $newPassword,
                'userId' => $userId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

}


// $crytedPassword = password_hash('qwertyuiop',PASSWORD_DEFAULT);
//     $control = new AdministratorC();
//     $newTeacher = new Administrator('admin','miguelstephane.onana@esprit.tn',$crytedPassword,'Administrator');
//     $control->addAdministrator($newTeacher);

?>
