<?php

class Ipdo
{
    private $host;
    private $username;
    private $password;
    private $db;

    public function constructeur()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db= "classes";

        $conn = new mysqli($this->host ,$this->username,  $this->password, $this->db);
        return $conn;
    }
}




$mysqli = new Ipdo();

echo'<pre>';
var_dump($mysqli->constructeur());
echo'</pre>';

