<?php
include_once("networking.php");

$data = file_get_contents("php://input");
$data = json_decode($data);

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

    public function deleteProduct($skuArray){
        foreach($skuArray as $sku){
            $sql = "DELETE FROM dvd WHERE SKU = '".$sku."'";
            $this->deleteData($sql);
        }
    }
}
$class = new DvdTable();

if($data === null){
    $class->retriveTableData();
}else{
    $class->deleteProduct($data);
}