<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IAuth;

    abstract class Auth implements IAuth
    {
        /**
         * @var string
         */
        private $username;

        /**
         * @var string
         */
        private $password;

        /**
         * @var string
         */
        private $host;

        /**
         * @var string
         */
        private $port;

        /**
         * @var string
         */
        private $schema;

        /**
         * Method to configure username
         *
         * @param string $username
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setUsername(string $username) :IAuth
        {
            $this->username = $username;
            return $this;
        }

        /**
         * Method to return username
         *
         * @return string
         */
        public function getUsername() :string
        {
            return $this->username;
        }

        /**
         * Method to configure password
         *
         * @param string $password
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setPassword(string $password) :IAuth
        {
            $this->password = $password;
            return $this;
        }

        /**
         * Method to return password
         *
         * @return string
         */
        public function getPassword() :string
        {
            return $this->password;
        }

        /**
         * Method to configure host
         *
         * @param string $host
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setHost(string $host) :IAuth
        {
            $this->host = $host;
            return $this;
        }

        /**
         * Method to return host
         *
         * @return string
         */
        public function getHost() :string
        {
            return $this->host;
        }

        /**
         * Method to configure port
         *
         * @param string $port
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setPort(string $port) :IAuth
        {
            $this->port = $port;
            return $this;
        }

        /**
         * Method to return port
         *
         * @return string
         */
        public function getPort() :string
        {
            return $this->port;
        }

        /**
         * Method to configure schema
         *
         * @param string $schema
         * @return FcPhp\Datasource\Interfaces\IAuth
         */
        public function setSchema(string $schema) :IAuth
        {
            $this->schema = $schema;
            return $this;
        }

        /**
         * Method to return schema
         *
         * @return string
         */
        public function getSchema() :string
        {
            return $this->schema;
        }
    }
}
