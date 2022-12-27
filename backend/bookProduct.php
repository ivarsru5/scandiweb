<?php
include_once("networking.php");

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$weight = $_POST['weight'];

class BookProduct extends DatabaseCalls{
    private $sku;
    private $name;
    private $price;
    private $weight;

    public function __construct($sku, $name, $price, $weight){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        parent:: __construct();
    }

    public function insertQuery(){
        $sql = "INSERT INTO book (SKU, Name, Price, Weight)
        VALUES ('$this->sku', '$this->name', '$this->price', '$this->weight')";

        $this->insertData($sql);
    }  
}

$dvdProduct = new BookProduct($sku, $name, $price, $weight);
$dvdProduct->insertQuery();