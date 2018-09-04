<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IStrategy;
    use FcPhp\Datasource\Interfaces\IFactory;

    abstract class Strategy implements IStrategy
    {
        protected $factory;
        protected $criteria;

        public function __construct(string $criteria, IFactory $factory)
        {
            $this->criteria = $criteria;
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
            $this->factory->getCriteria($this->criteria);
        }
    }
}
