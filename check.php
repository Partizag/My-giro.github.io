<?php
class check{
    public function ch($login,$password){
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    return array ($login,$password);
    }
}
?>