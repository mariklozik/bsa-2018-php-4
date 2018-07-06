<?php


use BinaryStudioAcademy\Game\Contracts\Resource;
class Metal implements Resource
{
    public function mine()
    {
        $this->count++;
    }
}