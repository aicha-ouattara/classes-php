<?php

class Ipdo
{
    private $host;
    private $username;
    private $password;
    private  $db;
    private  $connect;

    public function __construct ($host, $username, $password, $db)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password =$password;
        $this->db = $db;
        $this->connect =  mysqli_connect($host, $username, $password);

    }

    public function connect($host, $username, $password)
    {
     if( $this->connect)
     {
         $this->close();
     }
        $this->connect =  mysqli_connect($host, $username, $password);
    }

    public function destructeur()
    {
        $this->connect->close();
    }

    public function close()
    {
        $this->connect->close();
    }
}


//$mysqli = new Ipdo("localhost", "root", "", "classes");
echo '<pre>';
var_dump($mysqli = new Ipdo("localhost", "root", "", "classes"));
echo '</pre>';

echo '<pre>';
var_dump($mysqli->connect("localhost", "root", ""));
echo '</pre>';


?>
