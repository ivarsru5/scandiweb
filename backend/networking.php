<?php

class DatabaseCalls{
    private $connection;

    public function __construct(){
        $this->connection = new mysqli("localhost", "root", "","scandiweb");
    }

    public function insertData($dataQuery){
        if(!$this->connection){
            die("Connection failed" . $this->connection->connect_error);
        }

        if($this->connection->query($dataQuery)){
            echo "Done";
        }else{
            echo "Error: " . $dataQuery . "<br>" . $this->connection->error;
        }
        $this->connection->close();
    }
}