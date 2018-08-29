<?php

namespace FcPhp\Datasource\Interfaces
{
    interface IDatasource
    {
        /**
         * Method to connect
         *
         * @return bool
         */
        public function connect() :bool;

        /**
         * Method to disconnect
         *
         * @return bool
         */
        public function disconnect() :bool;

        /**
         * Method to execute query
         *
         * @return array
         */
        public function execute(IQuery $query) :array;

        /**
         * Method to return strategy of query
         *
         * @return string|null
         */
        public function getStrategy();
    }
}
