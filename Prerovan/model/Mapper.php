<?php

namespace Prerovan\Model;

use LeanMapper\Caller;
use LeanMapper\DefaultMapper;
use LeanMapper\Exception\InvalidStateException;
use LeanMapper\ImplicitFilters;
use LeanMapper\Row;
use Prerovan\Model\Entity\Article;

class Mapper extends DefaultMapper
{

    public function __construct($NS)
    {
        $this->defaultEntityNamespace = $NS;
    }


    public function getTable($entityClass)
    {
        return self::toUnderScore($this->trimNamespace($entityClass));
    }

    public static function toUnderScore($str)
    {
        return lcfirst(preg_replace_callback('#(?<=.)([A-Z])#', function ($m) {
            return '_' . strtolower($m[1]);
        }, $str));
    }

    public function getEntityClass($table, Row $row = NULL)
    {
        return ($this->defaultEntityNamespace !== NULL ? $this->defaultEntityNamespace . '\\' : '') . ucfirst(self::toCamelCase($table));
    }

    public static function toCamelCase($str)
    {
        return preg_replace_callback('#_(.)#', function ($m) {
            return strtoupper($m[1]);
        }, $str);
    }

    public function getColumn($entityClass, $field)
    {
        return self::toUnderScore($field);
    }

    public function getEntityField($table, $column)
    {
        return self::toCamelCase($column);
    }

    public function getTableByRepositoryClass($repositoryClass)
    {
        $matches = array();
        if (preg_match('#([a-z0-9]+)repository$#i', $repositoryClass, $matches)) {
            return self::toUnderScore($matches[1]);
        }
        throw new InvalidStateException('Cannot determine table name.');
    }

    public function getImplicitFilters($entityClass, Caller $caller = null)
    {
        $entityName = $this->trimNamespace($entityClass);
        if ($entityName === "Article") {
            return new ImplicitFilters(["confirmedArticle", "limit"]);
        }
        return array();
    }


}
