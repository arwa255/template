<?php

include_once "../Model/User.php";
include_once "../config.php";

// Class GetStudents{

//     function getStudentByUserId($userId){
//         $db = config::getconnexion();

//         try {
//             $query = $db->query(
//             "SELECT * FROM student where userId = '$userId' "
//             );
//             return $query->fetch();

//         } catch (PDOException $e) {
//             $e->getMessage();
//         }
//     }

    function getAllStudents(){
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM student"
            );
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

//}

// class GetTeachers{

//     function getTeacherByUserId($userId){
//         $db = config::getconnexion();

//         try {
//             $query = $db->query(
//             "SELECT * FROM teacher where userId = '$userId' "
//             );
//             return $query->fetch();

//         } catch (PDOException $e) {
//             $e->getMessage();
//         }
//     }

    function getAllTeachers(){
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM teacher"
            );
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
//}

//class GetUsers
function getAllAdministrators(){
    $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT * FROM administrator"
        );
        return $query;

    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>