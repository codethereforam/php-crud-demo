<?php
/**
 * Created by IntelliJ IDEA.
 * User: thinkam
 * Date: 1/23/18
 * Time: 9:02 PM
 */

namespace dao;
require(dirname(__FILE__) . '/../util/DatabaseUtil.php');

use util\DatabaseUtil;

class UserDAO
{
    public function add($user) {
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

    }

    public function getById($id) {

    }

    public function deleteById($id) {

    }

    public function update($user) {

    }
}