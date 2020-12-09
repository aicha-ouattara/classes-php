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
        $bdd=new PDO("mysql:host=localhost;dbname=classes","root","");
        $req = $bdd ->prepare('SELECT id FROM utilisateurs WHERE login = ?');  //Request for the verification of login
        $req->execute(array($login));
        $user = $req->rowCount();
        if($user)
        {
            return false;
        }
        else
        {
            $bdd=new PDO("mysql:host=localhost;dbname=classes","root","");
            $req = $bdd->prepare("INSERT INTO utilisateurs(login, password, email, firstname, lastname) VALUES(?, ?, ?, ?, ?)"); //Insert to the database
            $req->execute(array($login, $password, $email, $firstname, $lastname));
            return $req;
        }

    }

    public function connect($login, $password)
    {
        $bdd=new PDO("mysql:host=localhost;dbname=classes","root","");
        $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
        $req->execute(array($login, $password));
        $users=$req->fetch(PDO::FETCH_ASSOC);

        if($req->rowCount() > 0)
        {
            $this->id = $users["id"];
            $this->login = $users["login"];
            $this->password = $users["password"];
            $this->email = $users["email"];
            $this->firstname = $users["firstname"];
            $this->lastname = $users["lastname"];
            return true;
        }
        else
        {
            return false;
        }
    }

    public function disconnect()
    {
        if(isset($this->id))
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
        $bdd=new PDO("mysql:host=localhost;dbname=classes","root","");
        $req = $bdd->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $req->execute(array($this->id));
        if ($req->execute(array($this->id)))
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

    public function update($login, $password, $email, $firstname, $lastname)
    {
        if(isset($this->id))
        {
            $bdd=new PDO("mysql:host=localhost;dbname=classes","root","");
            $req = $bdd->prepare("UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ? , lastname = ? WHERE id = ?");
            $req->execute(array($login, $password, $email, $firstname, $lastname, $this->id));
            return $req;
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
        return [$this->id, $this->login, $this->password, $this->email, $this->firstname , $this->lastname ];
    }

    public function getLogin()
    {
        return [$this->login];
    }

    public function getEmail()
    {
        return [$this->email];
    }

    public function getFirstname()
    {
        return [$this->firstname];
    }

    public function getLastname()
    {
        return [$this->lastname];
    }

    public function refresh()
    {
        if(isset($this->id))
        {
            $bdd=new PDO("mysql:host=localhost;dbname=classes","root","");
            $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
            $req->execute(array($this->id));
            $users=$req->fetch(PDO::FETCH_ASSOC);

            if($users)
            {
                $this->login = $users["login"];
                $this->password = $users["password"];
                $this->email = $users["email"];
                $this->firstname = $users["firstname"];
                $this->lastname = $users["lastname"];
                return true;
            }
            else
            {
                return false;
            }
        }

    }

}

$aicha= new User();
/*$aicha->register('chayo', "rara",'aichadesign@gmail.com', 'Flore', 'Ouattara');
$aicha->connect('chaya',1234);*/

var_dump($aicha->register('chayali', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara'));

/*$aicha->getAllInfos();
echo'<pre>';
var_dump($aicha->getAllInfos());
echo '</pre>';
echo'<pre>';
var_dump($aicha);
echo '</pre>';

//$aicha->update('chayghj', 1234,'aichadesign@gmail.com', 'Flore', 'Ouattara');
echo'<pre>';
var_dump($aicha);
echo '</pre>';

$aicha->refresh();
echo'<pre>';
var_dump($aicha);
echo '</pre>';
*/


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