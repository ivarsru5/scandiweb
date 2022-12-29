<?php
include_once("networking.php");

$data = file_get_contents("php://input");
$data = json_decode($data);

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

    public function deleteProduct($skuArray){
        foreach($skuArray as $sku){
            $sql = "DELETE FROM book WHERE SKU = '".$sku."'";
            $this->deleteData($sql);
        }
    }
}

$class = new BookTable();

if($data === null){
    $class->retriveTableData();
}else{
    $class->deleteProduct($data);
}