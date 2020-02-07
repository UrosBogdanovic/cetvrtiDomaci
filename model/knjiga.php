<?php

class Knjiga
{
    private $__id;
    private $__name;
    private $__rmId;
    private $__biblName;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRmId()
    {
        return $this->rmId;
    }

    public function setRmId($rmId)
    {
        $this->rmId = $rmId;
    }

    public function getBiblName()
    {
        return $this->biblName;
    }

    public function setBiblName($biblName)
    {
        $this->biblName = $biblName;
    }
}
