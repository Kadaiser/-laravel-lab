<?php

namespace App\Models\Buildings;

use App\Models\Buildings\AbstractBuilding;

class GenericBuilding extends AbstractBuilding 
{
       
    public function getType(){
        return 'Generic';
    }
}
