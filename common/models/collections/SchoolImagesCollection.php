<?php

class SchoolImagesCollection extends Collection
{
    protected $table = 'school_images';
    protected $entity = 'SchoolImageEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'school_id'   => $entity->getSchoolId(),
            'image'      => $entity->getImage(),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }
    public function getImages($where = array(), $limit = -1, $offset = 0)
    {
        $sql = "SELECT * FROM {$this->table}";

        if (!empty($where)) {
            $sql .= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql .= " AND  {$key} = '{$value}' ";
            }
        }

        if ($limit > -1 && $offset > 0) {
            $sql .= " LIMIT {$limit} , {$offset} ";
        }


        $result = $this->db->query($sql);

        if (!$result) {
            $this->db->error();
        }

        $array = array();
        while ($row = $this->db->translate($result)) {
            $entity = new $this->entity();
            $entity->init($row);

            $array[] = $entity;
        }

        return $array;
    }
}