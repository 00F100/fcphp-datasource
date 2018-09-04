<?php

namespace FcPhp\Datasource\Interfaces
{
    use FcPhp\Di\Interfaces\IDi;
    
    interface IFactory
    {
        public function __construct(array $strategies, array $criterias, IDi $di = null);
        public function getQuery(string $strategy) :IQuery;
        public function getCriteria(string $criteria) :ICriteria;
    }
}
