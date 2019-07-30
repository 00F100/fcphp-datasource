<?php

namespace FcPhp\Datasource\Interfaces
{
    interface IDatasource
    {
        /**
         * Method to construct instace of Datasource
         *
         * @param FcPhp\Datasource\Interfaces\IAuth $auth
         * @param FcPhp\Datasource\Interfaces\ISource $source
         * @param FcPhp\Datasource\Interfaces\IRequest $request
         * @param FcPhp\Datasource\Interfaces\IResponse $response
         * @return void
         */
        public function __construct(IAuth $auth, ISource $source, IRequest $request, IResponse $response);

        /**
         * Method to connect from source
         *authauth
         * @return bool
         */
        public function connect() :bool;

        /**
         * Method to disconnect from source
         *
         * @return bool
         */
        public function disconnect() :bool;

        /**
         * Method to request something from source
         *
         * @param array $params
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function request(array $params) :IResponse
    }
}
