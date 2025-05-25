<?php
require_once __DIR__ . '/QueryBuilderInterface.php';

class MySQLQueryBuilder implements QueryBuilderInterface
{
    private array $query = [];

    public function select(array $fields): self {
        $this->query['select'] = 'SELECT ' . implode(', ', $fields);
        return $this;
    }

    public function from(string $table): self {
        $this->query['from'] = 'FROM ' . $table;
        return $this;
    }

    public function where(string $condition): self {
        $this->query['where'] = 'WHERE ' . $condition;
        return $this;
    }

    public function getQuery(): string {
        return implode(' ', $this->query) . ';';
    }
}
