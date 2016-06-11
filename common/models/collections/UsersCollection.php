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
    
}