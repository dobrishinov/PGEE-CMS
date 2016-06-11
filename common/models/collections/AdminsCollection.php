<?php

class AdminsCollection extends Collection
{
    protected $table = 'admins';
    protected $entity = 'AdminEntity';

    public function save(Entity $entity)
    {
        $data = array(
            'username'    => $entity->getUsername(),
            'full_name'    => $entity->getFullName(),
            'information' => $entity->getInformation(),
            'phone'       => $entity->getPhone(),
            'email'       => $entity->getEmail(),
        );

        if ($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $data['password'] = $entity->getPassword();
            $this->insert($data);
        }
    }

}