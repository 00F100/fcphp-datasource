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

        public function getCriteria()
        {
            return $this->factory->getCriteria($this->criteria);
        }
    }
}
