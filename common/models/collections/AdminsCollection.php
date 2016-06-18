<?php

class AdminsCollection extends Collection
{
    protected $table = 'admins';
    protected $entity = 'AdminEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'username'    => $this->db->escape($entity->getUsername()),
            'full_name'   => $this->db->escape($entity->getFullName()),
            'information' => $this->db->escape($entity->getInformation()),
            'avatar'      => $this->db->escape($entity->getAvatar()),
            'phone'       => $this->db->escape($entity->getPhone()),
            'email'       => $this->db->escape($entity->getEmail()),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $data['password'] = $entity->getPassword();
            $this->insert($data);
        }
    }

    public function getUser($where = array())
    {
        $sql = "SELECT * FROM {$this->table}";
        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND  {$this->db->escape($key)} = '{$this->db->escape($value)}' ";
            }
        }

        $result = $this->db->query($sql);

        if (is_null(mysqli_num_rows($result))) {
            $this->db->error();
        }

        $entity = new $this->entity();
        $entity->init($this->db->translate($result));

        if (is_null($entity)) {
            return null;
        }

        return $entity;
    }

}