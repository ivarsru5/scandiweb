<?php
error_reporting(E_ALL);
ini_set("display_errors","On");

switch($_GET['action']){

    case 'retrive_table':
        switch($_GET['table']){

            case "get_furni":
                include_once('backend/Furni.php');
                $result = getFurni();
                return $result;
                break;

            case 'get_book':
                include_once('backend/Book.php');
                getBook();
                break;
            
            case 'get_dvd':
                include_once('backend/Dvd.php');
                getDvd();
                break;
        }
        break;
}

function getFurni(){
    $furniRet = new Furni(null, null, null, null, null, null, 'furni');
    return $furniRet->retriveTableData();
}

function getBook(){
    $bookRet = new Book(null, null, null, null, 'book');
    $bookRet->retriveTableData();
}

function getDvd(){
    $dvdRet = new Dvd(null, null, null, null, 'dvd');
    $dvdRet->retriveTableData();
}