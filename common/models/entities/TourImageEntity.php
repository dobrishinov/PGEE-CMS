<?php

class TourImageEntity extends Entity
{
    private $id;
    private $toursId;
    private $image;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getToursId()
    {
        return $this->toursId;
    }

    /**
     * @param mixed $toursId
     */
    public function setToursId($toursId)
    {
        $this->toursId = $toursId;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    
    
}