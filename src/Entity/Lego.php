<?php

namespace App\Entity;

class Lego {
    private $id;
    private $name;
    private $collection;

    public function __construct($id, $name, $collection)
    {
        $this->id = $id;
        $this->name = $name;
        $this->collection = $collection;
    }
 
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCollection()
    {
        return $this->collection;
    }
}