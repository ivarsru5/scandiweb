<?php
include_once("networking.php");

class FurniTable extends DatabaseCalls{

    public function retriveTableData(){
        $sqlQuery = "SELECT * FROM furni";

        $resultQuery = $this->getData($sqlQuery);

        if($resultQuery->num_rows > 0){
            $furniProducts = array();
            while($row = $resultQuery->fetch_assoc()){
                $furniProducts[] = $row;
            }
            echo json_encode($furniProducts);
        }
    }
}

$class = new FurniTable();
$class->retriveTableData();
