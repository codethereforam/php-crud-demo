<?php
require_once('util/StringUtil.php');
require_once('dao/UserDAO.php');
require_once('model/User.php');

use dao\UserDAO;
use model\User;
use util\StringUtil;

$URI = $_SERVER["REQUEST_URI"];
$id = StringUtil::getUrlParam('id', $URI);
$username = StringUtil::getUrlParam('username', $URI);
$password = StringUtil::getUrlParam('password', $URI);

$action = $_POST['action'];
if ($action != null && $action === 'modify') {
    $id = StringUtil::dealInput($_POST['id']);
    $username = StringUtil::dealInput($_POST['username']);
    $password = StringUtil::dealInput($_POST['password']);
//    echo $id . '|' . $username . '|' . $password;

    $user = new User();
    $user->setId($id);
    $user->setUsername($username);
    $user->setPassword($password);

    $userDAO = new UserDAO();
    $success = $userDAO->update($user);
    if ($success) {
        Header("Location: index.php");
        return;
    } else {
        echo '<script>alert("modify fail!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>modify user</title>
</head>
<body>
<div align="center">
    <a href="index.php" target="_self">home</a>
</div>
<form action="modify.php" method="post">
    <input hidden name="action" value="modify">
    <input hidden name="id" value="<?php echo $id ?>">
    <table align="center" border="1">
        <tr>
            <td><label for="username">username:</label></td>
            <td><input id="username" name="username" value="<?php echo $username ?>"/></td>
        </tr>
        <tr>
            <td><label for="password">password:</label></td>
            <td><input id="password" type="password" name="password" value="<?php echo $password ?>"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button>modify</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>