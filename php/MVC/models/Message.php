<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/24/2019
 * Time: 14:40
 */

class Message extends Model
{
    public function save($data, $id = null) {
        if( !isset($data['name']) || !isset($data['email']) || !isset($data['message']) ) {
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        if( !$id ){
            $sql = "
                insert into messages
                set name    = '{$name}',
                    email   = '{$email}',
                    message = '{$message}'
            ";
        } else {
            $sql = "
                update into messages
                set name    = '{$name}',
                    email   = '{$email}',
                    message = '{$message}'
                where id = {$id}
            ";
        }
        return $this->db->query($sql);
    }
}