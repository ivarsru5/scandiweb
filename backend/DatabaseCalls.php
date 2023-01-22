<?php

//This would be endpoint of all classes where thay take all network calls
//And inject in SQL query's. The main variable is always initilized,
//So we would not get error on trying to connect to SQL
class DatabaseCalls{
    private $connection;

    public function __construct(){
        $this->connection = new mysqli("localhost", "root", "","scandiweb");
    }

    public function insertData($dataQuery, $searchQuery){
        if(!$this->connection){
            die("Connection failed" . $this->connection->connect_error);
        }

        $check = $this->connection->query($searchQuery);
        if($check->num_rows == 0){
            if($this->connection->query($dataQuery)){
                echo "Done";
            }else{
                echo "Error: " . $dataQuery . "<br>" . $this->connection->error;
            }
        }else{
            echo "SKU already exists!!!";
        }
        $this->connection->close();
    }

    public function getData($sqlQuery){
        $query;
        if(!$this->connection){
            die("Connection failed" . $this->connection->connect_error);
        }

        $query = $this->connection->query($sqlQuery);
        $this->connection->close();
        return $query;
    }

    public function deleteData($sqlQuery){
        if(!$this->connection){
            die("Connection failed" . $this->connection->connect_error);
        }
        $this->connection->query($sqlQuery);
    }
}