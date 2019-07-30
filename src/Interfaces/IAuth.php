<?php

namespace FcPhp\Datasource\Interfaces
{
    interface IAuth
    {

        /**
         * Method to configure username
         *
         * @param string $username
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setUsername(string $username) :IAuth;

        /**
         * Method to return username
         *
         * @return string
         */
        public function getUsername() :string;

        /**
         * Method to configure password
         *
         * @param string $password
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setPassword(string $password) :IAuth;

        /**
         * Method to return password
         *
         * @return string
         */
        public function getPassword() :string;

        /**
         * Method to configure host
         *
         * @param string $host
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setHost(string $host) :IAuth;

        /**
         * Method to return host
         *
         * @return string
         */
        public function getHost() :string;

        /**
         * Method to configure port
         *
         * @param string $port
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setPort(string $port) :IAuth;

        /**
         * Method to return port
         *
         * @return string
         */
        public function getPort() :string;

        /**
         * Method to configure schema
         *
         * @param string $schema
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setSchema(string $schema) :IAuth;

        /**
         * Method to return schema
         *
         * @return string
         */
        public function getSchema() :string;
    }
}
