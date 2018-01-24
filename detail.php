<?php
require_once('util/StringUtil.php');
require_once('dao/UserDAO.php');

$id = \util\StringUtil::getUrlParam('id', $_SERVER["REQUEST_URI"]);
$userDAO = new \dao\UserDAO();
$user = $userDAO->getById($id);
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>detail</title>
</head>
<body>
<div align="center">
    <a href="index.php" target="_self">home</a>
</div>
<table align="center" border="1">
    <tr>
        <th>ID</th>
        <th>username</th>
        <th>password</th>
    </tr>
    <tr>
        <td><?php echo $user->getId() ?></td>
        <td><?php echo $user->getUsername() ?></td>
        <td><?php echo $user->getPassword() ?></td>
    </tr>
</table>
</body>
</html>