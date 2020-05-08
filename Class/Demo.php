<?php

class Demo
{
    public function index()
    {
        $this->a = 22;
        return $this;
    }

    public function update()
    {
        return $this;
    }
}