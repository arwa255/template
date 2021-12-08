
<?php

include_once "../config.php";

function removeConnection($userId){
    $db = config::getConnexion();
    try {
        $query = $db->prepare(
            'DELETE FROM onlineusers WHERE userId = :userId'
        );
        $query->execute([
            'userId' => $userId
        ]);
    } catch (\Throwable $th) {
        $e->getMessage();
    }
}





session_start();
$userId = $_SESSION['userId'];

$_SESSION['loggedIn']=false;

$_SESSION['userId']="";
$_SESSION['email']="";

removeConnection($userId);
session_destroy();

header('location:../View/index.html');
?>