<?php
namespace BinaryStudioAcademy\Game\Contracts;

interface Resource
{
    public function showInventory();
    public function showModules();
    public function mine(string $resource);
    public function produce(string $resource);
}
