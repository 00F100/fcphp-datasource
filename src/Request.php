<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IRequest;

    abstract class Request implements IRequest
    {
        /**
         * Method to merge params into request
         *
         * @param array $params
         * @return FcPhp\Datasource\Interfaces\IRequest
         */
        public function merge(array $params) :IRequest
        {
            foreach($params as $param => $value) {
                $this->{$param} = $value;
            }
            return $this;
        }
    }
}
