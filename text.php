<?php

class Ipdo
{
    private $connection;

    public function __construct( $host = "localhost", $dbname = "classes", $username = "root", $password    = ""){

            $this->connection = mysqli_connect($host, $username, $password, $dbname);

        }

    public function connect($host, $username, $password, $dbname)
    {
        if(isset($this->connection))
        {
            $this->close();
        }
        $this->connection = mysqli_connect($host, $username, $password, $dbname);
    }

    public function close()
    {
        mysqli_close($this->connection);
    }

    public function __destruct()
    {
        $this->connection = NULL;
        return true;
    }

    public function execute($query)
    {

    }
}




$mysqli = new Ipdo();

echo'<pre>';
var_dump($mysqli);
echo'</pre>';

