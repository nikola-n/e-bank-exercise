<?php
include_once __DIR__ . "/db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute(["email" => $email]);
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // proveruvame dali postoi user so toj email dokolku ne vrakame greska
        if(count($user) == 0){
            echo json_encode(["error" => "No user with that email, please register"]);
        }else{
        // dokolku e pronajden user so vneseniot email pravime proverka dali e validen passwprd-ot shto go imame vneseno vo input, password_verify() raboti vo kombinacija password_hash()
            $validPassword = password_verify($password, $user[0]["password"]);
            if($validPassword === true){
                // dokolku e tocen password-ot pravime proverka dali e admin, ako e admin togas gi zemame podatocite shto ni trebaat za site user-i
                if($user[0]["is_admin"] == 1){
                    try{
                        $sql = "SELECT users.id, users.email, users.active, users.accountNum, clients.isResident, clients.firstName, clients.lastName, clients.fatherName, companies.name AS companyName
                        FROM users
                        LEFT JOIN clients ON users.id = clients.user_id
                        LEFT JOIN companies ON users.id = companies.user_id
                        WHERE users.is_admin <> 1";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo json_encode($users);
                        
                    }catch (PDOException $e){
                        echo $e->getMessage();
                    }
                }else{
                    echo json_encode(["user"=>"only admins can login for now"]);
                    // nesto treba da pravime so drugite useri 
                }
            }else{
                echo json_encode(["error" => "Wrong password"]);
            }
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}else{
    die("You dont have access to this page!!");
}