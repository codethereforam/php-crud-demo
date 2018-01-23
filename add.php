<?php
//error_log($_POST['action'] . "**\r", 3, 'php.log');

require('util/StringUtil.php');
require('dao/UserDAO.php');
require('model/User.php');

use dao\UserDAO;
use model\User;
use util\StringUtil;

$action = $_POST['action'];
if($action != null && $action === 'add') {
    $username = StringUtil::dealInput($_POST['username']);
    $password = StringUtil::dealInput($_POST['password']);

    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);

    $userDAO = new UserDAO();
    $success =  $userDAO->add($user);
    if($success) {
        echo 'success';
    } else {
        echo 'fail';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add user</title>
</head>
<body>
<div align="center">
    <a href="index.php">home</a>
</div>
<form method="post" action="add.php">
    <input hidden name="action" value="add" />
    <table align="center" border="1">
        <tr>
            <td><label for="username">username:</label></td>
            <td><input name="username"/></td>
        </tr>
        <tr>
            <td><label for="password">password:</label></td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="add"/></td>
        </tr>
    </table>
</form>
<!--<div align="center">{{msg}}</div>-->
</body>
</html>