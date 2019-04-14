<?php

class Db
{
    protected $connection;

    public function __construct($host, $user, $password, $db_name){
        $this->connection = new mysqli($host, $user, $password, $db_name);

        if( mysqli_connect_error() ){
            throw new Exception('Could not connect to DB');
        }

        /*  utf8 */
        if (!$this->connection->set_charset("utf8")) {
            printf("Ошибка при загрузке набора символов utf8: %s\n", $this->connection->error);
            exit();
        } else {
             $this->connection->character_set_name();
        }
    }

    public function query($sql){
        if ( !$this->connection ){
            return false;
        }

        $result = $this->connection->query($sql);

        if( mysqli_error($this->connection) ){
            throw new Exception(mysqli_error($this->connection));
        }

        if( is_bool($result)){
            return $result;
        }

        $data = array();

        while( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }
        return $data;
    }

    public function escape($str) {
        return mysqli_escape_string($this->connection, $str);
    }

}