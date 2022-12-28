<?php
include_once("networking.php");

//By opening ajax from 'addProductScript.js' recive six values
//and then by given dimensions from user function joins in one input.
//And before instering checks is SKU already exists in SQL

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

        $sql = "INSERT INTO furni (SKU, Name, Price, Spec)
        VALUES ('$this->sku', '$this->name', '$this->price', '$dimensions')";

        $sqlCheck = ("SELECT * FROM furni WHERE SKU = '$this->sku'");

        $this->insertData($sql, $sqlCheck);
    }  
}

$furniProduct = new FurniProduct($sku, $name, $price, $height, $width, $lenght);
$furniProduct->insertQuery();