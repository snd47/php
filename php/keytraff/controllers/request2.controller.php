<?php

class Request2Controller extends Controller
{
    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Req2();
    }

    public function index(){
        $this->data['request2'] =  $this->model->getList2();
    }

   
}