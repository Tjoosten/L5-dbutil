<?php

namespace Tjoosten\Dbutil\Controllers;

class DbutilController
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = \DB::connection('mysql')->getPdo();
    }
    public function tables()
    {
        $result = $this->pdo->query('show tables');
        $tables = [];

        while ($row = $result->fetch(\PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }

        return $tables;
    }

    /**
     * @param $table, string, the database table.
     */
    public function optimizeTable($table)
    {
        $this->pdo->query('optimize table '. $table);
    }

    /**
     * @param $table, string, the database table.
     */
    public function repair($table)
    {
        $this->pdo->query(''. $table);
    }

    /**
     * @param $table, string, the database table.
     */
    public function truncate($table)
    {
        $this->pdo->query('truncate '. $table);
    }

    /**
     * Check if table exists.
     *
     * @param   string  $table
     * @return  boolean
     */
    public function exists($table)
    {
        return in_array($table, $this->tables());
    }
}