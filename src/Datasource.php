<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IQuery;
    use FcPhp\Datasource\Interfaces\IDatasource;
    use FcPhp\Datasource\Interfaces\IStrategy;

    abstract class Datasource implements IDatasource
    {
        protected $isConnected;
        protected $strategy;

        /**
         * Method to construct instance
         *
         * @param IStrategy $strategy Strategy to use
         */
        public function __construct(IStrategy $strategy)
        {
            $this->strategy = $strategy;
        }

        /**
         * Method to connect
         *
         * @return bool
         */
        public function connect() :bool
        {
            return false;
        }

        /**
         * Method to disconnect
         *
         * @return bool
         */
        public function disconnect() :bool
        {
            return false;
        }

        /**
         * Method to execute query
         *
         * @return array
         */
        public function execute(IQuery $query) :array
        {
            return [];
        }

        /**
         * Method to return strategy of query
         *
         * @return string
         */
        public function getStrategy() :string
        {
            return $this->strategy;
        }
    }
}
