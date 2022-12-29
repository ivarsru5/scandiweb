<?php
include_once("networking.php");

$data = file_get_contents("php://input");
$data = json_decode($data);

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

    public function deleteProduct($skuArray){
        foreach($skuArray as $sku){
            $sql = "DELETE FROM furni WHERE SKU = '".$sku."'";
            $this->deleteData($sql);
        }
    }
}

$class = new Furnitable();

if($data === null){
    $class->retriveTableData();
}else{
    $class->deleteProduct($data);
}
