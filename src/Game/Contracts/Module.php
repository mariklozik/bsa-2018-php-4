<?php
namespace BinaryStudioAcademy\Game\Contracts;

use BinaryStudioAcademy\Game\Inventory;

interface Module
{
    public function build(Module $module, Inventory $inventory);
}