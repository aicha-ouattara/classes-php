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
    private $table;

    public function __construct ($host = "localhost", $username = "root", $password = "", $db = "moduleconnexion"){ //J'avais tester d'abord avec la methode __construct et en fait ca ne change rien a ma fonction

        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db= $db;
        $this->query;
        $this->userinfo;
        $this->table;
        $this->connection = new mysqli($host, $username, $password, $db);
        return $this->connection;
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
        $this->table = mysqli_fetch_all($result);
        return  $this->table;

    }

    public function getFields($table)
    {
        if($this->connection)
        {
            $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $table");
            $fields = mysqli_fetch_all($result);
            return  $fields;
        }
        else
        {
            return false;
        }
    }

}




$mysqli = new Ipdo();
echo'<pre>';
var_dump($mysqli->__construct("localhost", "root", "", "moduleconnexion"));
echo'</pre>';

echo'<pre>';
var_dump($mysqli->connect("localhost", "root", "", "moduleconnexion"));
echo'</pre>';
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

echo'<pre>';
var_dump($mysqli->getFields("utilisateurs"));
echo'</pre>';

//("SELECT * FROM utilisateurs")

?>
