<?php

namespace TeamZac\OpenZac;

class Resource
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __get($key) 
    {
        return data_get($this->data, $key);
    }
}
