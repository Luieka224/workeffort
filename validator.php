<?php

    include 'config.php';

    class userClass {
        function userVerify($username, $password) {
            $db = getDB();
    
            $hashed_password = hash('sha256', $password);
    
            $stmt = $db->prepare("SELECT uid FROM user_login WHERE userID=:username AND password=:hashed_password");
    
            $stmt->bindParam("username", $username, PDO::PARAM_STR);
            $stmt->bindParam("hashed_password", $hashed_password, PDO::PARAM_STR);
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count)
            {
                $_SESSION['uid'] = $data->uid;
                return true;
            } else {
                return false;
            }
        }
    }
?>