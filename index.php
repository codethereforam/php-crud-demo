<?php
require_once('dao/UserDAO.php');
require_once('model/User.php');

use dao\UserDAO;

$userDAO = new UserDAO();
$users = $userDAO->list();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>get users list</title>
</head>
<body>
<div align="center">
    <a href="add.php">add</a>
</div>
<table align="center" border="1">
    <tr>
        <th>ID</th>
        <th>username</th>
        <th>password</th>
        <th>manage</th>
    </tr>
    <?php
    foreach ($users as $u) {
        ?>
        <tr>
            <td><?php echo $u->getId() ?></td>
            <td><a href="detail.html?id={{user.id}}"><?php echo $u->getUsername() ?></a></td>
            <td><?php echo $u->getPassword() ?></td>
            <td><a href="modify.html?id={{user.id}}">modify</a> <a href="javascript:void(0)">DEL</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>