<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IFactory;
    use FcPhp\Datasource\Interfaces\ICriteria;

    abstract class Criteria implements ICriteria
    {
        protected $criteria;
        protected $factory;

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
