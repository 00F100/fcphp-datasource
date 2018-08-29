<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Datasource\Datasource;
use FcPhp\Datasource\Interfaces\IDatasource;
use FcPhp\Datasource\Interfaces\IQuery;

class DatasourceUnitTest extends TestCase
{
    public function setUp()
    {
        $this->query = $this->createMock('FcPhp\Datasource\Interfaces\IQuery');
        $this->instance = new MockDatasource();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(IDatasource::class, $this->instance);
        $this->assertEquals(false, $this->instance->connect());
        $this->assertEquals(false, $this->instance->disconnect());
        $this->assertEquals(null, $this->instance->getStrategy());
        $this->assertEquals([], $this->instance->execute($this->query));
    }
}

class MockDatasource extends Datasource
{
}
