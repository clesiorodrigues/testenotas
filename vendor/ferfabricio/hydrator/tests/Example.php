<?php

namespace FerFabricio\Hydrator\Tests;

use FerFabricio\Hydrator\Extract;

class Example
{
    private $test;

    public function setTest($test)
    {
        $this->test = $test;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function toArray()
    {
        return Extract::toArray($this);
    }
}
