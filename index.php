<?php
error_reporting(E_ALL);
ini_set("display_errors","On");

if(isset($_POST['dvd-memory'])){
    include_once('backend/Dvd.php');

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $memory = $_POST['dvd-memory'];

    $dvd = new Dvd($sku, $name, $price, $memory, 'dvd');
    $dvd->insertQuery($memory);

}else if (isset($_POST['height'])){
    include_once('backend/Furni.php');

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $lenght = $_POST['lenght'];

    $furni = new Furni($sku, $name, $price, $height, $width, $lenght, 'furni');
    $furni->insertFurniQuery($height, $width, $lenght);

}else if(isset($_POST['weight'])){
    include_once('backend/Book.php');

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];

    $book = new Book($sku, $name, $price, $weight, 'book');
    $book->insertQuery($weight);
}

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'get_dvd':
            include_once('backend/Dvd.php');
            $dvdRet = new Dvd(null, null, null, null, 'dvd');
            $response = $dvdRet->retriveTableData();
            echo json_encode($response);
            break;

        case 'get_furni':
            include_once('backend/Furni.php');
            $furniRet = new Furni(null, null, null, null, null, null, 'furni');
            $response = $furniRet->retriveTableData();
            echo json_encode($response);
            break;

        case 'get_book':
            include_once('backend/Book.php');
            $bookRet = new Book(null, null, null, null, 'book');
            $response = $bookRet->retriveTableData();
            echo json_encode($response);
    }
}

$data = file_get_contents("php://input");
$data = json_decode($data);

if (isset($_POST['delete'])){
    switch($_POST['delete']){
        case 'del_dvd':
            include_once('backend/Dvd.php');
            $dvdDel = new Dvd(null, null, null, null, 'dvd');
            $dvdDel->deleteProduct($data);
            break;
        
        case 'del_furni':
            include_once('backend/Furni.php');
            $furniDel = new Furni(null, null, null, null, null, null, 'furni');
            $furniDel->deleteProduct($data);
            break;
        
        case 'del_book':
            include_once('backend/Book.php');
            $bookDel = new Book(null, null, null, null, 'book');
            $bookDel->deleteProduct($data);
            break;
    }
}