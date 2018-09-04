<?php

namespace FcPhp\Datasource\Factories
{
    use FcPhp\Di\Interfaces\IDi;
    use FcPhp\Di\Facades\DiFacade;
    use FcPhp\Datasource\Interfaces\IFactory;
    use FcPhp\Datasource\Query;
    use FcPhp\Datasource\Interfaces\IQuery;
    use FcPhp\Datasource\Interfaces\IStrategy;
    use FcPhp\Datasource\Interfaces\ICriteria;
    use FcPhp\Datasource\Criteria;
    use FcPhp\Datasource\Exceptions\StrategyNotFoundException;

    class Factory implements IFactory
    {
        private $strategies = [];
        // private $strategies = [
        //     'mysql' => 'FcPhp/Datasource/MySQL/Strategies/MySQLStrategy',
        //     'postgresql' => 'FcPhp/PostgreSQL/Strategies/PostgreSQL',
        //     'sqlserver' => 'FcPhp/SQLServer/Strategies/SQLServer',
        //     'sqlite' => 'FcPhp/SQLite/Strategies/SQLite',
        //     'mongodb' => 'FcPhp/MongoDB/Strategies/MongoDB',
        //     'soap' => 'FcPhp/SOAP/Strategies/SOAP',
        //     'ldap' => 'FcPhp/Ldap/Strategies/Ldap',
        //     'rest' => 'FcPhp/Rest/Strategies/Rest',
        //     'file' => 'FcPhp/File/Strategies/File',
        //     'amazon-bucket' => 'FcPhp/Amazon/Strategies/Bucket',
        //     'amazon-log' => 'FcPhp/Amazon/Strategies/Log',
        //     'amazon-sqs' => 'FcPhp/Amazon/Strategies/Sqs',
        //     'amazon-redshift' => 'FcPhp/Amazon/Strategies/Redshift',
        // ];
        private $criteria;
        private $criterias = [];
        // private $criterias = [
        //     'mysql' => 'FcPhp/Datasource/MySQL/Criterias/MySQL',
        //     'postgresql' => 'FcPhp/PostgreSQL/Criterias/PostgreSQL',
        //     'sqlserver' => 'FcPhp/SQLServer/Criterias/SQLServer',
        //     'sqlite' => 'FcPhp/SQLite/Criterias/SQLite',
        //     'mongodb' => 'FcPhp/MongoDB/Criterias/MongoDB',
        //     'soap' => 'FcPhp/SOAP/Criterias/SOAP',
        //     'ldap' => 'FcPhp/Ldap/Criterias/Ldap',
        //     'rest' => 'FcPhp/Rest/Criterias/Rest',
        //     'file' => 'FcPhp/File/Criterias/File',
        //     'amazon-bucket' => 'FcPhp/Amazon/Criterias/Bucket',
        //     'amazon-log' => 'FcPhp/Amazon/Criterias/Log',
        //     'amazon-sqs' => 'FcPhp/Amazon/Criterias/Sqs',
        //     'amazon-redshift' => 'FcPhp/Amazon/Criterias/Redshift',
        // ];
        public function __construct(string $strategy, string $criteria, array $strategies, array $criterias, IDi $di = null)
        {
            $this->strategies = $strategies;
            $this->criteria = $criteria;
            $this->criterias = $criterias;
            $this->strategy = $strategy;
            $this->di = $di;
        }

        public function getQuery() :IQuery
        {
            if(!isset($this->strategies[$this->strategy])) {
                throw new StrategyNotFoundException();
            }
            $strategy = $this->strategies[$this->strategy];
            if($this->di instanceof IDi) {
                if(!$this->di->has('FcPhp/Datasource/Query')) {
                    $this->di->setNonSingleton('FcPhp/Datasource/Query', 'FcPhp\Datasource\Query');
                }
                return $this->di->make('FcPhp/Datasource/Query', ['strategy' => $this->getStrategy($strategy)]);
            }
            return new Query($this->getStrategy($strategy));
        }

        public function getStrategy(string $alias) :IStrategy
        {
            $namespace = str_replace('/', '\\', $alias);
            if($this->di instanceof IDi) {
                if(!$this->di->has($alias)) {
                    $this->di->setNonSingleton($alias, $namespace);
                }
                $factory = $this;
                return $this->di->make($alias, ['factory' => $factory]);
            }
            return new $namespace();
        }

        public function getCriteria() :ICriteria
        {
            $factory = $this;
            $criteria = $this->criteria;
            if(isset($this->criterias[$criteria])) {
                $alias = $this->criterias[$criteria];
                $namespace = str_replace('/', '\\', $alias);
                if($this->di instanceof IDi) {
                    if(!$this->di->has($alias)) {
                        $this->di->setNonSingleton($alias, $namespace);
                    }
                    return $this->di->make($alias, compact('criteria', 'factory'));
                }
                return new $namespace($factory);
            }
            
        }
    }
}
