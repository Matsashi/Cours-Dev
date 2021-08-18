<?php
class Livre{
    private $cover;
    private $title;
    private $pages;
    private $id;

    function __construct($ID, $title, $nbPages, $image)
    {
        $this->cover = $image;
        $this->title = $title;
        $this->pages = $nbPages;
        $this->id = $ID;        
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }
    public function getCover()
    {
        return $this->cover;
    }
    public function setCover($cover): self
    {
        $this->cover = $cover;

        return $this;
    }
    public function getPages()
    {
        return $this->pages;
    }
    public function setPages($pages): self
    {
        $this->pages = $pages;

        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
}

?>