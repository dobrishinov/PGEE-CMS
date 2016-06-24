<?php

class ProjectsCollection extends Collection
{
    protected $table = 'projects';
    protected $entity = 'ProjectEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'id'            => $this->db->escape($entity->getId()),
            'title'         => $this->db->escape($entity->getTitle()),
            'description'   => $this->db->escape($entity->getDescription()),
            'content'       => $this->db->escape($entity->getContent()),
            'date'          => $this->db->escape($entity->getDate()),
            'author_id'     => $this->db->escape($entity->getAuthorName()),
            'category_id'   => $this->db->escape($entity->getCategoryName()),
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
                $sql.= " AND  {$this->db->escape($key)} = '{$this->db->escape($value)}' ";
            }
        }

        $sql .= " WHERE {$this->db->escape($column)} LIKE '%{$this->db->escape($like)}%' ";

        if (!empty($orderBy)){
            $sql .= " ORDER BY {$this->db->escape($orderBy[0])} {$this->db->escape($orderBy[1])} ";
        }

        if($limit > -1 && $offset > 0) {
            $sql .= " LIMIT {$this->db->escape($limit)} , {$this->db->escape($offset)} ";
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
        $sql .= " WHERE t.id={$this->db->escape($id)} ";

        $result = $this->db->query($sql);

        if (mysqli_num_rows($result) == 0) {
            $this->db->error();
        }

        $entity = new $this->entity;
        $entity->init($this->db->translate($result));

        return $entity;
    }
}