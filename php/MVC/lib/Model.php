<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/24/2019
 * Time: 13:06
 */

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = App::$db;
    }
}