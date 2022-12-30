<?php
include_once("networking.php");


//The main enpoint off all product classes, to take base of Product boject.
class Product extends DatabaseCalls{
    protected $sku;
    protected $name;
    protected $price;
    protected $tableName;

    public function __construct($sku, $name, $price, $tableName){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->tableName = $tableName;
        parent:: __construct();
    }

    //Injects given query to SQL with given specific witch is passed from child class.
    public function insertQuery($specific){
        $sql = "INSERT INTO ".$this->tableName." (SKU, Name, Price, Spec)
        VALUES ('$this->sku', '$this->name', '$this->price', '$specific')";

        $sqlCheck = ("SELECT * FROM ".$this->tableName." WHERE SKU = '$this->sku'");

        $this->insertData($sql, $sqlCheck);
    }  

    //Furnitures query injection is differrent because, the three parameters needs to be joined
    //to create one specific witch we could then add to SQL
    public function insertFurniQuery($height, $width, $lenght){
        $dimensions = $height . 'x' . $width . 'x' . $lenght;

        $sql = "INSERT INTO ".$this->tableName." (SKU, Name, Price, Spec)
        VALUES ('$this->sku', '$this->name', '$this->price', '$dimensions')";

        $sqlCheck = ("SELECT * FROM ".$this->tableName." WHERE SKU = '$this->sku'");

        $this->insertData($sql, $sqlCheck);
    }  

    //Data retrival from SQL and given back as response as JSON to AJAX call in .JS file
    public function retriveTableData(){
        $sqlQuery = "SELECT * FROM ".$this->tableName."";

        $resultQuery = $this->getData($sqlQuery);

        if($resultQuery->num_rows > 0){
            $bookProducts = array();
            while($row = $resultQuery->fetch_assoc()){
                $bookProducts[] = $row;
            }
            echo json_encode($bookProducts);
        }
    }

    //Each class gets SKU from checkbox state, afterwards sending them to child class, and passing it in argument
    //on function call. Functions parrameter acepts array with sku witch we loop threw and on each
    //sku delete the rwo from SQL.
    public function deleteProduct($skuArray){
        foreach($skuArray as $sku){
            $sql = "DELETE FROM ".$this->tableName." WHERE SKU = '$sku'";
            $this->deleteData($sql);
        }
    }
}