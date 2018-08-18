<?php

namespace FcPhp\Datasource\Interfaces
{
    use FcPhp\Query\Interfaces\IQuery;

    interface IDatasource
    {
        /**
         * Method to connect
         *
         * @return void
         */
        public function connect();

        /**
         * Method to disconnect
         *
         * @return void
         */
        public function disconnect();

        /**
         * Method to execute query
         *
         * @return array
         */
        public function execute(IQuery $query) :array;
    }
}
