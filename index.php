<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
    
        interface User{
            public function setUsername($name);
            public function getUsername();
            public function setGender($gender);
            public function getGender();
        }
        
        class Commentator implements User{
            protected $username = '';
            protected $gender = '-';
            public function setUsername($name)
            {
                $this->username = (is_string($name))? $name : 'N/A';
            }
            public function getUsername(){
                return $this-> username;
            }
            public function setGender($gender)
            {
                $gendersArray = array('female', 'male', 'other');

                if(in_array($gender, $gendersArray))
                {
                  $this -> gender = $gender;
                } 
            }
            public function getGender(){
                return $this->gender;
            }
            
            
            public function addMrOrMrsToUsername(User $user)
            {
                
                $userName   = $this -> getUsername();
                $userGender = $this -> getGender();

                if($userGender === 'female')
                {
                    return "Mrs. " . $userName;
                }
                else if($userGender === 'male')
                {
                    return "Mr. " . $userName;
                }

                return $this->userName;
            }
            
        }
        
        $user1 = new Commentator();        
        $user1->setGender('female');
        $user1->setUsername("Joe");
                
        
        $user2= new Commentator();
        $user2->setGender('male');
        $user2->setUsername("Bob");
        
        
        echo addMrOrMrsToUsername($user1);
        echo addMrOrMrsToUsername($user2);
        
        ?>
    </body>
</html>
