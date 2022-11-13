<?php

namespace App\Models\Buildings;

use App\Models\Buildings\AbstractBuilding;

class OfficeBuilding extends GenericBuilding
{
    use TraitBuilding;
    
    public function getType(){
        return 'Office';
    }
}