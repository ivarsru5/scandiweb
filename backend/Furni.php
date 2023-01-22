<?php
include_once("Product.php");

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