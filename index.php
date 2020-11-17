<?php

require_once ('api/Admin.php');
require_once ('api/Manager.php');
require_once ('api/Client.php');

unset($_SESSION['userId']); //чтобы всегда логиниться заново
if ($_POST) {
    $userInfo = User::signIn($_POST['login'],$_POST['pass']);
    unset($_SESSION['lang']);
    switch ($userInfo['role']) {
        case 'admin':
            header("Location: admin.php");exit();
            break;
        case 'manager':
            header("Location: manager.php");exit();
            break;
        case 'client':
            header("Location: client.php");exit();
            break;
    }
} else {
    $users = User::getUsers(); // вызов статического метода (вызов метода класса без создания объекта)
    $userInfo = $users[$_SESSION['userId']];
    switch ($userInfo['role']) {
        case 'admin':
            header("Location: admin.php");exit();
            break;
        case 'manager':
            header("Location: manager.php");exit();
            break;
        case 'client':
            header("Location: client.php");exit();
            break;
    }
}
?>

<html>
<body>

<?php
echo "<form method='POST'>
        <label>Логин<input type='text' name='login'><br></label>
        <label>Пароль<input type='pass' name='pass'><br></label>" . "<input type='submit' name='submit' value='Вход'><br>
      </form>";

?>

</html>
</body>