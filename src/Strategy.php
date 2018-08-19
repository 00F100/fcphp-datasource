<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IStrategy;

    abstract class Strategy implements IStrategy
    {
        public function select() :IStrategy
        {
            return $this;
        }

        public function from() :IStrategy
        {
            return $this;
        }

        public function where() :IStrategy
        {
            return $this;
        }
    }
}
