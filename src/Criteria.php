<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IFactory;
    use FcPhp\Datasource\Interfaces\ICriteria;

    abstract class Criteria implements ICriteria
    {
        protected $criteria;
        protected $factory;
        protected $content = [];

        public function __construct(IFactory $factory)
        {
            $this->factory = $factory;
        }

        public function getCriteria()
        {
            return $this->factory->getCriteria();
        }
    }
}
