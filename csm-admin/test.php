<?php
include('../include/connect.php');
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false){

        die("Mauvais identifiant ou mauvais mot de passe");
    } else{

        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($validPassword){
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            header('Location: ../csm-admin/gestion.php');
            exit;
            
        } else{
            die('Mauvais identifiant ou mauvais mot de passe');
        }
    }
?>