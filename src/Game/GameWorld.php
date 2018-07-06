<?php
namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;

class GameWorld
{
    private $command;
    private $newResource;

    public function __construct()
    {
        $this->newResource = new Inventory();
        $this->newModule   = new ModulesFactory();
    }
    public function inputHandler($input, Writer $output)
    {
        $this->command = explode(':',trim($input));

        switch ( $this->command[0] ) {
            case 'help':
                $output->writeln('HELP');
                break;

            case 'build':
                $output->writeln('build');
                $this->newModule->build($this->command[1], $this->newResource);

                $output->writeln($this->newResource->showModules());
                break;

            case 'mine':
                $output->writeln($this->newResource->mine($this->command[1]));
                $output->writeln($this->newResource->showInventory());
                break;

            case 'produce':
                $output->writeln($this->newResource->produce($this->command[1]));
                $output->writeln($this->newResource->showInventory());
                break;

            case 'exit':
                die;
                break;
            default:
                $output->writeln('unknown command, help for more information');
        }
    }
}