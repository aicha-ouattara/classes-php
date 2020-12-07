<?php

class User
{
   private $id;
   public $login;
   public $password;
   public $email;
   public $firstname;
   public $lastname;

    public function register($login, $password, $email, $firstname, $lastname)
    {
        $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
        $sql = " INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('" . $login . "', '" . $password . "', '" . $email . "', '" . $firstname . "', '" . $lastname . "');";
        $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
        return $result;
    }

    public function connect($login, $password)
    {
        $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
        $sql = "SELECT * FROM utilisateurs WHERE login = '".$login."' AND password = '". $password ."'";
        $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
        $userinfo = mysqli_fetch_assoc($result);
       if(!empty($userinfo))
       {
//           $_SESSION["id"] = $userinfo["id"];
           $this->id = $userinfo["id"];
           $this->login = $userinfo["login"];
           $this->password = $userinfo["password"];
           $this->email = $userinfo["email"];
           $this->firstname = $userinfo["firstname"];
           $this->lastname = $userinfo["lastname"];
           return true;
       }
       else
       {
           return false;
       }
    }

    public function disconnect()
    {
        session_destroy();
        unset($_SESSION['id']);
    }

   public function delete()
    {
        $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
        $sql = "DELETE FROM utilisateurs WHERE id = '".$this->id."'";
        $result = mysqli_query($bdd,$sql);
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {
        $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
        $sql = "UPDATE utilisateurs SET login = '$login', password ='$password', email ='$email', firstname ='$firstname' , lastname ='$lastname' WHERE id = '".$this->id."'";
        $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
        return $result;
    }

   /* public function __destruct()
    {
        // Disconnect from DB
        $this->DBH = null;
        echo 'Successfully disconnected from the database!';
    }*/
}

$aicha= new User();
$aicha->register('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara');
$aicha->connect('chay',1234);
$aicha->delete();
$aicha->update('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara');


//var_dump($aicha= new User('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara'));
var_dump($aicha->connect('chay',1234));
var_dump($aicha->register('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara')
);

var_dump($aicha->update('chaya', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara'));




?>