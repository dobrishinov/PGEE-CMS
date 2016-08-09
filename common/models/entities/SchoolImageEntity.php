<?php

class SchoolImageEntity extends Entity
{
    private $id;
    private $image;
    private $postsId;

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

    /**
     * @return mixed
     */
    public function getPostsId()
    {
        return $this->postsId;
    }

    /**
     * @param mixed $postsId
     */
    public function setPostsId($postsId)
    {
        $this->postsId = $postsId;
    }




}