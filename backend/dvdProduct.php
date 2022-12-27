<?php
include_once("networking.php");

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$memory = $_POST['dvd-memory'];

class DvdProduct extends DatabaseCalls{
    private $sku;
    private $name;
    private $price;
    private $memory;

    public function __construct($sku, $name, $price, $memory){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->memory = $memory;
        parent:: __construct();
    }

    public function insertQuery(){
        $sql = "INSERT INTO dvd (SKU, Name, Price, Memory)
        VALUES ('$this->sku', '$this->name', '$this->price', '$this->memory')";

        $this->insertData($sql);
    }  
}

$dvdProduct = new DvdProduct($sku, $name, $price, $memory);
$dvdProduct->insertQuery();