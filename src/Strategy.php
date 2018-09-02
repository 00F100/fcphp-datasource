<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IStrategy;
    use FcPhp\Datasource\Interfaces\IFactory;

    abstract class Strategy implements IStrategy
    {
        protected $factory;

        public function __construct(IFactory $factory)
        {
            $this->factory = $factory;
        }

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

        protected function getCriteria()
        {
            $this->factory->getCriteria();
        }
    }
}
