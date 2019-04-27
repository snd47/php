<?php

class User extends Model {
    public function getByLogin($login) {
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        var_dump($result);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }
}