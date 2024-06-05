<?php

class CategoryModel
{
    private $id;
    private $name;
    private $dateCreated;
    private $dateUpdated;

    public function __construct($id = null, $name = null, $dateCreated = null, $dateUpdated = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->dateCreated = $dateCreated;
        $this->dateUpdated = $dateUpdated;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dateCreated' => $this->dateCreated,
            'dateUpdated' => $this->dateUpdated
        ];
    }
}
