<?php

namespace FcPhp\Datasource\Interfaces
{
    interface IQuery
    {
        public function __construct(IStrategy $strategy);

        public function __call(string $method, array $args = []);
    }
}
