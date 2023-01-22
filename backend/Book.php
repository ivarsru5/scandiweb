<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
include_once("Product.php");

class Book extends Product{
    private $weight;

    public function __construct($sku, $name, $price, $weight, $tableName){
        parent:: __construct($sku, $name, $price, $tableName);
        $this->weight = $weight;
    }
}
