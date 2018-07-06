<?php
namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Resource;

class Inventory implements Resource
{
    private $modules = [
        'shell'     => 0,
        'porthole'  => 0,
    ];

    private $inventory = [
        'fire'      => 0,
        'sand'      => 0,
        'iron'      => 0,
        'silicon'   => 0,
        'copper'    => 0,
        'carbon'    => 0,
        'water'     => 0,
        'fuel'      => 0,

        'metal'     => 0,
    ];

    private $combine = [
        'metal'     => ['fire', 'iron'],
    ];

    public function checkResources(string $module, array $needResources){
        $haveResources = FALSE;
        foreach ($needResources as $value) {
            if( $this->inventory[$value] > 0 ) {
                $haveResources = TRUE;
            }
            if( !$haveResources ) {
                return 'Not enough resources for building module ' . $module ;
            }
        }
        $this->modules[$module]++;
        return $module . ' has been built';
    }

    public function showModules()
    {
        $inv = '*** Modules ***' . PHP_EOL;
        foreach ($this->modules as $key => $value) {
            $inv .= $key . ' = ' . $value . PHP_EOL;
        }
        $inv .= '*** Modules ***';
        return $inv;
    }



    public function showInventory()
    {
        $inv = '*** Inventory ***' . PHP_EOL;
        foreach ($this->inventory as $key => $value) {
            $inv .= $key . ' = ' . $value . PHP_EOL;
        }
        $inv .= '*** Inventory ***';
        return $inv;
    }

    public function mine(string $resource)
    {
        if( array_key_exists($resource, $this->inventory) ) {
            if( !array_key_exists($resource, $this->combine) ) {
                $this->inventory[$resource]++;
                $result = $resource . ' has been mined!';
            } else {
                $result = $resource . ' is combined resource, you cant mine it';
            }
        } else {
            $result = 'Unknown resource';
        }
        return $result;
    }

    public function produce(string $resource)
    {
        if( array_key_exists($resource, $this->combine) ) {
            $canProduce = FALSE;
            foreach ( $this->combine[$resource] as $value )
            {
                if( $this->inventory[$value] > 0 ) {
                    $canProduce = TRUE;
                }
                if( !$canProduce ) {
                    return 'Not enough resources for producing ' . $resource;
                }
            }

            if($canProduce) {
                foreach ( $this->combine[$resource] as $value ) {
                    $this->inventory[$value]--;
                }
            }
            $this->inventory[$resource]++;
            $result = $resource . ' has been produced!';
        } else {
            $result = 'Unknown resource';
        }
        return $result;
    }
}