<?php
include_once __DIR__ . "../../db.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        $accountNum = '2';
        for($i = 0; $i < 12; $i++){
            $accountNum .= rand(0,9);
        }
        $id = $_POST['id'];
        $sql = "UPDATE users SET users.active = 1, users.accountNum = $accountNum WHERE users.id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(["id" => $id]);
        // gi vrakame account nummber i id za polesna manipulacija so tabelata
        echo json_encode(["accountNum" => $accountNum, "id" => $id]);
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}else{
    die("You dont have access to this page!!");
}