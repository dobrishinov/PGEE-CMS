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
    
}