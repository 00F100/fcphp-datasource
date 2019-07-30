<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IResponse;

    abstract class Response implements IResponse
    {
        /**
         * @var int
         */
        private $code;

        /**
         * @var array
         */
        private $error = [];

        /**
         * @var int
         */
        private $count;

        /**
         * @var array
         */
        private $data = [];

        /**
         * Method to configure code
         *
         * @param int $code
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setCode(int $code) :IResponse
        {
            $this->code = $code;
            return $this;
        }

        /**
         * Method to get code
         *
         * @return int
         */
        public function getCode() :int
        {
            return $this->code;
        }

        /**
         * Method to configure error
         *
         * @param string $error
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setError(string $error) :IResponse
        {
            $this->error[] = $error;
            return $this;
        }

        /**
         * Method to get error
         *
         * @return array
         */
        public function getError() :array
        {
            return $this->error;
        }

        /**
         * Method to verify if have error
         *
         * @return bool
         */
        public function hasError() :bool
        {
            return count($this->error) > 0;
        }

        /**
         * Method to configure count
         *
         * @param int $count
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setCount(int $count) :IResponse
        {
            $this->count = $count;
            return $this;
        }

        /**
         * Method to get count
         *
         * @return int
         */
        public function getCount() :int
        {
            return $this->count;
        }

        /**
         * Method to configure data
         *
         * @param array $data
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function setData(array $data) :IResponse
        {
            $this->data = $data;
            return $this;
        }

        /**
         * Method to get data
         *
         * @return array
         */
        public function getData() :array
        {
            return $this->data;
        }
    }
}
