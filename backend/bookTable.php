<?php
include_once("networking.php");

class BookTable extends DatabaseCalls{

    public function retriveTableData(){
        $sqlQuery = "SELECT * FROM book";

        $resultQuery = $this->getData($sqlQuery);

        if($resultQuery->num_rows > 0){
            $bookProducts = array();
            while($row = $resultQuery->fetch_assoc()){
                $bookProducts[] = $row;
            }
            echo json_encode($bookProducts);
        }
    }
}

$class = new BookTable();
$class->retriveTableData();