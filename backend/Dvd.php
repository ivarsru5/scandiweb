<?php
include_once("Product.php");

// $data = file_get_contents("php://input");
// $data = json_decode($data);

class Dvd extends Product{
    private $memory;

    public function __construct($sku, $name, $price, $memory, $tableName){
        parent:: __construct($sku, $name, $price, $tableName);
        $this->memory = $memory;
    }
}

// if(isset($_POST['sku'])){
//     $sku = $_POST['sku'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $memory = $_POST['dvd-memory'];

//     $dvd = new Dvd($sku, $name, $price, $memory, 'dvd');

//     $dvd->insertQuery($memory);
// }else if($data === null){
//     $dvdRet = new Dvd(null, null, null, null, 'dvd');
//     $dvdRet->retriveTableData();
// }else{
//     $dvdDel = new Dvd(null, null, null, null, 'dvd');
//     $dvdDel->deleteProduct($data);
// }