<?php

namespace FerFabricio\Hydrator\Tests;

use FerFabricio\Hydrator\Extract;
use PHPUnit\Framework\TestCase;

class ExtractTest extends TestCase
{
    public function testExtractWithFullfilledObject()
    {
        $example = new Example();
        $example->setTest('test extract');
        $result = Extract::toArray($example);
        $this->assertSame($result['test'], 'test extract');
    }

    public function testWithChildObject()
    {
        $example = new Example();
        $example->setTest('test extract');
        $exampleOfExample = new Example();
        $exampleOfExample->setTest($example);
        $result = Extract::toArray($exampleOfExample);
        $this->assertArrayHasKey('test', $result);
        $this->assertSame($result['test']['test'], 'test extract');
    }

    public function testWithNotObject()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('toArray param require a object.');
        Extract::toArray('test');
    }

    public function testWithNullPropertyRemoval()
    {
        $example = new Example();
        $result = Extract::toArray($example, true);
        $this->assertSame($result, []);
    }
}
