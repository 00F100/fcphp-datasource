<?php

namespace FcPhp\Datasource
{
    use FcPhp\Query\Interfaces\IQuery;
    use FcPhp\Datasource\Interfaces\IDatasource;

    abstract class Datasource implements IDatasource
    {
        /**
         * Method to connect
         *
         * @return void
         */
        public function connect()
        {
            return null;
        }

        /**
         * Method to disconnect
         *
         * @return void
         */
        public function disconnect()
        {
            return null;
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
         * @return string|null
         */
        public function getStrategy()
        {
            return null;
        }
    }
}
