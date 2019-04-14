<?php

class Request1Controller extends Controller
{
    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Req1();
    }

    public function index(){
        $this->data['request1'] =  $this->model->getList();
    }

   
}