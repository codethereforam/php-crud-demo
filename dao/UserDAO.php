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

use PDO;
use model\User;
use util\DatabaseUtil;

class UserDAO
{
    public function add(User $user) {
        $connection = DatabaseUtil::getConnection();
        $sql = 'insert into user(username, password) values(:username, :password)';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':username', $user->getUsername());
        $stmt->bindParam(':password', $user->getPassword());
        $stmt->execute();
        $success = $stmt->rowCount() > 0;
        $connection = null;
        return $success;
    }

    public function list() {
        $connection = DatabaseUtil::getConnection();
        $sql = 'select * from user';
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
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

    public function getById($id) {

    }

    public function deleteById($id) {

    }

    public function update(User $user) {

    }
}