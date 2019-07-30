<?php

namespace FcPhp\Datasource\Interfaces
{
    interface ISource
    {
        /**
         * Method to construct instance
         *
         * @param FcPhp\Datasource\Interfaces\IResponse $response
         * @return void
         */
        public function __construct(IResponse $response);

        /**
         * Method to connect from source
         *
         * @param FcPhp\Datasource\Interfaces\IAuth $auth
         * @return bool
         */
        public function connect(IAuth $auth) :bool;

        /**
         * Method to disconnect from source
         *
         * @return bool
         */
        public function disconnect() :bool;

        /**
         * Meethod to request from source
         *
         * @param FcPhp\Datasource\Interfaces\IRequest $request
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function request(IRequest $request) :IResponse;
    }
}
