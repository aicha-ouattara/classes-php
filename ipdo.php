<?php

class Ipdo
{
    private $host;
    private $username;
    private $password;
    private $connection;
    private $db;
    private $query;

    public function __construct($host = "localhost", $username = "root", $password = "", $db = "moduleconnexion"){

        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db= $db;
        $this->query;
        $this->connection = new mysqli($host, $username, $password, $db);
    }

 public function connect($host, $username, $password, $db)
    {
        if($this->connection)
        {
            $this->close();
        }
       return $this->connection = new mysqli($host, $username, $password, $db);
    }

    public function close()
    {
       return $this->connection->close();
    }

    public function __destruct()
    {
        return $this->db = null;
    }

   public function execute($query)
    {
        $this->query = $query;
        $result = mysqli_query($this->connection,$query);
        $userinfo = mysqli_fetch_assoc($result);
        return  $userinfo;
    }
    public function getLastQuery()
    {
       

    }

    public function getLastResult()
    {

    }

}




$mysqli = new Ipdo();

echo'<pre>';
var_dump($mysqli->execute("SELECT * FROM utilisateurs"));
echo'</pre>';



?>
