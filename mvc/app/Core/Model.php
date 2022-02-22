<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Model
 */
abstract class Model implements DbModelInterface
{

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $idColumn;

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var
     */
    protected $collection;

    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return $this
     */
    public function initCollection()
    {
        $columns = implode(',', $this->getColumns());
        $this->sql = "select $columns from " . $this->getTableName();

        return $this;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        $db = new DB();
        $sql = "show columns from {$this->getTableName()};";
        $results = $db->query($sql);
        foreach ($results as $result) {
            $this->columns[] = $result['Field'];
        }
        return $this->columns;
    }

    /**
     * @param $params
     * @return $this
     */
    public function sort($params)
    {
        $this->sql .= " order by ";
        foreach ($params as $key => $value) {
            $this->sql .= "{$key} {$value}, ";
        }
        $this->sql = substr($this->sql, 0, -2);
        return $this;
    }

    /**
     * @param $params
     */
    public function filter($params)
    {
        /*
          TODO
         */
        return $this;
    }

    /**
     * @return $this
     */
    public function getCollection()
    {
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;
    }

    /**
     * @return mixed
     */
    public function select()
    {
        return $this->collection;
    }

    /**
     * @return array|null
     */
    public function selectFirst(): ?array
    {
        return $this->collection[0] ?? null;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getItem($id): ?array
    {
        $sql = "select * from {$this->getTableName()} where $this->idColumn = ?;";
        $db = new DB();
        $params = [$id];
        return $db->query($sql, $params)[0] ?? null;
    }

    /**
     * @return array
     */
    public function getPostValues()
    {
        $values = [];
        $columns = $this->getColumns();
        foreach ($columns as $column) {
            /*
              if ( isset($_POST[$column]) && $column !== $this->id_column ) {
              $values[$column] = $_POST[$column];
              }
             *
             */
            $column_value = filter_input(INPUT_POST, $column);
            if ($column_value && $column !== $this->idColumn) {
                $values[$column] = $column_value;
            }
        }
        return $values;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getPrimaryKeyName(): string
    {
        return $this->idColumn;
    }

    public function getId(): ?int
    {
        return (int)$this->columns[$this->getPrimaryKeyName()];
    }

    public function addItem($values): void
    {
        $columns = [];
        foreach ($values as $key => $value) {
            array_push($columns, $key);
            array_push($this->params, $value);
        }
        $vls = str_repeat('?,', count($columns) - 1) . '?';
        $columns = implode(',', $columns);
        $sql = "insert into $this->tableName ({$columns}) values ({$vls});";
        $db = new DB();
        $db->query($sql, $this->params);
    }

    public function saveItem($id, $values): void
    {
        $columns = [];
        foreach ($values as $key => $value) {
            array_push($columns, $key);
            array_push($this->params, $value);
        }
        $this->sql = "update $this->tableName set ";
        foreach ($values as $key => $value) {
            $this->sql .= "$key = ?, ";
        }
        $this->sql = substr($this->sql, 0, -2);
        $this->sql .= " where {$this->idColumn} = $id;";
        $db = new DB();
        $db->query($this->sql, $this->params);
    }

    public function deleteItem($model, $id): void
    {
        $db = new DB();
        $model->columns[$model->getPrimaryKeyName()] = $id;
        $db->deleteEntity($this);
    }
}
