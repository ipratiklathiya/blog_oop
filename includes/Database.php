<?php

/**
 * Database class
 **/

class Database {
private $connection;
public function __construct() {

}
public function __destruct(){

}
public function sqlQuery($sql,$bindVal = null){
    $statement = $this->connection->prepare($sql);
    if (is_array($bindVal)){
        $statement->execute($bindVal);
    }
    else{
        $statement->execute();
    }
    return $statement;
}
public function fetchArray($sql, $bindVal = null){
    $result = $this->sqlQuery($sql, $bindVal);
    if($result->rowCount()==0) {
        return false;
    }
    else{
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
}
$dbc = new Database();


