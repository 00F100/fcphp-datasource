<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IQuery;
    use FcPhp\Repository\Interfaces\IFactory;
    use FcPhp\Datasource\Interfaces\IStrategy;
    use FcPhp\Datasource\Exceptions\StrategyNotFoundException;
    use FcPhp\Datasource\Exceptions\StrategyMethodNotFoundException;

    class Query implements IQuery
    {
        private $instance;
        private $strategy;
        private $factory;

        private $strategies = [
            'mysql' => 'FcPhp/Datasource/Strategies/MySQL',
            'postgresql' => 'FcPhp/Datasource/Strategies/PostgreSQL',
            'mongodb' => 'FcPhp/Datasource/Strategies/MongoDB',
            'soap' => 'FcPhp/Datasource/Strategies/SOAP',
            'request' => 'FcPhp/Datasource/Strategies/Request',
            'sqlserver' => 'FcPhp/Datasource/Strategies/SQLServer',
            'sqlite' => 'FcPhp/Datasource/Strategies/SQLite',
        ];
        
        public function __construct(IFactory $factory, string $strategy = null, array $strategies = null)
        {
            $this->strategy = $strategy;
            $this->factory = $factory;
            if(is_array($strategies) && count($strategies) > 0) {
                $this->strategies = array_merge($this->strategies, $strategies);
            }
            $this->make();
        }

        public function __call(string $method, array $args = [])
        {
            if(method_exists($this->strategy, $method)) {
                return call_user_func_array([$this->strategy, $method], $args);
            }
            throw new StrategyMethodNotFoundException();
        }

        private function make()
        {
            if(empty($this->strategy)) {
                $this->strategy = 'mysql';
            }
            if(isset($this->strategies[$this->strategy])) {
                $this->strategy = $this->factory->getStrategy($this->strategies[$this->strategy]);
                return true;
            }
            throw new StrategyNotFoundException();
            
        }
    }
}
