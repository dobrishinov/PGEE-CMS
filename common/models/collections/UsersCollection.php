<?php

class UsersCollection extends Collection
{
    protected $table = 'users';
    protected $entity = 'UserEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'username'  => $this->db->escape($entity->getUsername()),
            'full_name' => $this->db->escape($entity->getFullName()),
            'interests' => $this->db->escape($entity->getInterests()),
            'phone'     => $this->db->escape($entity->getPhone()),
            'email'     => $this->db->escape($entity->getEmail()),
            'address'   => $this->db->escape($entity->getAddress()),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $data['password'] = $entity->getPassword();
            $this->insert($data);
        }
    }
    
}