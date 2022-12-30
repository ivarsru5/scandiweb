<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
include_once("product.php");

$data = file_get_contents("php://input");
$data = json_decode($data);

class Book extends Product{
    private $weight;

    public function __construct($sku, $name, $price, $weight, $tableName){
        parent:: __construct($sku, $name, $price, $tableName);
        $this->weight = $weight;
    }
}

if(isset($_POST['sku'])){
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];

    $book = new Book($sku, $name, $price, $weight, 'book');

    $book->insertQuery($weight);
}else if($data === null){
    $bookRet = new Book(null, null, null, null, 'book');
    $bookRet->retriveTableData();
}else{
    $bookDel = new Book(null, null, null, null, 'book');
    $bookDel->deleteProduct($data);
}