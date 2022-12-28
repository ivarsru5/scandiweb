<?php
include_once("networking.php");

//By opening ajax from 'addProductScript.js' recive four values
//Whitch are injected in SQL query.
//While ajax monitors for reaponse from global variable 'echo'

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
        $sql = "INSERT INTO dvd (SKU, Name, Price, Spec)
        VALUES ('$this->sku', '$this->name', '$this->price', '$this->memory')";

        $sqlCheck = ("SELECT * FROM dvd WHERE SKU = '$this->sku'");

        $this->insertData($sql, $sqlCheck);
    }  
}

$dvdProduct = new DvdProduct($sku, $name, $price, $memory);
$dvdProduct->insertQuery();