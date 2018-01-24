<?php
require_once('dao/UserDAO.php');
require_once('util/StringUtil.php');

use dao\UserDAO;
use util\StringUtil;

$userDAO = new UserDAO();

//delete
$URI = $_SERVER["REQUEST_URI"];
$action = StringUtil::getUrlParam('action', $URI);
if ($action === 'del') {
    $id = StringUtil::getUrlParam('id', $URI);
    $success = $userDAO->deleteById($id);
    $_SERVER["REQUEST_URI"] = 'www.baidu.com';
    if ($success) {
        Header("Location: index.php");
    } else {
        echo '<script>alert("delete fail!")</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
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
    //list
    foreach ($userDAO->list() as $user) {
        $id = $user->getId();
        $username = $user->getUsername();
        $password = $user->getPassword();
        ?>
        <tr>
            <td><?php echo $id ?></td>
            <td><a href="detail.php?id=<?php echo $id ?>"><?php echo $username ?></a></td>
            <td><?php echo $password ?></td>
            <td>
                <a href="modify.php?id=<?php echo $id ?>&username=<?php echo $username ?>&password=<?php echo $password ?>">modify</a>
                <a href="index.php?id=<?php echo $id ?>&action=del">DEL</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>