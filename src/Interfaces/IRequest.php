<?php

namespace FcPhp\Datasource\Interfaces
{
    interface IRequest
    {
        /**
         * Method to merge params into request
         *
         * @param array $params
         * @return FcPhp\Datasource\Interfaces\IRequest
         */
        public function merge(array $params) :IRequest;
    }
}
