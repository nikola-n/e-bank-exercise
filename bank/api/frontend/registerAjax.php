<?php
include_once __DIR__ . "/../../db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // dokolku pristapime so POST do stranava pravime povik do baza za zapisuvanje na nov user
    try{
        $email = $_POST["email"];
        // pravime hash-iran password za vo baza
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        // prvin pravime proverka dali postoi user so toj email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute(["email" => $email]);
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($user)){
            echo json_encode(["error" => "User exists, please login"]);
        }else{
            $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            // $id = $db->lastInsertId();
            echo json_encode(["success" => "user registered"]);
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
} elseif($_SERVER["REQUEST_METHOD"] == "GET")
{
    $sql = "SELECT * FROM nationality";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $nationality = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM branchoffices";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $branchoffices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["success" => 1, "branchoffices" =>$branchoffices, "nationality"=>$nationality]);
}else{
    die("You dont have access to this page!!");
}
