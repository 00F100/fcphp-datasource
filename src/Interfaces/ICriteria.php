<?php

namespace FcPhp\Datasource\Interfaces
{
    interface ICriteria
    {
        public function __construct(string $criteria, IFactory $factory);
        public function getCriteria();
        public function or(object $callback) :ICriteria;
        public function and(object $callback) :ICriteria;
        public function condition(string $field, string $condition, $value) :ICriteria;
        public function getWhere() :array;
    }
}
