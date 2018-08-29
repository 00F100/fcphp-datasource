<?php

namespace FcPhp\Datasource\Interfaces
{
    use FcPhp\Di\Interfaces\IDi;
    
    interface IFactory
    {
        public function __construct(string $strategy, array $strategies, IDi $di = null);
        public function getQuery() :IQuery;
        public function getStrategy(string $alias) :IStrategy;
    }
}
