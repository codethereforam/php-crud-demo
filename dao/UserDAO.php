<?php
/**
 * Created by IntelliJ IDEA.
 * User: thinkam
 * Date: 1/23/18
 * Time: 9:02 PM
 */

namespace dao;

require_once(dirname(__FILE__) . '/../util/DatabaseUtil.php');
require_once(dirname(__FILE__) . '/../model/User.php');

use model\User;
use PDO;
use util\DatabaseUtil;

class UserDAO
{
    public function add(User $user)
    {
        $connection = DatabaseUtil::getConnection();
        $sql = 'INSERT INTO user(username, password) VALUES(:username, :password)';
        $stmt = $connection->prepare($sql);
        $username = $user->getUsername();
        $password = $user->getPassword();
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $success = $stmt->rowCount() > 0;
        $connection = null;
        return $success;
    }

    public function list()
    {
        $connection = DatabaseUtil::getConnection();
        $sql = 'SELECT * FROM user';
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $connection = null;

        $users = array();
        for ($i = 0; $i < count($result); $i++) {
            $r = $result[$i];
            $user = new User();
            $user->setId($r['id']);
            $user->setUsername($r['username']);
            $user->setPassword($r['password']);
            $users[$i] = $user;
        }
        return $users;
    }

    public function getById($id)
    {
        $connection = DatabaseUtil::getConnection();
        $sql = 'SELECT * FROM user WHERE id=:id';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $connection = null;

        $user = new User();
        $user->setId($result[0]['id']);
        $user->setUsername($result[0]['username']);
        $user->setPassword($result[0]['password']);
        return $user;
    }

    public function deleteById($id)
    {
        $connection = DatabaseUtil::getConnection();
        $sql = 'DELETE FROM user WHERE id=:id';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $success = $stmt->rowCount() > 0;
        $connection = null;
        return $success;
    }

    public function update(User $user)
    {
        $connection = DatabaseUtil::getConnection();
        $sql = 'UPDATE user SET username=:username, password=:password WHERE id=:id';
        $stmt = $connection->prepare($sql);
        $id = $user->getId();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $success = $stmt->rowCount() > 0;
        $connection = null;
        return $success;
    }
}