<?php

class PostsCollection extends Collection
{
    protected $table = 'posts';
    protected $entity = 'PostEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'id'       => $entity->getId(),
            'title'    => $entity->getTitle(),
            'description'    => $entity->getDescription(),
            'content'    => $entity->getContent(),
            'date'    => $entity->getDate(),
            'author_id'    => $entity->getAuthorName(),
            'category_id'    => $entity->getCategoryName(),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }

    public function get($where = array(), $limit = -1, $offset = 0, $like, $orderBy = array(), $column = ' ')
    {
        $sql = "SELECT
                t.id, t.title, t.description, t.date,
                a.username as author_name,
                c.name as category_name
                FROM {$this->table} as t";

        $sql .= " JOIN categories as c ON c.id = t.category_id ";
        $sql .= " JOIN admins as a ON a.id = t.author_id ";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND  {$key} = '{$value}' ";
            }
        }

        $sql .= " WHERE {$column} LIKE '%{$like}%' ";

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

    public function getOne($id)
    {
        $sql = "SELECT
                t.*,
                a.username as author_name,
                c.name as category_name
                FROM {$this->table} as t";

        $sql .= " JOIN categories as c ON c.id = t.category_id ";
        $sql .= " JOIN admins as a ON a.id = t.author_id ";
        $sql .= " WHERE t.id={$id} ";
        
        $result = $this->db->query($sql);

        if (mysqli_num_rows($result) == 0) {
            $this->db->error();
        }

        $entity = new $this->entity;
        $entity->init($this->db->translate($result));

        return $entity;
    }
}