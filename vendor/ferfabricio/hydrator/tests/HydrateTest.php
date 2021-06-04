<?php

namespace FerFabricio\Hydrator\Tests;

use FerFabricio\Hydrator\Hydrate;
use PHPUnit\Framework\TestCase;

class HydrateTest extends TestCase
{
    public function testSimpleObject()
    {
        $example = Hydrate::toObject(Example::class, ['test' => 'this is a test']);
        $this->assertSame($example->getTest(), 'this is a test');
    }
}
