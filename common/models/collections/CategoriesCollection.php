<?php

class CategoriesCollection extends Collection
{
    protected $table = 'categories';
    protected $entity = 'CategoryEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'name'    => $entity->getName(),
            'description'    => $entity->getDescription(),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }

    public function get($where = array(), $limit = -1, $offset = 0, $like, $orderBy = array())
    {
        $sql = "SELECT *
                FROM {$this->table} ";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND  {$key} = '{$value}' ";
            }
        }

        $sql .= " WHERE name LIKE '%{$like}%' ";

        if (!empty($orderBy)){
            $sql .= " ORDER BY {$orderBy[0]} {$orderBy[1]} ";
        }

        if($limit > -1 && $offset > 0) {
            $sql .= " LIMIT {$limit} , {$offset} ";
        }


        $result = $this->db->query($sql);

        if (!$result) {
            $this->db->error();
        }

        $array = array();
        while ($row = $this->db->translate($result)) {
            $entity = new $this->entity;
            $entity->init($row);

            $array[] = $entity;
        }

        return $array;
    }
}