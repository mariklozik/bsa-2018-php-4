<?php
namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Contracts\Module;
use BinaryStudioAcademy\Game\Inventory;

class BaseModule implements Module
{
    public function build(Module $module, Inventory $inventory) {}
}