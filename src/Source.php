<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IAuth;
    use FcPhp\Datasource\Interfaces\ISource;
    use FcPhp\Datasource\Interfaces\IRequest;
    use FcPhp\Datasource\Interfaces\IResponse;

    abstract class Source implements ISource
    {
        /**
         * @var FcPhp\Datasource\Interfaces\IResponse
         */
        private $response;

        /**
         * Method to construct instance
         *
         * @param FcPhp\Datasource\Interfaces\IResponse $response
         * @return void
         */
        public function __construct(IResponse $response)
        {
            $this->response = $response;
        }

        /**
         * Method to connect from source
         *
         * @param FcPhp\Datasource\Interfaces\IAuth $auth
         * @return bool
         */
        public function connect(IAuth $auth) :bool
        {
            return true;
        }

        /**
         * Method to disconnect from source
         *
         * @return bool
         */
        public function disconnect() :bool
        {
            return true;
        }

        /**
         * Meethod to request from source
         *
         * @param FcPhp\Datasource\Interfaces\IRequest $request
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function request(IRequest $request) :IResponse
        {
            return $this->response;
        }
    }
}
