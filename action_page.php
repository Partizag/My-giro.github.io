<meta charset="utf-8">
<?php
    if (isset($_POST['name'])) { $login = $_POST['name']; if ($login == '') { unset($login);} } 
    if (isset($_POST['Email'])) { $password=$_POST['Email']; if ($password =='') { unset($password);} }
    
 if (empty($login) or empty($password))
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

    include ("bd.php");

    $result = mysql_query("SELECT ID FROM PR WHERE Email='$password'",$db);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['Email']))
        {
            if (!empty($myrow['ID'])) {
                exit ("Извините, введённый вами почта уже зарегистрирована. Введите другую почту.");
                }
                else{
        if ($myrow['Email']==$password) {
        $_SESSION['name']=$myrow['name']; 
        $_SESSION['ID']=$myrow['ID'];
        }
            else{
                $result2 = mysql_query ("INSERT INTO PR (name,Email) VALUES('$login','$password')");
            }
        }
    }
    if ($result2=='TRUE')
    {
    echo "Вы успешно подписаны!";
    }
 else {
    echo "Вы успешно подписаны!";
    }
    
    ?>