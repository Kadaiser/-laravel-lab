<?php

namespace App\Models\Buildings;

use App\Models\Buildings\AbstractBuilding;

class HouseBuilding extends GenericBuilding
{
    use TraitBuilding;
    
    public function getType(){
        return 'House';
    }
}