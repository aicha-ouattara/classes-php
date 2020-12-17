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
        $sql = "SELECT id FROM utilisateurs WHERE login = '".$login."'";
        $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
        $user = mysqli_num_rows($result);

        if($user)
        {
            return false;
        }
        else
            {
                $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
                $sql = " INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('" . $login . "', '" . $password . "', '" . $email . "', '" . $firstname . "', '" . $lastname . "');";
                $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
                return $result;
        }

    }

    public function connect($login, $password)
    {
        $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
        $sql = "SELECT * FROM utilisateurs WHERE login = '".$login."' AND password = '". $password ."'";
        $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
        $userinfo = mysqli_fetch_assoc($result);

       if(!empty($userinfo))
       {
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
           if (isset($this->id))
           {
               $this->id = null;
               $this->login = null;
               $this->password = null;
               $this->email = null;
               $this->firstname = null;
               $this->lastname = null;
               return true;
           }
           else
           {
               return false;
           }
    }

   public function delete()
    {
       if(isset($this->id))
       {
           $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
           $sql = "DELETE FROM utilisateurs WHERE id = '".$this->id."'";
           if ($result = mysqli_query($bdd,$sql))
           {
               $this->id = null;
               $this->login = null;
               $this->password = null;
               $this->email = null;
               $this->firstname = null;
               $this->lastname = null;
               return true;
           }
           else
           {
               return false;
           }
       }

    }

    public function update($login, $password, $email, $firstname, $lastname)
    {
        if(isset($this->id))
        {
            $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
            $sql = "UPDATE utilisateurs SET login = '$login', password ='$password', email ='$email', firstname ='$firstname' , lastname ='$lastname' WHERE id = '".$this->id."'";
            $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function isConnected()
    {
        if(isset($this->id))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getAllInfos()
    {
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function refresh()
    {

           $bdd = mysqli_connect("localhost", "root", "", "classes"); // Connexion database...
           $sql = "SELECT * FROM utilisateurs WHERE id = '".$this->id."'";
           $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
           $userinfo = mysqli_fetch_assoc($result);

           if($userinfo)
           {
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

}

$aicha= new User();
$aicha->register('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara');
$aicha->connect('chay',1234);

/*$aicha->getAllInfos();
$aicha->update('chayghj', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara');*/

/*var_dump($aicha->register('chayghj', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara'));
var_dump($aicha->connect('chay',1234));*/
echo'<pre>';
var_dump($aicha->getLogin());
echo'</pre>';

//var_dump($aicha->delete());

echo'<pre>';
var_dump($aicha->getAllInfos());
echo '</pre>';

var_dump($aicha->refresh());
var_dump($aicha->disconnect());
/*echo'<pre>';
var_dump($aicha);
echo '</pre>';

echo'<pre>';
var_dump($aicha);
echo '</pre>';

$aicha->refresh();
echo'<pre>';
var_dump($aicha);
echo '</pre>';*/



/*
$aicha->isConnected();
$aicha->delete();
$aicha->disconnect();*/



//var_dump($aicha= new User('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara'));
//var_dump($aicha->register('chay', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara')
//);

//var_dump($aicha->connect('chay',1234));
/*var_dump($aicha->isConnected());
var_dump($aicha->disconnect());*/

//var_dump($aicha->getAllInfos());






?>