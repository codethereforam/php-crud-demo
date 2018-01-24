<?php
require_once('util/StringUtil.php');
require_once('dao/UserDAO.php');
require_once('model/User.php');

use dao\UserDAO;
use model\User;
use util\StringUtil;

if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $username = StringUtil::dealInput($_POST['username']);
    $password = StringUtil::dealInput($_POST['password']);

    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);

    $userDAO = new UserDAO();
    $success = $userDAO->add($user);
    if ($success) {
        Header("Location: index.php");
        return;
    } else {
        echo '<script>alert("add fail!")</script>';
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
    <input hidden name="action" value="add"/>
    <table align="center" border="1">
        <tr>
            <td><label for="username">username:</label></td>
            <td><input id="username" name="username"/></td>
        </tr>
        <tr>
            <td><label for="password">password:</label></td>
            <td><input id="password" type="password" name="password"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="add"/></td>
        </tr>
    </table>
</form>
</body>
</html>