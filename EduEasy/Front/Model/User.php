<?php

include_once '../config.php';

function generateUserId($userType):string{

    $db = config::getconnexion();

    $studentQuery = "SELECT * FROM student WHERE userId=(SELECT max(userId) FROM student)";
    $teacherQuery = "SELECT * FROM teacher WHERE userId=(SELECT max(userId) FROM teacher)";
    $administartorQuery = "SELECT * FROM administrator WHERE userId=(SELECT max(userId) FROM administrator)";

    if($userType=='Student'){

    try {
        $res = $db->query($studentQuery);
        $data = $res->fetch();
        if($data!=NULL){
            $nb = substr($data['userId'], 7);
            $nb+=1;
        }
        else
            $nb=0;

        //concatenation
        $userId = date("Y");
        $userId .= 'STU';
        $userId .= $nb;

        return $userId;

        } catch (Exception $e) {
            die('ERREUR'. $e->getMessage());
        }
    }

    elseif($userType=='Teacher'){

        try{
            $res = $db->query($teacherQuery);
        $data = $res->fetch();
        if($data!=NULL){
            $nb = substr($data['userId'], 7);
            $nb+=1;
        }
        else
            $nb=0;
        //concatenation
        $userId = date("Y");
        $userId .= 'TEA';
        $userId .= $nb;

        return $userId;
    
        } catch (Exception $e) {
                die('ERREUR'. $e->getMessage());
            }
    }

    elseif($userType=='Administrator'){

        try{
            $res = $db->query($administartorQuery);
            $data = $res->fetch();
            if($data!=NULL){
                $nb = substr($data['userId'], 7);
                $nb+=1;
            }
            else
                $nb=0;

        //concatenation
        $userId = date("Y");
        $userId .= 'ADM';
        $userId .= $nb;

        return $userId;
    
        } catch (Exception $e) {
                die('ERREUR'. $e->getMessage());
            }
    }

}







class User{

    private string $userName;
    private string $email;
    private string $password;
    private string $registrationDate;
    private string $userId;

    public function __construct(string $userName, string $email,string $password,string $userType){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->registrationDate = date('y-m-d');
        $this->userId = generateUserId($userType);
    }

    //getters
    public function getUserName():string{
        return $this->userName;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function getPassword():string{
        return $this->password;
    }

    public function getUserId():string{
        return $this->userId;
    }

    public function getRegistrationDate():string{
        return $this->registrationDate;
    }

    //setters
    public function setUserName(string $userName):void{
        $this->userName = $userName;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function setPassword(string $password):void{
        $this->password = $password;
    }

    public function setUserId(string $userId):void{
        $this->userId = $userId;
    }
    
}


class  Student extends User{

    private int $nbCoursesFollowed;

    //getters

    public function getNbCoursesFollowed():int{
        return $this->nbCoursesFollowed;
    }

    //setters

    public function setNbCoursesFollowed(int $nbCoursesFollowed):void{
        $this->nbCoursesFollowed = $nbCoursesFollowed;
    }
     
}


class Teacher extends User{

    private int $nbCoursesCreated;

    //getters

    public function getNbCoursesCreated():int{
        return $this->nbCoursesCreated;
    }

    //setters

    public function setNbCoursesCreated(int $nbCoursesCreated):void{
        $this->nbCoursesCreated = $nbCoursesCreated;
    }
}



class Administrator extends User{
    private int $adminNumber;

    //getters

    public function getAdminNumber():int{
        return $this->adminNumber;
    }

    //setters

    public function setAdminNumber($adminNumber):int{
        $this->adminNumber = $adminNumber;
    }
}

?>