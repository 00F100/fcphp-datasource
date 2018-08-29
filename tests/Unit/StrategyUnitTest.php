<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Datasource\Strategy;
use FcPhp\Datasource\Interfaces\IStrategy;

class StrategyUnitTest extends TestCase
{
    public function setUp()
    {
        $this->instance = new MockStrategyUnit();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(IStrategy::class, $this->instance);
    }

    public function testSelect()
    {
        $this->assertInstanceOf(IStrategy::class, $this->instance->select());
    }

    public function testFrom()
    {
        $this->assertInstanceOf(IStrategy::class, $this->instance->from());
    }

    public function testWhere()
    {
        $this->assertInstanceOf(IStrategy::class, $this->instance->where());
    }
}

class MockStrategyUnit extends Strategy
{

}
