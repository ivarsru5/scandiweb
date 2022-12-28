<?php
include_once("networking.php");

//By opening ajax from 'addProductScript.js' recive four values
//Whitch are injected in SQL query.
//While ajax monitors for reaponse from global variable 'echo'
//And before instering checks is SKU already exists in SQL

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
        $sql = "INSERT INTO book (SKU, Name, Price, Spec)
        VALUES ('$this->sku', '$this->name', '$this->price', '$this->weight')";

        $sqlCheck = ("SELECT * FROM book WHERE SKU = '$this->sku'");

        $this->insertData($sql, $sqlCheck);
    }  
}

$bookProduct = new BookProduct($sku, $name, $price, $weight);
$bookProduct->insertQuery();