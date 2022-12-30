<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
include_once("product.php");

$data = file_get_contents("php://input");
$data = json_decode($data);

class Furni extends Product{
    private $height;
    private $width;
    private $lenght;

    public function __construct($sku, $name, $price, $height, $width, $lenght, $tableName){
        parent:: __construct($sku, $name, $price, $tableName);
        $this->height = $height;
        $this->width = $width;
        $this->lenght = $lenght;
    }
}

if(isset($_POST['sku'])){
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $lenght = $_POST['lenght'];

    $furni = new Furni($sku, $name, $price, $height, $width, $lenght, 'furni');

    $furni->insertFurniQuery($height, $width, $lenght);
}else if($data === null){
    $furniRet = new Furni(null, null, null, null, null, null, 'furni');
    $furniRet->retriveTableData();
}else{
    $furniDel = new Furni(null, null, null, null, null, null, 'furni');
    $furniDel->deleteProduct($data);
}