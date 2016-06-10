<?php

class UsersCollection extends Collection
{
    protected $table = 'users';
    protected $entity = 'UserEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'username' => $entity->getUsername(),
            'full_name' => $entity->getFullName(),
            'interests' => $entity->getInterests(),
            'phone' => $entity->getPhone(),
            'email' => $entity->getEmail(),
            'address' => $entity->getAddress(),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $data['password'] = $entity->getPassword();
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

        $sql .= " WHERE username LIKE '%{$like}%' ";

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