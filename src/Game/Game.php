<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\GameWorld;
use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;

use BinaryStudioAcademy\Game\Contracts\Module;
use BinaryStudioAcademy\Game\Contracts\Resource;



class Game
{
    private $gameWorld;

    public function __construct()
    {
        $this->gameWorld = new GameWorld();
    }

    public function start(Reader $reader, Writer $writer): void
    {
        $writer->write("Hello in game".PHP_EOL);

        while ( true ) {
            $input = trim($reader->read());
            $this->gameWorld->inputHandler($input, $writer);
        }

    }

    public function run(Reader $reader, Writer $writer): void
    {
        // TODO: Implement step by step mode with game state persistence between steps
        $writer->writeln("You can't play yet. Please read input and convert it to commands.");
        $writer->writeln("Don't forget to create game's world.");
    }
}
