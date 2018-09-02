<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Di\Facades\DiFacade;
use FcPhp\Datasource\Query;
use FcPhp\Datasource\Datasource;
use FcPhp\Datasource\Strategy;
use FcPhp\Datasource\Interfaces\IDatasource;
use FcPhp\Datasource\Interfaces\IStrategy;
use FcPhp\Datasource\Interfaces\IQuery;
use FcPhp\Datasource\Factories\Factory;

class DatasourceIntegrationTest extends TestCase
{
    public function setUp()
    {
        $this->di = DiFacade::getInstance();
        $this->strategies = [
            'datasource' => '\MockStrategyIntegration'
        ];
        $this->factory = new Factory('datasource', $this->strategies, $this->di);
        // $this->strategy = $this->factory->getStrategy();
        $this->query = $this->factory->getQuery();
        $this->instance = new MockIntergrationDatasource();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(IDatasource::class, $this->instance);
        $this->assertEquals(false, $this->instance->connect());
        $this->assertEquals(false, $this->instance->disconnect());
        $this->assertEquals(null, $this->instance->getStrategy());
        $this->assertEquals([], $this->instance->execute($this->query));
    }

    public function testQuerySelect()
    {
        $this->assertInstanceOf(IStrategy::class, $this->query->select());
    }

    public function testQueryFrom()
    {
        $this->assertInstanceOf(IStrategy::class, $this->query->from());
    }

    public function testQueryWhere()
    {
        $this->assertInstanceOf(IStrategy::class, $this->query->where());
    }

    /**
     * @expectedException FcPhp\Datasource\Exceptions\StrategyMethodNotFoundException
     */
    public function testCallMethodNotFoundStrategy()
    {
        $this->query->notFound();
    }

    /**
     * @expectedException FcPhp\Datasource\Exceptions\StrategyNotFoundException
     */
    public function testExceptionStrategyNotFound()
    {
        $this->factory = new Factory('notfound', $this->strategies, $this->di);
        $this->query = $this->factory->getQuery();
    }

    public function testNonUseDi()
    {
        $this->factory = new Factory('datasource', $this->strategies, null);
        $this->query = $this->factory->getQuery();
        $this->assertInstanceOf(IQuery::class, $this->query);
    }

    public function testGetCriteria()
    {
        $criteria = $this->factory->getCriteria();
        $this->assertInstanceOf(ICriteria::class, $criteria);
    }
}

class MockIntergrationDatasource extends Datasource
{

}

class MockStrategyIntegration extends Strategy
{

}
