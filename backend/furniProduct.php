<?php
include_once("networking.php");

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$height = $_POST['height'];
$width = $_POST['width'];
$lenght = $_POST['lenght'];

class FurniProduct extends DatabaseCalls{
    private $sku;
    private $name;
    private $price;
    private $height;
    private $width;
    private $lenght;

    public function __construct($sku, $name, $price, $height, $width, $lenght){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->height = $height;
        $this->width = $width;
        $this->lenght = $lenght;
        parent:: __construct();
    }

    public function insertQuery(){
        $dimensions = $this->height . 'x' . $this->width . 'x' . $this->lenght;

        $sql = "INSERT INTO furni (SKU, Name, Price, dimensions)
        VALUES ('$this->sku', '$this->name', '$this->price', '$dimensions')";

        $this->insertData($sql);
    }  
}

$dvdProduct = new FurniProduct($sku, $name, $price, $height, $width, $lenght);
$dvdProduct->insertQuery();