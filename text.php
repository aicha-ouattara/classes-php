<?php


class Ipdo
{
    private $host;
    private $username;
    private $password;
    private $db;
    private $connect;

    public function constructeur($host, $username, $password, $db)
    {
        $this->host;
        $this->username;
        $this->password;
        $this->db;
        $this->connect = new mysqli($host, $username, $password, $db);

    }

    public function connect($host, $username, $password, $db)
    {
        if (isset($this->connect)) {
            $this->close();
        }
        $this->connect = new mysqli($host, $username, $password, $db);
    }


    public function close()
    {
        mysqli_close($this->connect);
    }

    public function execute($query)
    {

    }
}


//$mysqli = new Ipdo("localhost", "root", "", "classes");
echo '<pre>';
var_dump($mysqli = new Ipdo("localhost", "root", "", "classes"));
echo '</pre>';




