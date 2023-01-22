<?php
include_once("Product.php");

class Dvd extends Product{
    private $memory;

    public function __construct($sku, $name, $price, $memory, $tableName){
        parent:: __construct($sku, $name, $price, $tableName);
        $this->memory = $memory;
    }
}