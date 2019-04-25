<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/24/2019
 * Time: 13:18
 */

class Page extends Model
{
    public function getList($only_published = true) {
        $sql = "select * from pages where 1";
        if( $only_published ){
            $sql .= " and is_published = 1";
        }
        var_dump($sql);
        return $this->db->query($sql);

    }

    public function getByAlias($alias) {
        $alias = $this->db->escape($alias);
        $sql = "select * from pages where alias = '{$alias}' limit 1";
        $result = $this->db->query($sql);
        return isset( $result[0] ) ? $result[0] : null;
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "select * from pages where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset( $result[0] ) ? $result[0] : null;
    }
}