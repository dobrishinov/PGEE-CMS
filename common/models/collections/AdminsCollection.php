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

}