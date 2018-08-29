<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IQuery;
    use FcPhp\Datasource\Interfaces\IFactory;
    use FcPhp\Datasource\Interfaces\IStrategy;
    use FcPhp\Datasource\Exceptions\StrategyNotFoundException;
    use FcPhp\Datasource\Exceptions\StrategyMethodNotFoundException;

    class Query implements IQuery
    {
        private $instance;
        private $strategy;
        private $factory;
        
        public function __construct(IStrategy $strategy)
        {
            $this->strategy = $strategy;
        }

        public function __call(string $method, array $args = [])
        {
            if(method_exists($this->strategy, $method)) {
                return call_user_func_array([$this->strategy, $method], $args);
            }
            throw new StrategyMethodNotFoundException();
        }
    }
}
