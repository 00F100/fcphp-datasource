<?php

namespace FcPhp\Datasource
{
    use FcPhp\Datasource\Interfaces\IFactory;
    use FcPhp\Datasource\Interfaces\ICriteria;

    abstract class Criteria implements ICriteria
    {
        protected $criteria;
        protected $factory;
        protected $where = [];
        protected $conditionString;
        protected $conditionInt;
        protected $conditionOr;
        protected $conditionAnd;
        protected $conditionSpace;

        public function __construct(string $criteria, IFactory $factory)
        {
            $this->criteria = $criteria;
            $this->factory = $factory;
        }

        public function getCriteria()
        {
            return $this->factory->getCriteria($this->criteria);
        }

        /**
         * Method to add "or" condition
         *
         * @param object $callback Callback to add conditions "or"
         * @return FcPhp\Datasource\Interfaces\ICriteria
         */
        public function or(object $callback) :ICriteria
        {
            $criteria = $this->getCriteria();
            $callback($criteria);
            $this->where[] = $this->conditionOr;
            $this->where[] = $criteria->getWhere();
            unset($criteria);
            unset($callback);
            return $this;
        }

        /**
         * Method to add "and" condition
         *
         * @param object $callback Callback to add conditions "and"
         * @return FcPhp\Datasource\Interfaces\ICriteria
         */
        public function and(object $callback) :ICriteria
        {
            $criteria = $this->getCriteria();
            $callback($criteria);
            $this->where[] = $this->conditionAnd;
            $this->where[] = $criteria->getWhere();
            unset($criteria);
            unset($callback);
            return $this;
        }

        /**
         * Method to add condition
         *
         * @param string $field Field to add condition
         * @param string $condition Condition to compare
         * @param string|int|bool $value Value to compare
         * @return FcPhp\Datasource\Interfaces\ICriteria
         */
        public function condition(string $field, string $condition, $value, bool $isColumn = false) :ICriteria
        {
            if(is_string($value) && !$isColumn) {
                $value = sprintf($this->conditionString, $value);
            }
            if(is_int($value) || $isColumn) {
                $value = sprintf($this->conditionInt, $value);
            }
            $this->where[] = $field . $this->conditionSpace . $condition . $this->conditionSpace . $value;
            return $this;
        }

        public function getWhere() :array
        {
            return $this->where;
        }
    }
}
