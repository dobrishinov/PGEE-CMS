<?php

class BlogImageEntity extends Entity
{
    private $id;
    private $image;
    private $blogPostId;

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
    public function getBlogPostId()
    {
        return $this->blogPostId;
    }

    /**
     * @param mixed $blogPostId
     */
    public function setBlogPostId($blogPostId)
    {
        $this->blogPostId = $blogPostId;
    }
    
    
}