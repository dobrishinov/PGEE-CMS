<?php

class DB
{
    const DB_HOST     = '127.0.0.1';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME     = 'Do.IT';

    private static $instance = null;

    private $connection;

    private function __construct()
    {
        $connection = mysqli_connect(
            self::DB_HOST,
            self::DB_USERNAME,
            self::DB_PASSWORD,
            self::DB_NAME
        );

        if(!$connection){
            echo mysqli_connect_error(); die;
        }

        $this->connection = $connection;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            $db = new DB();
            self::$instance = $db;
        }
        return self::$instance;
    }

    public function get($table, $where = array(), $limit = -1, $offset= 0)
    {
        $sql = "SELECT * FROM {$table}";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND  {$key} = '{$value}' ";
            }
        }

        if ($limit > -1 && $offset > 0) {
            $sql .= " LIMIT {$limit} , {$offset} ";
        }

        $result = mysqli_query($this->connection, $sql);

        if (!$result) {
            $this->error();
        }

        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }

    public function getSort($table, $orderBy, $sort, $where = array())
    {
        $sql = "SELECT * FROM {$table} ORDER BY {$orderBy} {$sort}";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND {$key} = '{$value}' ";
            }
        }

        $result = mysqli_query($this->connection, $sql);

        if(!$result) {
            $this->error();
        }

        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO {$table} SET ";
        $i = 0;
        $count = count($data);
        foreach ($data as $key => $value) {
            ++$i;
            if ($i == $count) {
                $sql.= " {$key} = '{$value}'";
            } else {
                $sql.= " {$key} = '{$value}',";
            }
        }

        mysqli_query($this->connection, $sql);
    }

    public function update($table,$id,$data)
    {
        $sql = "UPDATE {$table} SET ";
        $i = 0;
        $count = count($data);
        foreach ($data as $key => $value) {
            ++$i;
            if ($i == $count) {
                $sql.= " {$key} = '{$value}'";
            } else {
                $sql.= " {$key} = '{$value}',";
            }
        }

        $sql.=" WHERE id = '{$id}' ";

        mysqli_query($this->connection, $sql);
    }

    public function delete($table, $id){
        $sql = "DELETE FROM {$table} WHERE id = '{$id}'";
        mysqli_query($this->connection, $sql);
    }

    public function error(){
        echo mysqli_error($this->connection);die;
    }

}