<?php

namespace FcPhp\Datasource\Interfaces
{
    interface IResponse
    {

        /**
         * Method to configure code
         *
         * @param int $code
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setCode(int $code) :IResponse;

        /**
         * Method to get code
         *
         * @return int
         */
        public function getCode() :int;

        /**
         * Method to configure error
         *
         * @param string $error
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setError(string $error) :IResponse;

        /**
         * Method to get error
         *
         * @return array
         */
        public function getError() :array;

        /**
         * Method to verify if have error
         *
         * @return bool
         */
        public function hasError() :bool;

        /**
         * Method to configure count
         *
         * @param int $count
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setCount(int $count) :IResponse;

        /**
         * Method to get count
         *
         * @return int
         */
        public function getCount() :int;

        /**
         * Method to configure data
         *
         * @param array $data
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setData(array $data) :IResponse;

        /**
         * Method to get data
         *
         * @return array
         */
        public function getData() :array;
    }
}
