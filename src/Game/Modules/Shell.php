<?php
namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Contracts\Module;
use BinaryStudioAcademy\Game\Inventory;
class Shell extends BaseModule
{
    const NEED_RESOURCES = ['metal', 'fire'];

    public function __construct($module, Inventory $inventory)
    {
        $inventory->checkResources($module, self::NEED_RESOURCES);
    }
}
