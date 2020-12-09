<?php

class Ipdo
{
    private $host;
    private $username;
    private $password;
    private $db;
    private $connect;

    public function __construct($host = "localhost", $username = "root", $password = "", $db = "classes"){

        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db= $db;
        $this->connect = new mysqli($this->host, $this->username,$this->password ,$this->db);
        return  $this->connect;

    }



 public function connect($host, $username, $password, $dbname)
    {
        if(isset ($this->connect))
        {
            $this->__destruct();
        }
          return $this->connect;
    }

    public function close()
    {
       $this->connect->close();
    }

    public function __destruct()
    {
        $this->db = null;
        return true;
    }

   /* public function execute($query)
    {
        $req = $this->connection->prepare($query);
        $req->execute();
        return $req;
    }
    public function getLastQuery()
    {
        if ($this->execute($this->query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }*/

}




$mysqli = new Ipdo();

echo'<pre>';
var_dump($mysqli);
echo'</pre>';



?>
