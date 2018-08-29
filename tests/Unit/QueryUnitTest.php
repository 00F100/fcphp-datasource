<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Datasource\Query;
use FcPhp\Datasource\Interfaces\IQuery;

class QueryUnitTest extends TestCase
{
    public function setUp()
    {
        $this->strategy = $this->getMockBuilder('FcPhp\Datasource\Interfaces\IStrategy')
            ->setMethods(['getContent'])
            ->getMock();

        $this->strategy
            ->expects($this->any())
            ->method('getContent')
            ->will($this->returnValue('content'));

        $this->instance = new Query($this->strategy);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(IQuery::class, $this->instance);
    }

    public function testCallMethodStrategy()
    {
        $this->assertEquals('content', $this->instance->getContent());
    }

    /**
     * @expectedException FcPhp\Datasource\Exceptions\StrategyMethodNotFoundException
     */
    public function testCallMethodNotFoundStrategy()
    {
        $this->instance->notFound();
    }
}
