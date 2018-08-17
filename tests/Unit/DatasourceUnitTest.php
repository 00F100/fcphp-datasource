<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Datasource\Datasource;
use FcPhp\Datasource\Interfaces\IDatasource;

class DatasourceUnitTest extends TestCase
{
    public function setUp()
    {
        $this->instance = new Datasource();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(IDatasource::class, $this->instance);
        $this->assertNull($this->instance->connect());
        $this->assertNull($this->instance->disconnect());
        $this->assertTrue(is_array($this->instance->execute([])));
    }
}
