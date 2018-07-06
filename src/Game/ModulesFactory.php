<?php
namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Modules;

class ModulesFactory
{
    private $module;

    public function build(string $module, Inventory $inventory)
    {
        switch ($module) {
            case 'shell':
                $this->module = new Modules\Shell($module, $inventory);
            break;

            case 'porthole':
                $this->module = new Modules\Porthole();
            break;

            case 'controlUnit':
                $this->module = new Modules\ControlUnit();
            break;
        }

    }
}