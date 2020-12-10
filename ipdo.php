<?php

class Ipdo
{
    private $host;
    private $username;
    private $password;
    private $connection;
    private $db;
    private $query;
    private $userinfo;

    public function __construct($host = "localhost", $username = "root", $password = "", $db = "moduleconnexion"){

        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db= $db;
        $this->query;
        $this->userinfo;
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
        $this->userinfo = mysqli_fetch_all($result);
        return  $this->userinfo;
    }
    public function getLastQuery()
    {
       if($this->query)
       {
           return $this->query;
       }
       else
       {
           return false;
       }

    }

    public function getLastResult()
    {
        if($this->userinfo)
        {
            return $this->userinfo;
        }
        else
        {
            return false;
        }
    }

    public function getTables()
    {
        $result = mysqli_query($this->connection, 'SHOW TABLES');
        $table = mysqli_fetch_all($result);
        return  $table;

    }

}




$mysqli = new Ipdo();

echo'<pre>';
var_dump($mysqli->execute("SELECT * FROM utilisateurs"));
echo'</pre>';

echo'<pre>';
var_dump($mysqli->getLastQuery());
echo'</pre>';

echo'<pre>';
var_dump($mysqli->getLastResult());
echo'</pre>';

echo'<pre>';
var_dump($mysqli->getTables());
echo'</pre>';

//("SELECT * FROM utilisateurs")

?>
