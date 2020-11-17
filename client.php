<?php

require_once ('api/Admin.php');
require_once ('api/Client.php');

if ($_POST) {
    User::setLang($_POST['lang']);
}

$users = User::getUsers();

$user = new Client($users[$_SESSION['userId']]);

switch ($users[$_SESSION['userId']]['role']) {
    case 'admin':
        $user = new Admin($users[$_SESSION['userId']]);
        break;
    case 'client':
        $user = new Client($users[$_SESSION['userId']]);
        break;
    default:
        header('HTTP/1.0 403 Forbidden');die();
        break;
}

echo '<span>'.$user->getHello().'</span>';
?>

<html>
<body>

<?php
echo '<form method="POST">
        <label>'.$user->getLangTitle().'
            <select name="lang">
                <option value="ru"'.($user->lang == 'ru'?' selected': '').'>ru</option>
                <option value="ua"'.($user->lang == 'ua'?' selected': '').'>ua</option>
                <option value="en"'.($user->lang == 'en'?' selected': '').'>en</option>
                <option value="it"'.($user->lang == 'it'?' selected': '').'>it</option>
            </select>
        </label>
        <input type="submit" value="'.$user->getLangTitle().'"/>
      </form>';

?>

</html>
</body>