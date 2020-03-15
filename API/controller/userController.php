<?php

require_once ('../model/userManager.php');

class userController
{
    public function userLog($pseudo, $password)
    {
        $password_hash = hash('sha512', $password);

        $userManager = new userManager();
        $result = $userManager->log($pseudo, $password_hash);
        if($result == true)
            {
                session_start();
                $_SESSION['pseudo'] = $pseudo;
                $logs['success'] = true;
                $logs['user'] = $result;
            }
        else
            {
                $logs['success'] = false;
                $logs['message'] = "Mot de passe on pseudo incorrect";
            }

        print_r(json_encode($logs));
    }

}