<?php
include_once("networking.php");

class DvdTable extends DatabaseCalls{

    public function retriveTableData(){
        $sqlQuery = "SELECT * FROM dvd";

        $resultQuery = $this->getData($sqlQuery);

        if($resultQuery->num_rows > 0){
            $dvdProducts = array();
            while($row = $resultQuery->fetch_assoc()){
                $dvdProducts[] = $row;
            }
            echo json_encode($dvdProducts);
        }
    }
}

$class = new DvdTable();
$class->retriveTableData();
