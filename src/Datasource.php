<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IAuth;
    use FcPhp\Datasource\Interfaces\ISource;
    use FcPhp\Datasource\Interfaces\IRequest;
    use FcPhp\Datasource\Interfaces\IResponse;
    use FcPhp\Datasource\Interfaces\IDatasource;

    abstract class Datasource implements IDatasource
    {
        /**
         * @var FcPhp\Datasource\Interfaces\IAuth
         */
        private $auth;

        /**
         * @var FcPhp\Datasource\Interfaces\ISource
         */
        private $source;

        /**
         * @var FcPhp\Datasource\Interfaces\IRequest
         */
        private $request;

        /**
         * @var string|int
         */
        private $connection_id;

        /**
         * Method to construct instace of Datasource
         *
         * @param FcPhp\Datasource\Interfaces\IAuth $auth
         * @param FcPhp\Datasource\Interfaces\ISource $source
         * @param FcPhp\Datasource\Interfaces\IRequest $request
         * @return void
         */
        public function __construct(IAuth $auth, ISource $source, IRequest $request)
        {
            $this->auth = $auth;
            $this->source = $source;
            $this->request = $request;
        }

        /**
         * Method to connect from source
         *authauth
         * @return bool
         */
        public function connect() :bool
        {
            return $this->source->connect($this->auth);
        }

        /**
         * Method to disconnect from source
         *
         * @return bool
         */
        public function disconnect() :bool
        {
            return $this->source->disconnect();
        }

        /**
         * Method to request something from source
         *
         * @param array $params
         * @return FcPhp\Datasource\Interfaces\IResponse
         */
        public function request(array $params) :IResponse
        {
            $this->request->merge($params);
            return $this->source->request($this->request);
        }
    }
}
